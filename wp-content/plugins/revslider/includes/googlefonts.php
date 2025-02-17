<?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.themepunch.com/
 * @copyright 2024 ThemePunch
 * @lastfetch 09.12.2024
 */
 
if(!defined('ABSPATH')) exit();

/**
*** CREATED WITH SCRIPT SNIPPET AND DATA TAKEN FROM https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&fields=items(family%2Csubsets%2Cvariants%2Ccategory)&key={YOUR_API_KEY}

$list_raw = file_get_contents('https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&fields=items(family%2Csubsets%2Cvariants%2Ccategory)&key={YOUR_API_KEY}');

$list = json_decode($list_raw, true);
$list = $list['items'];

echo '<pre>';
foreach($list as $l){
	echo "'".$l['family'] ."' => array("."\n";
	echo "'variants' => array(";
	foreach($l['variants'] as $k => $v){
		if($k > 0) echo ", ";
		if($v == 'regular') $v = '400';
		echo "'".$v."'";
	}
	echo "),\n";
	echo "'subsets' => array(";
	foreach($l['subsets'] as $k => $v){
		if($k > 0) echo ", ";
		echo "'".$v."'";
	}
	echo "),\n";
	echo "'category' => '". $l['category'] ."'";
	echo "\n),\n";
}
echo '</pre>';
**/

