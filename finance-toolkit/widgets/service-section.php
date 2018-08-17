<?php
namespace Finance\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Finance_Service_Section extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'finance-service';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Finance Service', 'finance-toolkit' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-folder';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'finance' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		// Content Controls
  		$this->start_controls_section(
  			'finance_service_section',
  			[
  				'label' => esc_html_x( 'Service Section','Admin Panel','finance-toolkit' )
  			]
  		); 
 
        $this->add_control(
			'service_section_title',
			[
				'label' => esc_html_x("Heading Text", 'Admin Panel','finance-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("What we do?", 'Admin Panel','finance-toolkit'),			
			]
		);
        
        $this->add_control(
			'service_section_sub_title',
			[
				'label' => esc_html_x("Service Sub Title", 'Admin Panel','finance-toolkit'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html_x("We create the most wanted HTML5 Template", 'Admin Panel','finance-toolkit'),			
			]
		);
                
        $repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Service Name', 'finance-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Wordpress' , 'finance-toolkit' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_name',
			[
				'label' => __( 'Services Items', 'finance-toolkit' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Wordpress', 'finance-toolkit' ),						
					],					
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'finance-toolkit' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
                       
        $this->add_control(
          'service_section_description',
          [
             'label'   => __( 'Service Description', 'finance-toolkit' ),
             'type'    => Controls_Manager::WYSIWYG,
             'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio minus ipsum dignissimos excepturi rerum recusandae accusamus incidunt, deleniti qui nemo blanditiis dolor deserunt iure id accusantium sequi, illo laborum quae. Aspernatur voluptates eveniet minima.', 'finance-toolkit' ),
          ]
        );
        
        
       $this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render( ) {
        
		$settings = $this->get_settings();             

    echo finance_service_section_shortcode($settings);            


	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function content_template() {
        
	}
    
}
