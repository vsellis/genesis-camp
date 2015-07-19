<?php
/**
 * This controls the plugin
 * @package  GenesisCamp
 */

class Genesis_Camp {

	public function __construct() {

		$this->load_includes();
		$this->register_event();
		$this->add_meta_boxes();
		$this->output_event_info();

	}

	public function load_includes() {

		include_once( 'CPT.php' );
		include_once( 'CMB2/init.php' );
		include_once( 'event-meta-boxes.php' );
		include_once( 'event-info.php' );

	}

	public function register_event() {

		$event = new CPT( 'event' );
		$event->menu_icon( 'dashicons-calendar' );
		$event->register_taxonomy( 'event-type' );

	}

	public function add_meta_boxes() {
		$event_mb = new Event_Meta_Boxes();
	}

	public function output_event_info() {
		$event_info = new Event_Info();
	}

}