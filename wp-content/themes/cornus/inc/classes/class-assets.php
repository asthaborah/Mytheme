<?php 
/**
 * Assets 
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;


class Assets{
    use singleton;
    protected function __construct()
    {
        //load class
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action('wp_enqueue_scripts', [$this , 'register_styles']);
        add_action('wp_enqueue_scripts', [$this , 'register_scripts']);
        add_action('enqueue_block_assets', [$this , 'enqueue_editor_assets']);
    }

    public function register_styles(){
        //Register styles
        wp_register_style('bootstrap-css' , CORNUS_DIR_URI . '/assets/src/Library/css/bootstrap.min.css', [] , false , 'all');
        wp_register_style('main-css', CORNUS_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime(CORNUS_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
        // wp_enqueue_style('fonts-css' , get_template_directory_uri() . '/assets/src/library/fonts/fonts.css' , [] , false , 'all');

        // Enqueue styles
        wp_enqueue_style('bootstrap-css');
        wp_enqueue_style('main-css');
    }

    public function register_scripts(){
        // Registering scripts 
        wp_register_script('main-js', CORNUS_BUILD_JS_URI . '/main.js', ['jquery'], filemtime(CORNUS_BUILD_JS_DIR_PATH . '/main.js'), true);
        wp_register_script('bootstrap-js', CORNUS_DIR_URI . '/assets/src/Library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }

    /**
	 * Enqueue editor scripts and styles.
	 */
	public function enqueue_editor_assets() {

		$asset_config_file = sprintf( '%s/assets.php', CORNUS_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = require_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : filemtime( $asset_config_file );
		$arr = ['wp-blocks', 'wp-i18n'];
		$final = array_merge($js_dependencies , $arr);

		// Theme Gutenberg blocks JS.
		if ( is_admin() ) {
			wp_enqueue_script(
				'Cornus-blocks-js',
				CORNUS_BUILD_JS_URI . '/blocks.js',
				$final,
				$version,
				true
			);
		}

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'Cornus-blocks-css',
			CORNUS_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			filemtime( CORNUS_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);

	}
}