<?php 
$default_settings = [
    'search_text' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<div class="ct-search-form1">
	<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
        <input type="text" placeholder="<?php if(!empty($search_text)) { echo esc_attr( $search_text ); } else { esc_attr_e('Search...', 'itfirm'); } ?>" name="s" class="search-field" />
        <button type="submit" class="search-submit"><i class="caseicon-search"></i></button>
    </form>
</div>