$googlefonts = [
'Roboto' => [
'variants' => ['100', '100italic', '300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Open Sans' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans JP' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Montserrat' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Poppins' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Inter' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Lato' => [
'variants' => ['100', '100italic', '300', '300italic', '400', 'italic', '700', '700italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Roboto Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Material Icons' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Oswald' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Roboto Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Noto Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'devanagari', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Raleway' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Nunito Sans' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans KR' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Nunito' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Playfair Display' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Rubik' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['arabic', 'cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Ubuntu' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Merriweather' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Kanit' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Roboto Slab' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'PT Sans' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Work Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Lora' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'serif'
],
'DM Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Mulish' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans TC' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['chinese-traditional', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Fira Sans' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Manrope' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Barlow' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Quicksand' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'IBM Plex Sans' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Heebo' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Material Symbols Outlined' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Bebas Neue' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Titillium Web' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '600', '600italic', '700', '700italic', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'PT Serif' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Karla' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Mukta' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Material Icons Outlined' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Outfit' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Nanum Gothic' => [
'variants' => ['400', '700', '800'],
'subsets' => ['korean', 'latin'],
'category' => 'sans-serif'
],
'Roboto Flex' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Inconsolata' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Noto Color Emoji' => [
'variants' => ['400'],
'subsets' => ['emoji'],
'category' => 'sans-serif'
],
'Hind Siliguri' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Schibsted Grotesk' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Josefin Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Jost' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Libre Franklin' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Space Grotesk' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Libre Baskerville' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Dancing Script' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Sans Thai' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'thai'],
'category' => 'sans-serif'
],
'Figtree' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Dosis' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Anton' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Barlow Condensed' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Serif JP' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Archivo' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'EB Garamond' => [
'variants' => ['400', '500', '600', '700', '800', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Arimo' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans SC' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['chinese-simplified', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bitter' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Cabin' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Cairo' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Teko' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Exo 2' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Abel' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'PT Sans Narrow' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Source Code Pro' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Crimson Text' => [
'variants' => ['400', 'italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Plus Jakarta Sans' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Hind' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Source Sans 3' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Assistant' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Varela Round' => [
'variants' => ['400'],
'subsets' => ['hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Oxygen' => [
'variants' => ['300', '400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Material Icons Round' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Pacifico' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'M PLUS Rounded 1c' => [
'variants' => ['100', '300', '400', '500', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Nanum Gothic Coding' => [
'variants' => ['400', '700'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Prompt' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Signika Negative' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Public Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Lexend' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Red Hat Display' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Arabic' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic'],
'category' => 'sans-serif'
],
'Saira Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Lobster' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Lilita One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'IBM Plex Mono' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Slabo 27px' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Fjalla One' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Caveat' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'IBM Plex Sans Arabic' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['arabic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Comfortaa' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Archivo Black' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Chakra Petch' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Sofia Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Cormorant Garamond' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Rajdhani' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Arvo' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Tajawal' => [
'variants' => ['200', '300', '400', '500', '700', '800', '900'],
'subsets' => ['arabic', 'latin'],
'category' => 'sans-serif'
],
'Abril Fatface' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Asap' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Overpass' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Material Icons Sharp' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Maven Pro' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Material Symbols Rounded' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Rowdies' => [
'variants' => ['300', '400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Zilla Slab' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans HK' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['chinese-hongkong', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Sora' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Shadows Into Light' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Play' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Barlow Semi Condensed' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'M PLUS 1p' => [
'variants' => ['100', '300', '400', '500', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Fira Sans Condensed' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Almarai' => [
'variants' => ['300', '400', '700', '800'],
'subsets' => ['arabic', 'latin'],
'category' => 'sans-serif'
],
'DM Serif Display' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Spicy Rice' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Nanum Myeongjo' => [
'variants' => ['400', '700', '800'],
'subsets' => ['korean', 'latin'],
'category' => 'serif'
],
'Material Icons Two Tone' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Permanent Marker' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Inter Tight' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Urbanist' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Passion One' => [
'variants' => ['400', '700', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Merriweather Sans' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'IBM Plex Serif' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Cormorant' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Indie Flower' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Questrial' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Crimson Pro' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Frank Ruhl Libre' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Vollkorn' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Satisfy' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Domine' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Cinzel' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Asap Condensed' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Archivo Narrow' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Source Serif 4' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Signika' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Righteous' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Be Vietnam Pro' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Oleo Script' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Exo' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Alegreya' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Marcellus' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Catamaran' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'sans-serif'
],
'Noto Kufi Arabic' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Acme' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Noto Sans Display' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Orbitron' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Amatic SC' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Lexend Deca' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Albert Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bowlby One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Sarabun' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Hind Madurai' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'sans-serif'
],
'Montserrat Alternates' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Squada One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Noto Serif KR' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Pirata One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Concert One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Tinos' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Spectral' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Great Vibes' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'League Spartan' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bree Serif' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Serif TC' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['chinese-traditional', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Mate' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Prata' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'vietnamese'],
'category' => 'serif'
],
'ABeeZee' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Rubik Mono One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Baloo Paaji 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Saira' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Merienda' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Yanone Kaffeesatz' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Patua One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Kalam' => [
'variants' => ['300', '400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Amiri' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Oxanium' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Changa' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bodoni Moda' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Bangers' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Antic Slab' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Cardo' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Crete Round' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Alegreya Sans' => [
'variants' => ['100', '100italic', '300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Roboto Serif' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Yantramanav' => [
'variants' => ['100', '300', '400', '500', '700', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Zen Kaku Gothic New' => [
'variants' => ['300', '400', '500', '700', '900'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Alfa Slab One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Noto Sans Bengali' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Space Mono' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Martel' => [
'variants' => ['200', '300', '400', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Silkscreen' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Alata' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Courgette' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Lobster Two' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'display'
],
'Sawarabi Mincho' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Russo One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Cantarell' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Chivo' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Gothic A1' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Encode Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Didact Gothic' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Neucha' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin'],
'category' => 'handwriting'
],
'Kaushan Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Gloria Hallelujah' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Yellowtail' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Mate SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Krub' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'PT Sans Caption' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Francois One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Old Standard TT' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Dela Gothic One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'greek', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Josefin Slab' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Sacramento' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Encode Sans Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Red Hat Text' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Sawarabi Gothic' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'DM Serif Text' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Ubuntu Condensed' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Philosopher' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Sen' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Inria Sans' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Yatra One' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noticia Text' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Libre Caslon Text' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Readex Pro' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Commissioner' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Courier Prime' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Gruppo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Onest' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Taviraj' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'serif'
],
'Rokkitt' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Itim' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'handwriting'
],
'Unna' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Luckiest Guy' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Zen Maru Gothic' => [
'variants' => ['300', '400', '500', '700', '900'],
'subsets' => ['cyrillic', 'greek', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Unbounded' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Monda' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Tenor Sans' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'JetBrains Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Kumbh Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Rubik Bubbles' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Neuton' => [
'variants' => ['200', '300', '400', 'italic', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Shippori Mincho' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Geologica' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Quattrocento' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Advent Pro' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Khand' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Poiret One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Baskervville' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Tamil' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'sans-serif'
],
'Sofia' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Libre Barcode 39' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Special Elite' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Tangerine' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Quattrocento Sans' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Paytone One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'League Gothic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Fira Sans Extra Condensed' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bricolage Grotesque' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Baloo Bhaijaan 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Aleo' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Bungee' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Vazirmatn' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Gelasio' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Noto Sans Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Allura' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Staatliches' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fraunces' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Sofia Sans Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Ubuntu Mono' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Patrick Hand' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'VT323' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Architects Daughter' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Playfair Display SC' => [
'variants' => ['400', 'italic', '700', '700italic', '900', '900italic'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Pathway Gothic One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'El Messiri' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'cyrillic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Cookie' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Cuprum' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Suez One' => [
'variants' => ['400'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'serif'
],
'News Cycle' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Mukta Malar' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'sans-serif'
],
'Hanken Grotesk' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'DM Mono' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Sanchez' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Yeseva One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'IBM Plex Sans Condensed' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Literata' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Instrument Sans' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Kosugi Maru' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playfair' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Baloo 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['devanagari', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Atkinson Hyperlegible' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Audiowide' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Parisienne' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Noto Serif SC' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['chinese-simplified', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Antonio' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Pridi' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'serif'
],
'Noto Naskh Arabic' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Fredoka' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Vidaloka' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Ropa Sans' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Handlee' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Petrona' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Mitr' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Ultra' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Epilogue' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Alice' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Material Symbols Sharp' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Bai Jamjuree' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Faustina' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Unica One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Syne' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Comic Neue' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Ramabhadra' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Creepster' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Arsenal' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Saira Semi Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'PT Mono' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Forum' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'display'
],
'Zeyada' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Noto Serif Bengali' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Libre Bodoni' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Amaranth' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Titan One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Sorts Mill Goudy' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Press Start 2P' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'display'
],
'Lalezar' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Hammersmith One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Gilda Display' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Bad Script' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Black Han Sans' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'sans-serif'
],
'Abhaya Libre' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'sinhala'],
'category' => 'serif'
],
'Carter One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Volkhov' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Playball' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Alex Brush' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Blinker' => [
'variants' => ['100', '200', '300', '400', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Black Ops One' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Homemade Apple' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'BIZ UDPGothic' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'greek-ext', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Gudea' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Rammetto One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Quantico' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Actor' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Six Caps' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Hind Vadodara' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Mada' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Viga' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Pinyon Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Newsreader' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Changa One' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'display'
],
'Radio Canada' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['canadian-aboriginal', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans Malayalam' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'malayalam'],
'category' => 'sans-serif'
],
'Mandali' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Cormorant Infant' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Monoton' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'STIX Two Text' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Lusitana' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Eczar' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['devanagari', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Wix Madefor Text' => [
'variants' => ['400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Alexandria' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Zen Old Mincho' => [
'variants' => ['400', '500', '600', '700', '900'],
'subsets' => ['cyrillic', 'greek', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Nanum Pen Script' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Calistoga' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Rock Salt' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Jura' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'kayah-li', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Reenie Beanie' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Istok Web' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Anuphan' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Share Tech Mono' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Caveat Brush' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Sriracha' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'handwriting'
],
'Niramit' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Cousine' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Aclonica' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Electrolize' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Marck Script' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Amita' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Alegreya Sans SC' => [
'variants' => ['100', '100italic', '300', '300italic', '400', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Julius Sans One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Londrina Solid' => [
'variants' => ['100', '300', '400', '900'],
'subsets' => ['latin'],
'category' => 'display'
],
'Berkshire Swash' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Varela' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Pangolin' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Oranienbaum' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Akshar' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Basic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Ruda' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Anonymous Pro' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'greek', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Fira Mono' => [
'variants' => ['400', '500', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Averia Serif Libre' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'display'
],
'Damion' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Cinzel Decorative' => [
'variants' => ['400', '700', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'GFS Didot' => [
'variants' => ['400'],
'subsets' => ['greek'],
'category' => 'serif'
],
'Martian Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Secular One' => [
'variants' => ['400'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Hebrew' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic-ext', 'greek-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Pragati Narrow' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Martel Sans' => [
'variants' => ['200', '300', '400', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Italianno' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Balsamiq Sans' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'display'
],
'Alef' => [
'variants' => ['400', '700'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'BenchNine' => [
'variants' => ['300', '400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Devanagari' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Nothing You Could Do' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Fugaz One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Sansita' => [
'variants' => ['400', 'italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif Display' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Pontano Sans' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Leckerli One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Georama' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Cabin Condensed' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Big Shoulders Display' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Noto Sans Symbols' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'symbols'],
'category' => 'sans-serif'
],
'Arapey' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Alumni Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Shrikhand' => [
'variants' => ['400'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'display'
],
'Mr Dafoe' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Bevan' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Economica' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Reem Kufi' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Chewy' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Charm' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'handwriting'
],
'Sarala' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Alatsi' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Racing Sans One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Syncopate' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Karma' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Golos Text' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Holtwood One SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Laila' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Adamina' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Khula' => [
'variants' => ['300', '400', '600', '700', '800'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Belleza' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Rufina' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Fredericka the Great' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Covered By Your Grace' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Kameron' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Fira Code' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Potta One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'IBM Plex Sans Thai' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'thai'],
'category' => 'sans-serif'
],
'Kaisei Decol' => [
'variants' => ['400', '500', '700'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Days One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Hind Guntur' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'sans-serif'
],
'Lemonada' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Nanum Brush Script' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Arya' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Kiwi Maru' => [
'variants' => ['300', '400', '500'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Shippori Mincho B1' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Athiti' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Julee' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Allison' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Seaweed Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Mrs Saint Delafield' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Saira Extra Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'M PLUS 1' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Yrsa' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Gochi Hand' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Coda' => [
'variants' => ['400', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Anton SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Judson' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Kreon' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Serif Thai' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'thai'],
'category' => 'serif'
],
'Darker Grotesque' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Glegoo' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Hachi Maru Pop' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Do Hyeon' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'sans-serif'
],
'Andika' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Gupter' => [
'variants' => ['400', '500', '700'],
'subsets' => ['latin'],
'category' => 'serif'
],
'PT Serif Caption' => [
'variants' => ['400', 'italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Boogaloo' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Livvic' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Averia Libre' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'display'
],
'Cabin Sketch' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Reddit Mono' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Palanquin' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Michroma' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Yuji Mai' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Marcellus SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Italiana' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Corben' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Cutive Mono' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Just Another Hand' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Spinnaker' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Candal' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Jua' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'sans-serif'
],
'Palanquin Dark' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Herr Von Muellerhoff' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Grandstander' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Eater' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Devanagari' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Rozha One' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Allerta Stencil' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'K2D' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Brygada 1918' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Moul' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Gabarito' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Quintessential' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Markazi Text' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Aldrich' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Zen Kaku Gothic Antique' => [
'variants' => ['300', '400', '500', '700', '900'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Podkova' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Besley' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'La Belle Aurore' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Rye' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Sintony' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Nastaliq Urdu' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Chango' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Sofia Sans Semi Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'BioRhyme' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Cantata One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Armata' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Ibarra Real Nova' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Annie Use Your Telescope' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Castoro' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Antic' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Scada' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Montserrat Subrayada' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Bowlby One SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Krona One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Lateef' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Arizonia' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Shadows Into Light Two' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Tomorrow' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Manjari' => [
'variants' => ['100', '400', '700'],
'subsets' => ['latin', 'latin-ext', 'malayalam'],
'category' => 'sans-serif'
],
'Graduate' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Inknut Antiqua' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Ovo' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Telex' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Sofia Sans Extra Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Overlock' => [
'variants' => ['400', 'italic', '700', '700italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Ms Madi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Mali' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'handwriting'
],
'Average Sans' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Oooh Baby' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Poetsen One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Petit Formal Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Pathway Extreme' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Zilla Slab Highlight' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Gowun Batang' => [
'variants' => ['400', '700'],
'subsets' => ['korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Baloo Da 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['bengali', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Nobile' => [
'variants' => ['400', 'italic', '500', '500italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Pattaya' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Chonburi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'display'
],
'Glory' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bellefair' => [
'variants' => ['400'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Lustria' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Cedarville Cursive' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Agbalumo' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Delius' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Gravitas One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Marmelad' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Knewave' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Caudex' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'David Libre' => [
'variants' => ['400', '500', '700'],
'subsets' => ['hebrew', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'serif'
],
'Nixie One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Wix Madefor Display' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Odibee Sans' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Caladea' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Trirong' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'serif'
],
'Mansalva' => [
'variants' => ['400'],
'subsets' => ['greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Schoolbell' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Agdasima' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Kosugi' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Cormorant Upright' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Norican' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Anek Malayalam' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'malayalam'],
'category' => 'sans-serif'
],
'Allerta' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Rasa' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['gujarati', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Overpass Mono' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Coming Soon' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Proza Libre' => [
'variants' => ['400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Irish Grover' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Inria Serif' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Style Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Halant' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Share' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Arbutus Slab' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Rosario' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Lexend Zetta' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Hepta Slab' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Kurale' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Limelight' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Metrophobic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Radley' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Wallpoet' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Big Shoulders Text' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Jaldi' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Yesteryear' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'M PLUS 2' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Contrail One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Sigmar One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Cormorant SC' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Stardos Stencil' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Grand Hotel' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Koulen' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Fahkwang' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Encode Sans Semi Condensed' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Rethink Sans' => [
'variants' => ['400', '500', '600', '700', '800', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bungee Shade' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Poly' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Rambla' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Love Ya Like A Sister' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Rancho' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Alegreya SC' => [
'variants' => ['400', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Caprasimo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Spline Sans' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'UnifrakturMaguntia' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Klee One' => [
'variants' => ['400', '600'],
'subsets' => ['cyrillic', 'greek-ext', 'japanese', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Oxygen Mono' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Amiko' => [
'variants' => ['400', '600', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Mountains of Christmas' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Buenard' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Hahmlet' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Noto Sans Kannada' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Jomhuria' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Waiting for the Sunrise' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Fresca' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Fjord One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Grenze Gotisch' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Lexend Exa' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Shantell Sans' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'IM Fell English' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Esteban' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Macondo' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Niconne' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Short Stack' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Poller One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Mochiy Pop One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin'],
'category' => 'sans-serif'
],
'Jaro' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Rochester' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Calligraffitti' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Kristi' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Enriqueta' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Biryani' => [
'variants' => ['200', '300', '400', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Gantari' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Spectral SC' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'B612' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Dongle' => [
'variants' => ['300', '400', '700'],
'subsets' => ['korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bungee Inline' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Sarpanch' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Antic Didone' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Encode Sans Expanded' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Maitree' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'serif'
],
'Notable' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'MuseoModerno' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Atma' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'display'
],
'Anek Latin' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Azeret Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Rakkas' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'display'
],
'RocknRoll One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Molengo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'BIZ UDGothic' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'greek-ext', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Aboreto' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fanwood Text' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Magra' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Gotu' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bentham' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Dawning of a New Day' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Solway' => [
'variants' => ['300', '400', '500', '700', '800'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Gabriela' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Goudy Bookletter 1911' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'IBM Plex Sans JP' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Montserrat Underline' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Andada Pro' => [
'variants' => ['400', '500', '600', '700', '800', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Noto Sans Khmer' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['khmer', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Gurajada' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'serif'
],
'Turret Road' => [
'variants' => ['200', '300', '400', '500', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'B612 Mono' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'monospace'
],
'Zen Kurenaido' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'greek', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Expletus Sans' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Miriam Libre' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Average' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Emoji' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['emoji'],
'category' => 'sans-serif'
],
'Bellota Text' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Carrois Gothic' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Noto Sans Georgian' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic-ext', 'georgian', 'greek-ext', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Cambay' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Mallanna' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Syne Mono' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Sniglet' => [
'variants' => ['400', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Suranna' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'serif'
],
'Copse' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Vesper Libre' => [
'variants' => ['400', '500', '700', '900'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Happy Monkey' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Chelsea Market' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Zen Antique' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'greek', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Lao Looped' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['lao', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Capriola' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Alike Angular' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Sixtyfour Convergence' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'monospace'
],
'Tilt Neon' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Noto Sans Armenian' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['armenian', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'DotGothic16' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Meetei Mayek' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'meetei-mayek'],
'category' => 'sans-serif'
],
'Cormorant Unicase' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Sansita Swashed' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Bubblegum Sans' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Alike' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Voltaire' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Libre Barcode 39 Extended Text' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Murecho' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'KoHo' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Meddon' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'IM Fell English SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Young Serif' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Coustard' => [
'variants' => ['400', '900'],
'subsets' => ['latin'],
'category' => 'serif'
],
'SUSE' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Square Peg' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Vina Sans' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Ma Shan Zheng' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'handwriting'
],
'Brawler' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Faster One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Federo' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Gloock' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Monsieur La Doulaise' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Trocchi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Jockey One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif HK' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['chinese-hongkong', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Sunflower' => [
'variants' => ['300', '500', '700'],
'subsets' => ['korean', 'latin'],
'category' => 'sans-serif'
],
'Cutive' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Zen Dots' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Nova Mono' => [
'variants' => ['400'],
'subsets' => ['greek', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Gluten' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Baloo Thambi 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'tamil', 'vietnamese'],
'category' => 'display'
],
'Protest Revolution' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'display'
],
'Afacad' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Kadwa' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'IM Fell DW Pica' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Familjen Grotesk' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Fauna One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Pixelify Sans' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'display'
],
'BIZ UDPMincho' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'greek-ext', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Aguafina Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Ephesis' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Prosto One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Sinhala' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'sinhala'],
'category' => 'sans-serif'
],
'Fuggles' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Rampart One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'display'
],
'Imbue' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Marvel' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Della Respira' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Vollkorn SC' => [
'variants' => ['400', '600', '700', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Croissant One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Coiny' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tamil', 'vietnamese'],
'category' => 'display'
],
'Aref Ruqaa' => [
'variants' => ['400', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Battambang' => [
'variants' => ['100', '300', '400', '700', '900'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Yusei Magic' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'IBM Plex Sans KR' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Quando' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Hurricane' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Sedgwick Ave' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Kalnia' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'math'],
'category' => 'serif'
],
'Aladin' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Lekton' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Oregano' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Baloo Chettan 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'malayalam', 'vietnamese'],
'category' => 'display'
],
'Goblin One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Libre Barcode 128' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Fondamento' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Kelly Slab' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'display'
],
'ZCOOL XiaoWei' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'sans-serif'
],
'ZCOOL QingKe HuangYou' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'sans-serif'
],
'McLaren' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Baloo Tamma 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['kannada', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Qwigley' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Kaisei Opti' => [
'variants' => ['400', '500', '700'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Goldman' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Over the Rainbow' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Instrument Serif' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Major Mono Display' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Galada' => [
'variants' => ['400'],
'subsets' => ['bengali', 'latin'],
'category' => 'display'
],
'Black And White Picture' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Noto Sans Telugu' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'sans-serif'
],
'Supermercado One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Encode Sans Semi Expanded' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Libre Caslon Display' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Elsie' => [
'variants' => ['400', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Sue Ellen Francisco' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Clicker Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'NTR' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Prociono' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Share Tech' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Reddit Sans' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Vast Shadow' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Cambo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Lemon' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Thasadith' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'ADLaM Display' => [
'variants' => ['400'],
'subsets' => ['adlam', 'latin', 'latin-ext'],
'category' => 'display'
],
'Xanh Mono' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'IM Fell Double Pica' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Belanosima' => [
'variants' => ['400', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Asul' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Mr De Haviland' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Rouge Script' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'League Script' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Flow Circular' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Nova Square' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Gujarati' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['gujarati', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Mukta Vaani' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Raleway Dots' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Kodchasan' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'sans-serif'
],
'Geo' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Megrim' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Allan' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Salsa' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Tiro Bangla' => [
'variants' => ['400', 'italic'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Walter Turncoat' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Montaga' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Protest Strike' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'display'
],
'Tilt Warp' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Euphoria Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Kufam' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Mukta Mahee' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bigshot One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Skranji' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Hi Melody' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Crafty Girls' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Zen Antique Soft' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'greek', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Lexend Peta' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Tenali Ramakrishna' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Amethysta' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Averia Sans Libre' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'display'
],
'Finger Paint' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Host Grotesk' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Hanuman' => [
'variants' => ['100', '300', '400', '700', '900'],
'subsets' => ['khmer', 'latin'],
'category' => 'serif'
],
'Corinthia' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Oleo Script Swash Caps' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Puritan' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Amarante' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fontdiner Swanky' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Ruslan Display' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Gugi' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Pompiere' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Mouse Memoirs' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Kranky' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Headland One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Inder' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Shippori Antique' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Just Me Again Down Here' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Sumana' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Imprima' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Orelega One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'display'
],
'Recursive' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans Myanmar' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['myanmar'],
'category' => 'sans-serif'
],
'Kenia' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Germania One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Bakbak One' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Padauk' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'myanmar'],
'category' => 'sans-serif'
],
'Loved by the King' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Red Rose' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Libre Barcode 39 Text' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Kdam Thmor Pro' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Hina Mincho' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Vibur' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Sarina' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Farro' => [
'variants' => ['300', '400', '500', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Sofadi One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Gowun Dodum' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Iceberg' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Give You Glory' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'BhuTuka Expanded One' => [
'variants' => ['400'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Gamja Flower' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Cherry Cream Soda' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Montagu Slab' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Charis SIL' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Road Rage' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Qwitcher Grypen' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'REM' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Libre Barcode 128 Text' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Metamorphous' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Birthstone' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Meow Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Baloo Bhai 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['gujarati', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Wendy One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'ZCOOL KuaiLe' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'sans-serif'
],
'Lacquer' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Smooch' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Codystar' => [
'variants' => ['300', '400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Math' => [
'variants' => ['400'],
'subsets' => ['math'],
'category' => 'sans-serif'
],
'Bellota' => [
'variants' => ['300', '300italic', '400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Kaisei Tokumin' => [
'variants' => ['400', '500', '700', '800'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Doppio One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Dokdo' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Slackey' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Bona Nova' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Anek Devanagari' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Homenaje' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Peralta' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Ubuntu Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Original Surfer' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Anybody' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Carme' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Lily Script One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Montez' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Bayon' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'sans-serif'
],
'Lovers Quarrel' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Bilbo Swash Caps' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Tienne' => [
'variants' => ['400', '700', '900'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Viaoda Libre' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Anek Bangla' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Dekko' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Mako' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Yuji Syuku' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Saira Stencil One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Harmattan' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Duru Sans' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Macondo Swash Caps' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Patrick Hand SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Reggae One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Georgian' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['georgian', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Cantora One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'DynaPuff' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'display'
],
'Artifika' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Charmonman' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'handwriting'
],
'Anaheim' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Balthazar' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Barriecito' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Katibeh' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Mogra' => [
'variants' => ['400'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'display'
],
'Unkempt' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Nova Round' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Buhid' => [
'variants' => ['400'],
'subsets' => ['buhid', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Slabo 13px' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Shanti' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Almendra' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Oriya' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'oriya'],
'category' => 'sans-serif'
],
'Mochiy Pop P One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin'],
'category' => 'sans-serif'
],
'Freehand' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'AR One Sans' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Gemunu Libre' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'sinhala'],
'category' => 'sans-serif'
],
'Comforter Brush' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Trade Winds' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Ruthie' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Numans' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Asar' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Redressed' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Life Savers' => [
'variants' => ['400', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Metal Mania' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Dynalight' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bokor' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Wire One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Arima' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['greek', 'greek-ext', 'latin', 'latin-ext', 'malayalam', 'tamil', 'vietnamese'],
'category' => 'display'
],
'Piazzolla' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Monofett' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Henny Penny' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Ledger' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Manuale' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Ga Maamli' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Nokora' => [
'variants' => ['100', '300', '400', '700', '900'],
'subsets' => ['khmer', 'latin'],
'category' => 'sans-serif'
],
'Tauri' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'The Girl Next Door' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Mirza' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Fenix' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Chocolate Classical Sans' => [
'variants' => ['400'],
'subsets' => ['chinese-hongkong', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Sail' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Zhi Mang Xing' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'handwriting'
],
'Akaya Kanadaka' => [
'variants' => ['400'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'display'
],
'Overlock SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Sulphur Point' => [
'variants' => ['300', '400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Platypi' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Monomaniac One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Convergence' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'IBM Plex Sans Hebrew' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Parkinsans' => [
'variants' => ['300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Autour One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Gaegu' => [
'variants' => ['300', '400', '700'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Scope One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Gurmukhi' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Baloo Tammudu 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'telugu', 'vietnamese'],
'category' => 'display'
],
'Delius Unicase' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Rum Raisin' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Uncial Antiqua' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Malayalam' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'malayalam'],
'category' => 'serif'
],
'Frijole' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Akronim' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Cherry Swash' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Modak' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Baumans' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Stick' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bodoni Moda SC' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Ysabeau Office' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Shojumaru' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Radio Canada Big' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Song Myung' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'serif'
],
'Delius Swash Caps' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'MonteCarlo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Baskervville SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Belgrano' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Varta' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Pavanam' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'sans-serif'
],
'WindSong' => [
'variants' => ['400', '500'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Carlito' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Underdog' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Modern Antiqua' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fragment Mono' => [
'variants' => ['400', 'italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Gorditas' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Freckle Face' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Rosarivo' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Rhodium Libre' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Ceviche One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Red Hat Mono' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Emilys Candy' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Vujahday Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Whisper' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Edu SA Beginner' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Mohave' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Kantumruy Pro' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['khmer', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Tektur' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Sunshiney' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Baloo Bhaina 2' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'oriya', 'vietnamese'],
'category' => 'display'
],
'Voces' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Ribeye' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Edu VIC WA NT Beginner' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Thai Looped' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'thai'],
'category' => 'sans-serif'
],
'Sancreek' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Miniver' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Anek Tamil' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'sans-serif'
],
'Afacad Flux' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'IM Fell French Canon' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Chau Philomene One' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Vampiro One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Tiro Devanagari Hindi' => [
'variants' => ['400', 'italic'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Crushed' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Gayathri' => [
'variants' => ['100', '400', '700'],
'subsets' => ['latin', 'malayalam'],
'category' => 'sans-serif'
],
'East Sea Dokdo' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'handwriting'
],
'Alkatra' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['bengali', 'devanagari', 'latin', 'latin-ext', 'oriya'],
'category' => 'display'
],
'Sedgwick Ave Display' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'MedievalSharp' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Rubik Moonrocks' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Maiden Orange' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Stick No Bills' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'sinhala'],
'category' => 'sans-serif'
],
'Gafata' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Eagle Lake' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Borel' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'handwriting'
],
'Denk One' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Rationale' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Kablammo' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Caesar Dressing' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Unlock' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Engagement' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Orienta' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Swanky and Moo Moo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Angkor' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Medula One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'IM Fell DW Pica SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Beth Ellen' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Tilt Prism' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Carattere' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Strait' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Abyssinica SIL' => [
'variants' => ['400'],
'subsets' => ['ethiopic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Asset' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Kavivanar' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'handwriting'
],
'Khmer' => [
'variants' => ['400'],
'subsets' => ['khmer'],
'category' => 'sans-serif'
],
'Chivo Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Playpen Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['emoji', 'latin', 'latin-ext', 'math', 'vietnamese'],
'category' => 'handwriting'
],
'Flamenco' => [
'variants' => ['300', '400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Rubik Scribble' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'IM Fell Great Primer' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Texturina' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Scheherazade New' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Keania One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bungee Spice' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Noto Serif Telugu' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'serif'
],
'Tillana' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Nosifer' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Nova Flat' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fuzzy Bubbles' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Iceland' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Gentium Plus' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Stylish' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'sans-serif'
],
'Gulzar' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'The Nautigal' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Sans Glagolitic' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'glagolitic', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Yomogi' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Meera Inimai' => [
'variants' => ['400'],
'subsets' => ['latin', 'tamil'],
'category' => 'sans-serif'
],
'Redacted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Long Cang' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'handwriting'
],
'Lexend Giga' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Delicious Handrawn' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Licorice' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Rubik Dirt' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Fustat' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Timmana' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Barrio' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Londrina Outline' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Ewert' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'IM Fell Double Pica SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Zen Tokyo Zoo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Suwannaphum' => [
'variants' => ['100', '300', '400', '700', '900'],
'subsets' => ['khmer', 'latin'],
'category' => 'serif'
],
'Ranchers' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Kannada' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Liu Jian Mao Cao' => [
'variants' => ['400'],
'subsets' => ['chinese-simplified', 'latin'],
'category' => 'handwriting'
],
'Akatab' => [
'variants' => ['400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'tifinagh'],
'category' => 'sans-serif'
],
'Handjet' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'armenian', 'cyrillic', 'cyrillic-ext', 'greek', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Meie Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Noto Sans Ethiopic' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['ethiopic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Karantina' => [
'variants' => ['300', '400', '700'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Nerko One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Madimi One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'IM Fell Great Primer SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Grape Nuts' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'UnifrakturCook' => [
'variants' => ['700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Akaya Telivigala' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'display'
],
'Zain' => [
'variants' => ['200', '300', '300italic', '400', 'italic', '700', '800', '900'],
'subsets' => ['arabic', 'latin'],
'category' => 'sans-serif'
],
'Mina' => [
'variants' => ['400', '700'],
'subsets' => ['bengali', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Cute Font' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Cagliostro' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Alkalami' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Port Lligat Slab' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Atomic Age' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Text Me One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Braah One' => [
'variants' => ['400'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Stalemate' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'IM Fell French Canon SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Sonsie One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Margarine' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Kode Mono' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Jomolhari' => [
'variants' => ['400'],
'subsets' => ['latin', 'tibetan'],
'category' => 'serif'
],
'Ramaraja' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'serif'
],
'Farsan' => [
'variants' => ['400'],
'subsets' => ['gujarati', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Simonetta' => [
'variants' => ['400', 'italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Nova Slim' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Moon Dance' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Miltonian Tattoo' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Carrois Gothic SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Mystery Quest' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Smythe' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Solitreo' => [
'variants' => ['400'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Kite One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Seymour One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Erica One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Waterfall' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Srisakdi' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'thai', 'vietnamese'],
'category' => 'display'
],
'Risque' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Playwrite GB S' => [
'variants' => ['100', '200', '300', '400', '100italic', '200italic', '300italic', 'italic'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Astloch' => [
'variants' => ['400', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Kulim Park' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Rubik Doodle Shadow' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Nova Oval' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Sura' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Mooli' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Poltawski Nowy' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Spirax' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Hind Mysuru' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Chicle' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Train One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'display'
],
'Girassol' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Ribeye Marrow' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fascinate Inline' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Genos' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cherokee', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Passions Conflict' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Birthstone Bounce' => [
'variants' => ['400', '500'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Gasoek One' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bruno Ace SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bungee Hairline' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Cherry Bomb One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'New Rocker' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'M PLUS 1 Code' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Habibi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Elsie Swash Caps' => [
'variants' => ['400', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Paprika' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Nova Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Nova Cut' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Anek Telugu' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'sans-serif'
],
'Miltonian' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Lexend Mega' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Sree Krushnadevaraya' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'serif'
],
'Edu TAS Beginner' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite HR Lijeva' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Anatolian Hieroglyphs' => [
'variants' => ['400'],
'subsets' => ['anatolian-hieroglyphs', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Honk' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'display'
],
'Protest Riot' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'display'
],
'Truculenta' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bona Nova SC' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Londrina Shadow' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Milonga' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Piedra' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Jacques Francois Shadow' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Comforter' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Tiny5' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Dorsa' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Edu AU VIC WA NT Pre' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Stoke' => [
'variants' => ['300', '400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Beau Rivage' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Phudu' => [
'variants' => ['300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Sevillana' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Shippori Antique B1' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Grenze' => [
'variants' => ['100', '100italic', '200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Festive' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Imperial Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Spline Sans Mono' => [
'variants' => ['300', '400', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Praise' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Playwrite CU' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Sono' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Kaisei HarunoUmi' => [
'variants' => ['400', '500', '700'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Stint Ultra Condensed' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Jolly Lodger' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Tac One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Gentium Book Plus' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Edu AU VIC WA NT Hand' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Kavoon' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bilbo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Content' => [
'variants' => ['400', '700'],
'subsets' => ['khmer'],
'category' => 'display'
],
'Benne' => [
'variants' => ['400'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Donegal One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Micro 5' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Chathura' => [
'variants' => ['100', '300', '400', '700', '800'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Trispace' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Libre Barcode 39 Extended' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Shalimar' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Trykker' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Yaldevi' => [
'variants' => ['200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'sinhala'],
'category' => 'sans-serif'
],
'Luxurious Script' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Mynerve' => [
'variants' => ['400'],
'subsets' => ['greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Fasthand' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Smooch Sans' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Ruluko' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Caramel' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Ysabeau SC' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Port Lligat Sans' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Anek Gujarati' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Anta' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Almendra SC' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Playwrite US Trad' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Gwendolyn' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Offside' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bubbler One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Symbols 2' => [
'variants' => ['400'],
'subsets' => ['braille', 'latin', 'latin-ext', 'math', 'mayan-numerals', 'symbols'],
'category' => 'sans-serif'
],
'Junge' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Big Shoulders Stencil Text' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Big Shoulders Inline Text' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'BIZ UDMincho' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'greek-ext', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Rubik Wet Paint' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Federant' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Noto Serif Ahom' => [
'variants' => ['400'],
'subsets' => ['ahom', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Sahitya' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Mingzat' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'lepcha'],
'category' => 'sans-serif'
],
'Edu NSW ACT Foundation' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Preahvihear' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'sans-serif'
],
'Stint Ultra Expanded' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Koh Santepheap' => [
'variants' => ['100', '300', '400', '700', '900'],
'subsets' => ['khmer', 'latin'],
'category' => 'serif'
],
'Jacques Francois' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Finlandica' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Freeman' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Inika' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Kotta One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'New Tegomin' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Sedan SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Linden Hill' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Marko One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'serif'
],
'Lavishly Yours' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Kumar One Outline' => [
'variants' => ['400'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'display'
],
'Yeon Sung' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Lugrasimo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Galdeano' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Joan' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Dangrek' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Tulpen One' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Joti One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Tourney' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'IBM Plex Sans Devanagari' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic-ext', 'devanagari', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Felipa' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Averia Gruesa Libre' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Buda' => [
'variants' => ['300'],
'subsets' => ['latin'],
'category' => 'display'
],
'Poor Story' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Oi' => [
'variants' => ['400'],
'subsets' => ['arabic', 'cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'tamil', 'vietnamese'],
'category' => 'display'
],
'Playwrite DE Grund' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Mrs Sheppards' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Englebert' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif Armenian' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['armenian', 'latin', 'latin-ext'],
'category' => 'serif'
],
'IBM Plex Sans Thai Looped' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'thai'],
'category' => 'sans-serif'
],
'Ojuju' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Gidugu' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'sans-serif'
],
'Smokum' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Ranga' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Bruno Ace' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Gothic' => [
'variants' => ['400'],
'subsets' => ['gothic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Peddana' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'serif'
],
'Water Brush' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Aoboshi One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Anek Gurmukhi' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Lancelot' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'New Amsterdam' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bigelow Rules' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Glass Antiqua' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Condiment' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Libre Barcode EAN13 Text' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Kirang Haerang' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin'],
'category' => 'display'
],
'Princess Sofia' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Lexend Tera' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Ysabeau Infant' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans Tangsa' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'tangsa'],
'category' => 'sans-serif'
],
'Galindo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Adlam' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['adlam', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Bahiana' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Fascinate' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Kumar One' => [
'variants' => ['400'],
'subsets' => ['gujarati', 'latin', 'latin-ext'],
'category' => 'display'
],
'Flow Rounded' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Darumadrop One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'display'
],
'Romanesco' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Grey Qo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Serif Hebrew' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['hebrew', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Blaka' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Qahiri' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin'],
'category' => 'sans-serif'
],
'Noto Sans Lao' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['lao', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Ysabeau' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'sans-serif'
],
'Arbutus' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Metal' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Anek Kannada' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Marhey' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Jacquard 12' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Castoro Titling' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bungee Outline' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Labrada' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Lakki Reddy' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'handwriting'
],
'Sometype Mono' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Rubik Glitch' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Cairo Play' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Funnel Display' => [
'variants' => ['300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Chilanka' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'malayalam'],
'category' => 'handwriting'
],
'Trochut' => [
'variants' => ['400', 'italic', '700'],
'subsets' => ['latin'],
'category' => 'display'
],
'Sour Gummy' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Send Flowers' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Wellfleet' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Snippet' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'sans-serif'
],
'Lumanosimo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Alumni Sans Inline One' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Foldit' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Bonheur Royale' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Climate Crisis' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Oriya' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'oriya'],
'category' => 'serif'
],
'Hedvig Letters Sans' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Dr Sugiyama' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Diplomata SC' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Ravi Prakash' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'display'
],
'Big Shoulders Stencil Display' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Griffy' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Amiri Quran' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin'],
'category' => 'serif'
],
'Chenla' => [
'variants' => ['400'],
'subsets' => ['khmer'],
'category' => 'display'
],
'Ballet' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Almendra Display' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Encode Sans SC' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Hubballi' => [
'variants' => ['400'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif Khmer' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['khmer', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Odor Mean Chey' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'serif'
],
'Uchen' => [
'variants' => ['400'],
'subsets' => ['latin', 'tibetan'],
'category' => 'serif'
],
'Butterfly Kids' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Geist' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Vibes' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin'],
'category' => 'display'
],
'Noto Serif Tamil' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'serif'
],
'Tiro Telugu' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext', 'telugu'],
'category' => 'serif'
],
'Wittgenstein' => [
'variants' => ['400', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Hanalei Fill' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Babylonica' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Flavors' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Mea Culpa' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Single Day' => [
'variants' => ['400'],
'subsets' => ['korean'],
'category' => 'display'
],
'Stalinist One' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Gideon Roman' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Faculty Glyphic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Sirin Stencil' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Geist Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'monospace'
],
'Dhurjati' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'sans-serif'
],
'Revalia' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Reddit Sans Condensed' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Bagel Fat One' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'display'
],
'Siemreap' => [
'variants' => ['400'],
'subsets' => ['khmer'],
'category' => 'sans-serif'
],
'Molle' => [
'variants' => ['italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Noto Sans Samaritan' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'samaritan'],
'category' => 'sans-serif'
],
'Phetsarath' => [
'variants' => ['400', '700'],
'subsets' => ['lao'],
'category' => 'serif'
],
'Victor Mono' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'monospace'
],
'Bonbon' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Osmanya' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'osmanya'],
'category' => 'sans-serif'
],
'Chela One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Plaster' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Bacasime Antique' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Jersey 20' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Comme' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Aref Ruqaa Ink' => [
'variants' => ['400', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Rubik Glitch Pop' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Teachers' => [
'variants' => ['400', '500', '600', '700', '800', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['greek-ext', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Fruktur' => [
'variants' => ['400', 'italic'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Alumni Sans Pinstripe' => [
'variants' => ['400', 'italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'GFS Neohellenic' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['greek'],
'category' => 'sans-serif'
],
'Inclusive Sans' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Updock' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Londrina Sketch' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Rubik Iso' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Syriac Eastern' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'syriac'],
'category' => 'sans-serif'
],
'Hedvig Letters Serif' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Reem Kufi Fun' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Rashi Hebrew' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['greek-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Mr Bedfort' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Inspiration' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Jersey 10' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Aubrey' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Fleur De Leah' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Neonderthaw' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Playwrite HU' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Luxurious Roman' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Funnel Sans' => [
'variants' => ['300', '400', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Jim Nightshade' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Butcherman' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Combo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Diplomata' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Rubik Beastly' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Oldenburg' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Purple Purse' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Tiro Devanagari Marathi' => [
'variants' => ['400', 'italic'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Yuji Boku' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'japanese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Langar' => [
'variants' => ['400'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'display'
],
'Rubik Distressed' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Emblema One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans NKo Unjoined' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'nko'],
'category' => 'sans-serif'
],
'Jacquard 24' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'BioRhyme Expanded' => [
'variants' => ['200', '300', '400', '700', '800'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Tiro Devanagari Sanskrit' => [
'variants' => ['400', 'italic'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Miss Fajardose' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Lunasima' => [
'variants' => ['400', '700'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'hebrew', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Reem Kufi Ink' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Nabla' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'math', 'vietnamese'],
'category' => 'display'
],
'Edu AU VIC WA NT Dots' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Tiro Tamil' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext', 'tamil'],
'category' => 'serif'
],
'Edu AU VIC WA NT Arrows' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Jacquarda Bastarda 9' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Explora' => [
'variants' => ['400'],
'subsets' => ['cherokee', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Grechen Fuemen' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Nuosu SIL' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'yi'],
'category' => 'sans-serif'
],
'Sigmar' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Kalnia Glaze' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Doto' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif Lao' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['lao', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Serif Balinese' => [
'variants' => ['400'],
'subsets' => ['balinese', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Devonshire' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Passero One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Love Light' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Arsenal SC' => [
'variants' => ['400', 'italic', '700', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Tsukimi Rounded' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Rubik Doodle Triangles' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Noto Serif Sinhala' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'sinhala'],
'category' => 'serif'
],
'Noto Sans Javanese' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['javanese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Konkhmer Sleokchher' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin', 'latin-ext'],
'category' => 'display'
],
'Alumni Sans Collegiate One' => [
'variants' => ['400', 'italic'],
'subsets' => ['cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Playwrite HR' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Syloti Nagri' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'syloti-nagri'],
'category' => 'sans-serif'
],
'Noto Serif Tibetan' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'tibetan'],
'category' => 'serif'
],
'Orbit' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Cactus Classical Serif' => [
'variants' => ['400'],
'subsets' => ['chinese-hongkong', 'cyrillic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Sedan' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'serif'
],
'Rubik Vinyl' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Workbench' => [
'variants' => ['400'],
'subsets' => ['latin', 'math', 'symbols'],
'category' => 'monospace'
],
'Mona Sans' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Serif Khitan Small Script' => [
'variants' => ['400'],
'subsets' => ['khitan-small-script', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Island Moments' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Bahianita' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Moderustic' => [
'variants' => ['300', '400', '500', '600', '700', '800'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Anek Odia' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'oriya'],
'category' => 'sans-serif'
],
'Redacted Script' => [
'variants' => ['300', '400', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Dai Banna SIL' => [
'variants' => ['300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
'subsets' => ['latin', 'latin-ext', 'new-tai-lue'],
'category' => 'serif'
],
'Petemoss' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Serif Gujarati' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['gujarati', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'M PLUS Code Latin' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Kolker Brush' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Geostar' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Noto Traditional Nushu' => [
'variants' => ['300', '400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'nushu'],
'category' => 'sans-serif'
],
'Twinkle Star' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Serif Khojki' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['khojki', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Diphylleia' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Rubik Puddles' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'My Soul' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Sans Coptic' => [
'variants' => ['400'],
'subsets' => ['coptic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Splash' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Music' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'music'],
'category' => 'sans-serif'
],
'Noto Sans Mongolian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'mongolian', 'symbols'],
'category' => 'sans-serif'
],
'Hubot Sans' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Snowburst One' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Vithkuqi' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vithkuqi'],
'category' => 'serif'
],
'Noto Sans Cypro Minoan' => [
'variants' => ['400'],
'subsets' => ['cypro-minoan', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Sora Sompeng' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'sora-sompeng'],
'category' => 'sans-serif'
],
'Tai Heritage Pro' => [
'variants' => ['400', '700'],
'subsets' => ['latin', 'latin-ext', 'tai-viet', 'vietnamese'],
'category' => 'serif'
],
'Suravaram' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'serif'
],
'Big Shoulders Inline Display' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Playwrite IS' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Jersey 20 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Playwrite AR' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Taprom' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'display'
],
'Sixtyfour' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'monospace'
],
'Moulpali' => [
'variants' => ['400'],
'subsets' => ['khmer', 'latin'],
'category' => 'sans-serif'
],
'Sassy Frass' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Kings' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Ponnala' => [
'variants' => ['400'],
'subsets' => ['latin', 'telugu'],
'category' => 'display'
],
'Protest Guerrilla' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'vietnamese'],
'category' => 'display'
],
'Jersey 25' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Palette Mosaic' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin'],
'category' => 'display'
],
'Matemasie' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Tapestry' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Ruge Boogie' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Beiruti' => [
'variants' => ['200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['arabic', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Rubik Spray Paint' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Old Hungarian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-hungarian'],
'category' => 'sans-serif'
],
'Noto Sans Tagalog' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tagalog'],
'category' => 'sans-serif'
],
'Noto Serif Myanmar' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['myanmar'],
'category' => 'serif'
],
'Rubik 80s Fade' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Bungee Tint' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Moirai One' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Carian' => [
'variants' => ['400'],
'subsets' => ['carian', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Tiro Gurmukhi' => [
'variants' => ['400', 'italic'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Geostar Fill' => [
'variants' => ['400'],
'subsets' => ['latin'],
'category' => 'display'
],
'Playwrite IT Moderna' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Ruwudu' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Zen Loop' => [
'variants' => ['400', 'italic'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Playwrite FR Moderne' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Edu QLD Beginner' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Serif Ethiopic' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['ethiopic', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Rock 3D' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin'],
'category' => 'display'
],
'Sankofa Display' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'sans-serif'
],
'Noto Sans Canadian Aboriginal' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['canadian-aboriginal', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Noto Sans Tai Viet' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tai-viet'],
'category' => 'sans-serif'
],
'Danfo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'serif'
],
'Tiro Kannada' => [
'variants' => ['400', 'italic'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Shizuru' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin'],
'category' => 'display'
],
'Cherish' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Serif NP Hmong' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'nyiakeng-puachue-hmong'],
'category' => 'serif'
],
'Playwrite AU NSW' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Nandinagari' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'nandinagari'],
'category' => 'sans-serif'
],
'Moo Lah Lah' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Jacquard 12 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'LXGW WenKai Mono TC' => [
'variants' => ['300', '400', '700'],
'subsets' => ['chinese-hongkong', 'cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'lisu', 'vietnamese'],
'category' => 'monospace'
],
'Playwrite BE VLG' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Hanalei' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Tangut' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tangut'],
'category' => 'serif'
],
'Ole' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Edu AU VIC WA NT Guides' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'handwriting'
],
'Noto Sans Sharada' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'sharada'],
'category' => 'sans-serif'
],
'Noto Sans Nag Mundari' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'nag-mundari'],
'category' => 'sans-serif'
],
'Flow Block' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Estonia' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'LXGW WenKai TC' => [
'variants' => ['300', '400', '700'],
'subsets' => ['chinese-hongkong', 'cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext', 'lisu', 'vietnamese'],
'category' => 'handwriting'
],
'Jersey 15' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Rubik Gemstones' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Namdhinggo' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['latin', 'latin-ext', 'limbu'],
'category' => 'serif'
],
'Syne Tactile' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Slackside One' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Playwrite ES' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Ingrid Darling' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Sans Cherokee' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cherokee', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite AU SA' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Jaini' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Are You Serious' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Sans Hanunoo' => [
'variants' => ['400'],
'subsets' => ['hanunoo', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Serif Toto' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'toto'],
'category' => 'serif'
],
'Noto Sans Linear A' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'linear-a'],
'category' => 'sans-serif'
],
'Rubik Marker Hatch' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Warnes' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans New Tai Lue' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'new-tai-lue'],
'category' => 'sans-serif'
],
'Grandiflora One' => [
'variants' => ['400'],
'subsets' => ['korean', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Old Italic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-italic'],
'category' => 'sans-serif'
],
'Rubik Burned' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Yezidi' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'yezidi'],
'category' => 'serif'
],
'Blaka Hollow' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Annapurna SIL' => [
'variants' => ['400', '700'],
'subsets' => ['devanagari', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Noto Serif Dogra' => [
'variants' => ['400'],
'subsets' => ['dogra', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Bamum' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['bamum', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Avestan' => [
'variants' => ['400'],
'subsets' => ['avestan', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Marchen' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'marchen'],
'category' => 'sans-serif'
],
'Playwrite MX' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite GB J' => [
'variants' => ['100', '200', '300', '400', '100italic', '200italic', '300italic', 'italic'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Thaana' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'thaana'],
'category' => 'sans-serif'
],
'Noto Sans Indic Siyaq Numbers' => [
'variants' => ['400'],
'subsets' => ['indic-siyaq-numbers', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite AT' => [
'variants' => ['100', '200', '300', '400', '100italic', '200italic', '300italic', 'italic'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Karla Tamil Inclined' => [
'variants' => ['400', '700'],
'subsets' => ['tamil'],
'category' => 'sans-serif'
],
'Noto Sans Khojki' => [
'variants' => ['400'],
'subsets' => ['khojki', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Jaini Purva' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Playwrite DK Uloopet' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Rubik Pixels' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Playwrite SK' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite AU VIC' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite NL' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite ZA' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Old North Arabian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-north-arabian'],
'category' => 'sans-serif'
],
'Puppies Play' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vietnamese'],
'category' => 'handwriting'
],
'Noto Sans Medefaidrin' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'medefaidrin'],
'category' => 'sans-serif'
],
'Gajraj One' => [
'variants' => ['400'],
'subsets' => ['devanagari', 'latin', 'latin-ext'],
'category' => 'display'
],
'Rubik Maps' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Ubuntu Sans Mono' => [
'variants' => ['400', '500', '600', '700', 'italic', '500italic', '600italic', '700italic'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin', 'latin-ext'],
'category' => 'monospace'
],
'Rubik Microbe' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Karla Tamil Upright' => [
'variants' => ['400', '700'],
'subsets' => ['tamil'],
'category' => 'sans-serif'
],
'Noto Sans Egyptian Hieroglyphs' => [
'variants' => ['400'],
'subsets' => ['egyptian-hieroglyphs', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Deseret' => [
'variants' => ['400'],
'subsets' => ['deseret', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Imperial Aramaic' => [
'variants' => ['400'],
'subsets' => ['imperial-aramaic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite US Modern' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Blaka Ink' => [
'variants' => ['400'],
'subsets' => ['arabic', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Serif Ottoman Siyaq' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'ottoman-siyaq-numbers'],
'category' => 'serif'
],
'Playwrite PE' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Vai' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'vai'],
'category' => 'sans-serif'
],
'Kay Pho Du' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['kayah-li', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Serif Old Uyghur' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-uyghur'],
'category' => 'serif'
],
'Playwrite NG Modern' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite NZ' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite DK Loopet' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Yuji Hentaigana Akari' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Playwrite PL' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Serif Gurmukhi' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['gurmukhi', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Serif Grantha' => [
'variants' => ['400'],
'subsets' => ['grantha', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Tai Le' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tai-le'],
'category' => 'sans-serif'
],
'Playwrite CL' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Tifinagh' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tifinagh'],
'category' => 'sans-serif'
],
'Noto Sans Miao' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'miao'],
'category' => 'sans-serif'
],
'Noto Sans NKo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'nko'],
'category' => 'sans-serif'
],
'Noto Sans Adlam Unjoined' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['adlam', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite PT' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Rubik Broken Fax' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Playwrite BE WAL' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Balinese' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['balinese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite CZ' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Rubik Lines' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Noto Sans Elbasan' => [
'variants' => ['400'],
'subsets' => ['elbasan', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Chokokutai' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext', 'vietnamese'],
'category' => 'display'
],
'Linefont' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin'],
'category' => 'display'
],
'Lisu Bosa' => [
'variants' => ['200', '200italic', '300', '300italic', '400', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
'subsets' => ['latin', 'latin-ext', 'lisu'],
'category' => 'serif'
],
'Rubik Storm' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Inscriptional Pahlavi' => [
'variants' => ['400'],
'subsets' => ['inscriptional-pahlavi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Vithkuqi' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'vithkuqi'],
'category' => 'sans-serif'
],
'Noto Sans Sundanese' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'sundanese'],
'category' => 'sans-serif'
],
'Maname' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'sinhala', 'vietnamese'],
'category' => 'serif'
],
'Playwrite CO' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Grantha' => [
'variants' => ['400'],
'subsets' => ['grantha', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Old Persian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-persian'],
'category' => 'sans-serif'
],
'Noto Sans Ol Chiki' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'ol-chiki'],
'category' => 'sans-serif'
],
'Noto Sans Newa' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'newa'],
'category' => 'sans-serif'
],
'Playwrite AU TAS' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Cham' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['cham', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Batak' => [
'variants' => ['400'],
'subsets' => ['batak', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite AU QLD' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite NO' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Rubik Maze' => [
'variants' => ['400'],
'subsets' => ['cyrillic', 'cyrillic-ext', 'hebrew', 'latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Mro' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'mro'],
'category' => 'sans-serif'
],
'Playwrite VN' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Osage' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'osage'],
'category' => 'sans-serif'
],
'Noto Sans Lisu' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'lisu'],
'category' => 'sans-serif'
],
'Wavefont' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin'],
'category' => 'display'
],
'Noto Sans Palmyrene' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'palmyrene'],
'category' => 'sans-serif'
],
'Noto Serif Makasar' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'makasar'],
'category' => 'serif'
],
'Jersey 25 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Narnoor' => [
'variants' => ['400', '500', '600', '700', '800'],
'subsets' => ['gunjala-gondi', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'serif'
],
'Noto Sans Tagbanwa' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tagbanwa'],
'category' => 'sans-serif'
],
'Noto Znamenny Musical Notation' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols', 'znamenny'],
'category' => 'sans-serif'
],
'Playwrite CA' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Yi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'yi'],
'category' => 'sans-serif'
],
'Noto Sans Linear B' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'linear-b'],
'category' => 'sans-serif'
],
'Playwrite ES Deco' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite IE' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Lydian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'lydian'],
'category' => 'sans-serif'
],
'Noto Sans Multani' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'multani'],
'category' => 'sans-serif'
],
'Noto Sans Old Turkic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-turkic'],
'category' => 'sans-serif'
],
'Noto Sans Tai Tham' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['latin', 'latin-ext', 'tai-tham'],
'category' => 'sans-serif'
],
'Noto Sans Brahmi' => [
'variants' => ['400'],
'subsets' => ['brahmi', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Noto Sans Cuneiform' => [
'variants' => ['400'],
'subsets' => ['cuneiform', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Inscriptional Parthian' => [
'variants' => ['400'],
'subsets' => ['inscriptional-parthian', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite IN' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Warang Citi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'warang-citi'],
'category' => 'sans-serif'
],
'Noto Sans Bassa Vah' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['bassa-vah', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Jersey 15 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Old Permic' => [
'variants' => ['400'],
'subsets' => ['cyrillic-ext', 'latin', 'latin-ext', 'old-permic'],
'category' => 'sans-serif'
],
'Noto Sans Kawi' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['kawi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite FR Trad' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Chorasmian' => [
'variants' => ['400'],
'subsets' => ['chorasmian', 'latin', 'latin-ext', 'math', 'symbols'],
'category' => 'sans-serif'
],
'Playwrite DE LA' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Jacquard 24 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Noto Sans Tamil Supplement' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tamil-supplement'],
'category' => 'sans-serif'
],
'Noto Sans Sogdian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'sogdian'],
'category' => 'sans-serif'
],
'Noto Sans Duployan' => [
'variants' => ['400', '700'],
'subsets' => ['duployan', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Cypriot' => [
'variants' => ['400'],
'subsets' => ['cypriot', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Takri' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'takri'],
'category' => 'sans-serif'
],
'Playwrite RO' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Runic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'runic'],
'category' => 'sans-serif'
],
'Noto Sans Psalter Pahlavi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'psalter-pahlavi'],
'category' => 'sans-serif'
],
'Playwrite DE VA' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Mende Kikakui' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'mende-kikakui'],
'category' => 'sans-serif'
],
'Noto Sans Lepcha' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'lepcha'],
'category' => 'sans-serif'
],
'Noto Sans Rejang' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'rejang'],
'category' => 'sans-serif'
],
'Noto Sans Old South Arabian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-south-arabian'],
'category' => 'sans-serif'
],
'Noto Sans Zanabazar Square' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'zanabazar-square'],
'category' => 'sans-serif'
],
'Noto Sans Chakma' => [
'variants' => ['400'],
'subsets' => ['chakma', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Playwrite TZ' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite DE SAS' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Padyakke Expanded One' => [
'variants' => ['400'],
'subsets' => ['kannada', 'latin', 'latin-ext'],
'category' => 'serif'
],
'Noto Sans Pahawh Hmong' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'pahawh-hmong'],
'category' => 'sans-serif'
],
'Micro 5 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Noto Sans Wancho' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'wancho'],
'category' => 'sans-serif'
],
'Jersey 10 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext'],
'category' => 'display'
],
'Playwrite BR' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Noto Sans Mayan Numerals' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'mayan-numerals'],
'category' => 'sans-serif'
],
'Noto Sans Caucasian Albanian' => [
'variants' => ['400'],
'subsets' => ['caucasian-albanian', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Masaram Gondi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'masaram-gondi'],
'category' => 'sans-serif'
],
'Playwrite ID' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Playwrite IT Trad' => [
'variants' => ['100', '200', '300', '400'],
'subsets' => ['latin'],
'category' => 'handwriting'
],
'Yuji Hentaigana Akebono' => [
'variants' => ['400'],
'subsets' => ['japanese', 'latin', 'latin-ext'],
'category' => 'handwriting'
],
'Noto Sans Hanifi Rohingya' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['hanifi-rohingya', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Syriac' => [
'variants' => ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
'subsets' => ['latin', 'latin-ext', 'syriac'],
'category' => 'sans-serif'
],
'Noto Sans Phags Pa' => [
'variants' => ['400'],
'subsets' => ['phags-pa'],
'category' => 'sans-serif'
],
'Noto Sans Kharoshthi' => [
'variants' => ['400'],
'subsets' => ['kharoshthi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Gunjala Gondi' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['gunjala-gondi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Lycian' => [
'variants' => ['400'],
'subsets' => ['lycian'],
'category' => 'sans-serif'
],
'Noto Sans Mandaic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'mandaic'],
'category' => 'sans-serif'
],
'Noto Sans Limbu' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'limbu'],
'category' => 'sans-serif'
],
'Noto Sans Kayah Li' => [
'variants' => ['400', '500', '600', '700'],
'subsets' => ['kayah-li', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Nushu' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'nushu'],
'category' => 'sans-serif'
],
'Noto Sans Shavian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'shavian'],
'category' => 'sans-serif'
],
'Noto Sans Nabataean' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'nabataean'],
'category' => 'sans-serif'
],
'Noto Sans Kaithi' => [
'variants' => ['400'],
'subsets' => ['kaithi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Modi' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'modi'],
'category' => 'sans-serif'
],
'Jacquarda Bastarda 9 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'math', 'symbols'],
'category' => 'display'
],
'Noto Sans Khudawadi' => [
'variants' => ['400'],
'subsets' => ['khudawadi', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Elymaic' => [
'variants' => ['400'],
'subsets' => ['elymaic', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Mahajani' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'mahajani'],
'category' => 'sans-serif'
],
'Noto Sans Siddham' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'siddham'],
'category' => 'sans-serif'
],
'Noto Sans Saurashtra' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'saurashtra'],
'category' => 'sans-serif'
],
'Noto Sans Old Sogdian' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'old-sogdian'],
'category' => 'sans-serif'
],
'Noto Sans Manichaean' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'manichaean'],
'category' => 'sans-serif'
],
'Noto Sans Buginese' => [
'variants' => ['400'],
'subsets' => ['buginese', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Noto Sans Phoenician' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'phoenician'],
'category' => 'sans-serif'
],
'Noto Sans Hatran' => [
'variants' => ['400'],
'subsets' => ['hatran', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Yarndings 12' => [
'variants' => ['400'],
'subsets' => ['latin', 'math', 'symbols'],
'category' => 'display'
],
'Noto Sans Ogham' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'ogham'],
'category' => 'sans-serif'
],
'Noto Sans Soyombo' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'soyombo'],
'category' => 'sans-serif'
],
'Noto Sans Pau Cin Hau' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'pau-cin-hau'],
'category' => 'sans-serif'
],
'Noto Sans SignWriting' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'signwriting'],
'category' => 'sans-serif'
],
'Noto Sans Tirhuta' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'tirhuta'],
'category' => 'sans-serif'
],
'Noto Sans Meroitic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'meroitic', 'meroitic-cursive', 'meroitic-hieroglyphs'],
'category' => 'sans-serif'
],
'Noto Sans Ugaritic' => [
'variants' => ['400'],
'subsets' => ['latin', 'latin-ext', 'ugaritic'],
'category' => 'sans-serif'
],
'Noto Sans Bhaiksuki' => [
'variants' => ['400'],
'subsets' => ['bhaiksuki', 'latin', 'latin-ext'],
'category' => 'sans-serif'
],
'Yarndings 20' => [
'variants' => ['400'],
'subsets' => ['latin', 'math', 'symbols'],
'category' => 'display'
],
'Yarndings 12 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'math', 'symbols'],
'category' => 'display'
],
'Yarndings 20 Charted' => [
'variants' => ['400'],
'subsets' => ['latin', 'math', 'symbols'],
'category' => 'display'
],
];