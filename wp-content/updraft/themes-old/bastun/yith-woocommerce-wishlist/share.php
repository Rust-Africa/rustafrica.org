<?php
/**
 * Share template
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist\Templates
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $wishlist                YITH_WCWL_Wishlist Wishlist object
 * @var $share_title             string Title for share section
 * @var $share_facebook_enabled  bool Whether to enable FB sharing button
 * @var $share_twitter_enabled   bool Whether to enable Twitter sharing button
 * @var $share_pinterest_enabled bool Whether to enable Pintereset sharing button
 * @var $share_email_enabled     bool Whether to enable Email sharing button
 * @var $share_whatsapp_enabled  bool Whether to enable WhatsApp sharing button (mobile online)
 * @var $share_url_enabled       bool Whether to enable share via url
 * @var $share_link_title        string Title to use for post (where applicable)
 * @var $share_link_url          string Url to share
 * @var $share_summary           string Summary to use for sharing on social media
 * @var $share_image_url         string Image to use for sharing on social media
 * @var $share_twitter_summary   string Summary to use for sharing on Twitter
 * @var $share_facebook_icon     string Icon for facebook sharing button
 * @var $share_twitter_icon      string Icon for twitter sharing button
 * @var $share_pinterest_icon    string Icon for pinterest sharing button
 * @var $share_email_icon        string Icon for email sharing button
 * @var $share_whatsapp_icon     string Icon for whatsapp sharing button
 * @var $share_whatsapp_url      string Sharing url on whatsapp
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<?php
// we want spaces to be encoded as + instead of %20, so we use urlencode instead of rawurlencode.
// phpcs:disable WordPress.PHP.DiscouragedPHPFunctions.urlencode_urlencode

/**
 * DO_ACTION: yith_wcwl_before_wishlist_share
 *
 * Allows to render some content or fire some action before the share wishlist section.
 */
do_action( 'yith_wcwl_before_wishlist_share', $wishlist );
?>

<div class="yith-wcwl-share">
	<h4 class="yith-wcwl-share-title"><?php echo esc_html( $share_title ); ?></h4>
	<ul>
		<?php if ( $share_facebook_enabled ) : ?>
			<li class="share-button">
				<a target="_blank" rel="noopener" class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( $share_link_url ); ?>&p[title]=<?php echo esc_attr( $share_link_title ); ?>" title="<?php esc_attr_e( 'Facebook', 'bastun' ); ?>">
					<?php echo wp_kses_post($share_facebook_icon ? yith_wcwl_kses_icon( $share_facebook_icon ) : esc_html__( 'Facebook', 'bastun' )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $share_twitter_enabled ) : ?>
			<li class="share-button">
				<a target="_blank" rel="noopener" class="twitter" href="https://twitter.com/share?url=<?php echo urlencode( $share_link_url ); ?>&amp;text=<?php echo esc_attr( $share_twitter_summary ); ?>" title="<?php esc_attr_e( 'Twitter (X)', 'bastun' ); ?>">
					<?php echo wp_kses_post($share_twitter_icon ? yith_wcwl_kses_icon( $share_twitter_icon ) : esc_html__( 'Twitter (X)', 'bastun' )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $share_pinterest_enabled ) : ?>
			<li class="share-button">
				<a target="_blank" rel="noopener" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( $share_link_url ); ?>&amp;description=<?php echo esc_attr( $share_summary ); ?>&amp;media=<?php echo esc_attr( $share_image_url ); ?>" title="<?php esc_attr_e( 'Pinterest', 'bastun' ); ?>" onclick="window.open(this.href); return false;">
					<?php echo wp_kses_post($share_pinterest_icon ? yith_wcwl_kses_icon( $share_pinterest_icon ) : esc_html__( 'Pinterest', 'bastun' )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $share_email_enabled ) : ?>
			<li class="share-button">
				<?php
				/**
				 * APPLY_FILTERS: yith_wcwl_email_share_subject
				 *
				 * Filter the subject for the share email.
				 *
				 * @param string $subject Email subject
				 *
				 * @return string
				 */

				/**
				 * APPLY_FILTERS: yith_wcwl_email_share_body
				 *
				 * Filter the body for the share email.
				 *
				 * @param string $body Email body
				 *
				 * @return string
				 */

				?>
				<a class="email" href="mailto:?subject=<?php echo esc_attr( apply_filters( 'yith_wcwl_email_share_subject', $share_link_title ) ); ?>&amp;body=<?php echo esc_attr( apply_filters( 'yith_wcwl_email_share_body', urlencode( $share_link_url ) ) ); ?>&amp;title=<?php echo esc_attr( $share_link_title ); ?>" title="<?php esc_attr_e( 'Email', 'bastun' ); ?>">
					<?php echo wp_kses_post($share_email_icon ? yith_wcwl_kses_icon( $share_email_icon ) : __( 'Email', 'bastun' )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $share_whatsapp_enabled ) : ?>
			<li class="share-button">
				<a class="whatsapp" href="<?php echo esc_attr( $share_whatsapp_url ); ?>" data-action="share/whatsapp/share" target="_blank" rel="noopener" title="<?php esc_attr_e( 'WhatsApp', 'bastun' ); ?>">
					<?php echo wp_kses_post($share_whatsapp_icon ? yith_wcwl_kses_icon( $share_whatsapp_icon ) : esc_html__( 'Whatsapp', 'bastun' )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</li>
		<?php endif; ?>
	</ul>

	<?php if ( $share_url_enabled ) : ?>
		<div class="yith-wcwl-after-share-section">
			<input class="copy-target" readonly="readonly" type="url" name="yith_wcwl_share_url" id="yith_wcwl_share_url" value="<?php echo esc_attr( $share_link_url ); ?>"/>
			<?php echo ( ! empty( $share_link_url ) ) ? sprintf( '<small>%s <span class="copy-trigger">%s</span> %s</small>', esc_html__( '(Now', 'bastun' ), esc_html__( 'copy', 'bastun' ), esc_html__( 'this wishlist link and share it anywhere)', 'bastun' ) ) : ''; ?>
		</div>
	<?php endif; ?>

	<?php
	/**
	 * DO_ACTION: yith_wcwl_after_share_buttons
	 *
	 * Allows to render some content or fire some action after the share buttons in the Wishlist page.
	 *
	 * @param string $share_link_url   Share link URL
	 * @param string $share_title      Share title
	 * @param string $share_link_title Share link title
	 */
	do_action( 'yith_wcwl_after_share_buttons', $share_link_url, $share_title, $share_link_title );
	?>
</div>

<?php
/**
 * DO_ACTION: yith_wcwl_after_wishlist_share
 *
 * Allows to render some content or fire some action after the share wishlist section.
 */
do_action( 'yith_wcwl_after_wishlist_share', $wishlist );

// phpcs:enable WordPress.PHP.DiscouragedPHPFunctions.urlencode_urlencode
?>
