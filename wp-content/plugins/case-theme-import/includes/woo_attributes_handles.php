<?php
/**
 * @Template: woo_attributes_handles.php.
 * @since: 1.0.0
 * author: Case-Themes
 * @descriptions:
 * @create: 30-Jan-19
 */

if (!function_exists('ct_woo_attributes_export')) {
    function ct_woo_attributes_export($file)
    {
        if (class_exists('WooCommerce')) {
            global $wp_filesystem;
            $attributes = wc_get_attribute_taxonomies();
            $atts_data = array();
            $att_fields = ["attribute_id","attribute_name","attribute_label","attribute_type","attribute_orderby","attribute_public"];
            $term_fields = array(
                "term_id","name","slug","term_group","term_taxonomy_id",
                "taxonomy","description","parent","count","filter","meta_value"
            );
            foreach ($attributes as $attribute)
            {
                $att_data = array(
                    'data'=>array(),
                    'terms'=>array()
                );
                foreach ($att_fields as $field)
                {
                    if(!isset($attribute->$field))
                        continue;
                    $att_data['data'][$field] = $attribute->$field;
                }
                $att_name = wc_attribute_taxonomy_name($attribute->attribute_name);
                $terms = get_terms(array(
                    'taxonomy'   => $att_name,
                    'hide_empty' => false,
                ));
                foreach ($terms as $term) {
                    if (!$term instanceof WP_Term)
                        continue;
                    $term_data = array(
                        'fields'=>array(),
                        'meta'=>array()
                    );
                    foreach ($term_fields as $field)
                    {
                        $term_data['fields'][$field] = $term->$field;
                    }
                    $term_meta = get_term_meta($term->term_id);
                    foreach ($term_meta as $meta_slug => $meta)
                    {
                        $term_data['meta'][$meta_slug] = $meta[0];
                    }
                    $att_data['terms'][$term->slug] = $term_data;
                }
                $atts_data["tax"][$att_name] = $att_data;
            }
            //get attributes attach products
            $products = wc_get_products(array('limit'=>-1));
            $products_data  = [];
            foreach ($products as $product)
            {
                if(!$product instanceof WC_Product)
                    continue;
                $product_data = array(
                    'product_id'=>$product->get_id(),
                    'attributes'=>[]
                );
                $atts =  $product->get_attributes( 'edit' );
                foreach ($atts as $att_slug =>$att)
                {
                    if(!$att instanceof WC_Product_Attribute)
                        continue;
                    if(strpos($att_slug,'pa_')!== 0)
                        continue;
                    $options = $att->get_options();
                    $options = ! empty( $options ) ? $options : array();
                    foreach ($options as $key => $term_id)
                    {
                        $term = get_term($term_id);
                        if(!$term instanceof WP_Term)
                            continue;
                        $options[$key] = $term->slug;
                    }
                    $product_data['attributes'][$att_slug] = [
                        'options'=>$options,
                        'name'=>$att->get_name(),
                        'positions'=>$att->get_position(),
                        'visible'=>$att->get_visible(),
                        'variation'=>$att->get_variation(),
                    ];
                    $product_data['variations'] =[];
                    $variations     = wc_get_products( array(
                        'status'         => array( 'private', 'publish' ),
                        'type'           => 'variation',
                        'parent'         => $product->get_id(),
                        'limit'          => -1,
                        'page'           => 1,
                        'orderby'        => array(
                            'menu_order' => 'ASC',
                            'ID'         => 'DESC',
                        ),
                        'return'         => 'objects',
                    ) );
                    if(is_array($variations))
                        foreach ($variations as $variation)
                        {
                            if(!$variation instanceof WC_Product_Variation)
                                continue;
                            $var_post = get_post($variation->get_id());
                            if(!$var_post instanceof WP_Post)
                                continue;
                            $product_data['variations'][] = $var_post->post_name;
                        }
                }
                $products_data[] = $product_data;
            }
            $atts_data['products']= $products_data;
            $file_contents = json_encode($atts_data);
            $wp_filesystem->put_contents($file, $file_contents, FS_CHMOD_FILE); // Save it
        }
    }
}
if (!function_exists('ct_woo_attributes_import')) {
    function ct_woo_attributes_import($file)
    {
        if (file_exists($file) && class_exists('WooCommerce')) {
            $data = file_get_contents($file);
            $atts_data = json_decode($data, true);
            $attributes = wc_get_attribute_taxonomies();
            if(isset($atts_data["tax"]) && count($atts_data["tax"])){
                if(is_array($attributes))
                {
                    foreach ($attributes as $attribute)
                    {
                        if(array_key_exists($attribute->attribute_name,$atts_data["tax"]))
                            unset($atts_data["tax"][$attribute->attribute_name]);
                    }
                }
                foreach ($atts_data["tax"] as $slug => $att)
                {
                    if(empty($att['data']))
                        continue;
                    $woo_atts = $att['data'];
                    //insert attributes;
                    wc_create_attribute(array(
                        'name'=>$woo_atts['attribute_label'],
                        'slug'=>$woo_atts['attribute_name'],
                        'type'=>$woo_atts['attribute_type'],
                        'order_by'=>$woo_atts['attribute_orderby'],
                        'has_archives'=>$woo_atts['attribute_public']
                    ));
                }
            }
            update_option("ct_ie_term_imported","not_imported");
        }
    }
}

