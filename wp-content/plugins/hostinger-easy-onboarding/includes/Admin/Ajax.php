<?php

namespace Hostinger\EasyOnboarding\Admin;

use Hostinger\EasyOnboarding\AmplitudeEvents\Amplitude;
use Hostinger\EasyOnboarding\AmplitudeEvents\Actions as AmplitudeActions;

defined( 'ABSPATH' ) || exit;

class Ajax {
    public const HIDE_HOSTINGER_ADMIN_BAR_REFER = 'hide_hostinger_admin_bar_refer';
    public const REFERRAL_PROMOTION_SHOWN = 'promotion_shown_trigger';

    public function __construct() {
		add_action( 'init', array( $this, 'define_ajax_events' ), 0 );
	}

    /**
     * @return void
     */
	public function define_ajax_events(): void {
		$events = array(
            'hide_referral_button',
            'promotion_selected',
            'promotion_shown',
		);

		foreach ( $events as $event ) {
			add_action( 'wp_ajax_hostinger_' . $event, array( $this, $event ) );
		}
	}

    /**
     * @param $nonce
     *
     * @return false|string
     */
	public function request_security_check( $nonce ) {
		if ( ! wp_verify_nonce( $nonce, 'hts-ajax-nonce' ) ) {
			return 'Invalid nonce';
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return 'Lack of permissions';
		}

		return false;
	}

    public function hide_referral_button(): void {
        $amplitude      = new Amplitude();
        $nonce          = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
        $security_check = $this->request_security_check( $nonce );

        if ( ! empty( $security_check ) ) {
            wp_send_json_error( $security_check );
        }

        set_transient( self::HIDE_HOSTINGER_ADMIN_BAR_REFER, true, 2 * WEEK_IN_SECONDS );

        $amplitude->send_event( [ 'action' => AmplitudeActions::WP_REFERRAL_PROMOTION_CLOSED ] );

        wp_send_json_success( [ 'message' => 'Button hidden' ] );
    }

    public function promotion_selected(): void {
        $amplitude      = new Amplitude();
        $nonce          = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
        $security_check = $this->request_security_check( $nonce );

        if ( ! empty( $security_check ) ) {
            wp_send_json_error( $security_check );
        }

        $amplitude->send_event( [ 'action' => AmplitudeActions::WP_REFERRAL_PROMOTION_SELECTED ] );

        wp_send_json_success( [ 'message' => 'Promotion selected' ] );
    }

    public function promotion_shown(): void {
        $amplitude      = new Amplitude();
        $nonce          = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
        $security_check = $this->request_security_check( $nonce );

        if ( ! empty( $security_check ) ) {
            wp_send_json_error( $security_check );
        }

        if ( get_transient( self::REFERRAL_PROMOTION_SHOWN ) ) {
            return;
        }

        $amplitude->send_event( [ 'action' => AmplitudeActions::WP_REFERRAL_PROMOTION_SHOWN ] );

        set_transient( self::REFERRAL_PROMOTION_SHOWN, true, DAY_IN_SECONDS );

        wp_send_json_success();
    }
}
