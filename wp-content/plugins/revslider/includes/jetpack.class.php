<?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.themepunch.com/
 * @copyright 2024 ThemePunch
 */
 
if(!defined('ABSPATH')) exit();

class RevSliderJetPack extends RevSliderFunctions {
	
	public function __construct(){
		add_filter('script_loader_tag', array($this, 'exclude_scripts_from_defer'), 11, 2);
		add_filter('revslider_js_add_header_scripts', array($this, 'add_defer_to_script_tags'), 10, 1);
		add_filter('revslider_html_v6_output', array($this, 'add_defer_to_script_tags'), 10, 1);
		add_filter('revslider_add_setREVStartSize', array($this, 'add_defer_to_script_tags'), 10, 1);
	}

	/**
	 * prevent JetPack from defer our frontend JS files
	 */
	public function exclude_scripts_from_defer($src, $handle){
		if(!class_exists('Jetpack')) return $src;
		$process = false;

		if(in_array($handle, ['tp-tools', 'sr7', 'sr7migration', 'revmin', 'revmin-actions', 'revmin-carousel', 'revmin-layeranimation', 'revmin-navigation', 'revmin-panzoom', 'revmin-parallax', 'revmin-slideanims', 'revmin-video'])){
			$process = true;
		}
		
		//add addons to ignore list
		if(strpos($src, 'rs6') !== false || strpos($src, 'rbtools.min.js') !== false || strpos($src, 'revolution.addon.') !== false || strpos($src, 'sr6/assets/js/libs/') !== false || strpos($src, 'liquideffect') !== false || strpos($src, 'pixi.min.js') !== false || strpos($src, 'rslottie-js') !== false){
			$process = true;
		}

		return ($process) ? str_replace(' src', ' data-jetpack-boost="ignore" src', $src) : $src;
	}

	public function add_defer_to_script_tags($html){
		if(!class_exists('Jetpack')) return $html;

		return str_replace('<script', '<script data-jetpack-boost="ignore"', $html);
	}
}