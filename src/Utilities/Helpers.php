<?php
namespace Theme\Utilities;

use Theme\Core\Bootstrap;

/**
 * Helpers Extender.
 * -------------------------------------------------------------
 * This class is mainly crafted for to create helper classes
 * to be used with the Kit class.
 *
 * These methods are linked at class-kit.php and called with
 * Kit namespace (e.g Kit::method()).
 *
 * @category   Extender
 * @package    SiteKit
 * @version    1.0.0
 * @author     KitStudio <hello@kitstudio.com>
 * @copyright  2022 KitStudio
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @see        Kit, Kit::icon(), Kit::layout() etc...
 */
class Helpers {

	/**
	 * Get Icon.
	 *
	 * Simple icon grabber and parser.
	 *
	 * @param  string $icon Icon name.
	 * @see Kit::icon();
	 * @since 1.0.0
	 * @return $icon
	 */
	public static function get_icon( $icon = '', $type = 'inline' ) {

		if ( $type === 'inline' ) {
			echo file_get_contents( esc_attr( Bootstrap::$icon_dir ) . esc_attr( $icon ) . '.svg' ); // phpcs:ignore
		} else {
			echo '<img src="' . esc_attr( Bootstrap::$icon_dir ) . esc_attr( $icon ) . '.svg">'; // phpcs:ignore
		}
	}

	/**
	 * Get Layout.
	 *
	 * Simple content wrapper with the specific layout.
	 * $layout_content will be parsed inside the layout template.
	 *
	 * @param  string $layout_name The layout name.
	 * @param  string $layout_content The layout content.
	 * @param  array  $layout_args The layout args.
	 * @see  Kit::layout();
	 * @since  1.0.0
	 * @return void
	 */
	public static function get_layout( $layout_name, $layout_content, $layout_args = array() ) {

		require get_template_directory() . "/src/Theme/Layouts/Static/$layout_name.php";

	}

	/**
	 * Get Debugger.
	 *
	 * This is a simple debugger method where it passes the $code
	 * in a way more readable way.
	 *
	 * @param  mixed $code Code.
	 * @see Kit::debug();
	 * @since  1.0.0
	 * @return void
	 */
	public static function get_debugger( $code ) {

		echo '<pre>' . esc_html( var_dump( $code ) ) . '</pre>';

	}

	/**
	 * Get Template.
	 * Calling the template with arguments.
	 *
	 * This method can be used for various ways from calling simple
	 * templates to calling loops with arguments.
	 *
	 * @param  string $template The template.
	 * @param  array  $args The arguments.
	 * @see Kit::template();
	 * @since  1.0.0
	 * @return $template.
	 */
	public static function get_component( $template, $args = array(), $type = 'Page' ) {

		return get_template_part( 'src/Theme/' . $type . '/Static/components/' . $template, '', $args );

	}

	/**
	 * Get Button.
	 *
	 * @param  string $content Button content.
	 * @param  string $link Button link.
	 * @param  string $class Button class.
	 * @param  string $style Button styles.
	 * @see Kit::button();
	 * @since  1.0.0
	 * @return void
	 */
	public static function get_button( $content, $link = '#', $class = '', $style = '' ) {

		echo '<a class="' . esc_attr( $class ) . '" href="' . esc_attr( $link ) . '" style="' . esc_attr( $style ) . '">' . esc_html( $content ) . '</a>';

	}

	/**
	 * Get Image.
	 *
	 * @param  string $image Image name.
	 * @param  string $alt Image alt tag.
	 * @param  string $class Image class.
	 * @see Kit::image();
	 * @since 1.0.0
	 * @return void
	 */
	public static function get_image( $image, $type = 'tag', $alt = '', $class = '' ) {

		if ( $type === 'tag' ) {
			echo '<img class="' . esc_attr( $class ) . ' lazyload" src="' . esc_attr( Bootstrap::$image_dir ) . esc_attr( $image ) . '" alt="' . esc_attr( $alt ) . '">';
		}

		if ( $type === 'url' ) {
			echo esc_attr( Bootstrap::$image_dir ) . esc_attr( $image );
		}

	}
}
