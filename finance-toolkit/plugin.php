<?php
namespace Finance;

use Finance\Widgets\Finance_Main_slider_Section;
use Finance\Widgets\Finance_Service_Section;
use Finance\Widgets\Finance_Portfolio_Section;
use Finance\Widgets\Finance_Counter_Section;
use Finance\Widgets\Finance_Team_Section;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );		
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		
		require __DIR__ . '/widgets/main-slider.php';
		require __DIR__ . '/widgets/service-section.php';
		require __DIR__ . '/widgets/portfolio-section.php';
		require __DIR__ . '/widgets/finance-counter.php';
		require __DIR__ . '/widgets/finance-team.php';
		
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Finance_Main_slider_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Finance_Service_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Finance_Portfolio_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Finance_Counter_Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Finance_Team_Section() );
		
	}
}

new Plugin();
