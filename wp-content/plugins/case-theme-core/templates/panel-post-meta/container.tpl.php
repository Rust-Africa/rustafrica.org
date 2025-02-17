<?php
/**
 * The template for the main panel container.
 * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
 *
 * @author      Redux Framework
 * @package     ReduxFramework/Templates
 * @version:    4.0.0
 */

global $pagenow;

$classes = array( 'redux-container' );

if ( ! isset( $this->parent->args['metabox_context'] ) || ! in_array( $this->parent->args['metabox_context'], array( 'normal', 'advanced', 'side' ) ) )
{
    $this->parent->args['metabox_context'] = 'advanced';
}

if ( ! isset( $this->parent->args['metabox_priority'] ) || ! in_array( $this->parent->args['metabox_priority'], array( 'high', 'core', 'default', 'low' ) ) )
{
    $this->parent->args['metabox_priority'] = 'default';
}

if ( ( 'post.php' != $pagenow && 'post-new.php' != $pagenow ) || 'side' == $this->parent->args['metabox_context'] )
{
    $this->parent->args['open_expanded'] = true;
    $classes[] = 'redux-container-context-side';
    $classes[] = 'fully-expanded';
}

$classes[] = 'redux-container-context-' . $this->parent->args['metabox_context'];

if ( ! empty( $this->parent->args['class'] ) )
{
    $classes[] = $this->parent->args['class'];
}

$classes = implode( ' ', array_filter( $classes ) );

?>

<div class="<?php echo trim( esc_attr( $classes ) ); ?>">
    <?php $this->get_template( 'content.tpl.php' ); ?>
</div>