if(!function_exists("ct_woo_attributes_term_import")){
    function ct_woo_attributes_term_import($file){
        if (file_exists($file) && class_exists('WooCommerce')) {
            update_option("ct_ie_term_imported","imported");
            $data = file_get_contents($file);
            $atts_data = json_decode($data, true);
            $attributes = wc_get_attribute_taxonomies();
            if(is_array($attributes))
            {
                foreach ($attributes as $attribute)
                {
                    if(array_key_exists($attribute->attribute_name,$atts_data["tax"]))
                        unset($atts_data["tax"][$attribute->attribute_name]);
                }
            }
            if(isset($atts_data["tax"])){
                foreach ($atts_data["tax"] as $slug => $att)
                {
                    if(empty($att['terms']))
                        continue;
                    foreach ($att['terms'] as $term)
                    {
                        if(empty($term['fields']) || empty($term['fields']['taxonomy']))
                            continue;
                        $tax = get_taxonomy($term['fields']['taxonomy']);
                        if(!$tax instanceof WP_Taxonomy)
                            return;
                        $result_insert_term = wp_insert_term($term['fields']['name'],$term['fields']['taxonomy'],array(
                            'description'=>$term['fields']['description'],
                            'parent'=>$term['fields']['parent'],
                            'slug'=>$term['fields']['slug'],
                        ));
                        if(is_array($result_insert_term))
                        {
                            $term_id = $result_insert_term['term_id'];
                            foreach ($term['meta'] as $key => $value)
                            {
                                update_term_meta($term_id,$key,$value);
                            }
                        }
                    }
                }
            }

            $products_data = $atts_data['products'];
            $log = [
                'products'=>[],
                'terms'=>[],
                'options'=>[]
            ];
            foreach ($products_data as $product_data)
            {
                $product= wc_get_product($product_data['product_id']);
                if($log['products'][$product_data['product_id']] = (!$product instanceof WC_Product))
                    continue;
                $atts =  $product->get_attributes( 'edit' );
                $log['terms']=[];
                $log['options'][$product_data['product_id']]=[];
                foreach ($atts as $att_slug =>$att)
                {
                    if(empty($product_data['attributes']))
                        continue;
                    if(!$att instanceof WC_Product_Attribute)
                        continue;
                    if(!array_key_exists($att_slug,$product_data['attributes']))
                        continue;
                    $options =  $product_data['attributes'][$att_slug]['options'];
                    foreach ($options as $key => $term_slug)
                    {
                        $term = get_term_by('slug',$term_slug,$att_slug);
                        $log['terms'][$term_slug] =  ($term) ? true : false;
                        if(!$term instanceof WP_Term)
                            continue;
                        $options[$key] = $term->term_id;
                    }
                    $log['options'][$product_data['product_id']][] = $options;
                    $att->set_options($options);
                    $log['options'][$product_data['product_id']][] = $att->get_options();
                }
                $classname    = WC_Product_Factory::get_product_classname( $product->get_id(), $product->get_type() );
                $product      = new $classname( $product->get_id() );
                $product->set_attributes($atts);
                $product->save();
                //fix product variation
                if(isset($product_data['variation'])){
                    $variations = get_posts(array('post_name__in'=>$product_data['variation'],'limit'=>-1));
                    foreach ($variations as $variation)
                    {
                        wp_update_post([
                            'ID' => $variation->ID,
                            'post_parent' => $product->get_id()
                        ]);
                    }
                }
            }

        }
    }
}