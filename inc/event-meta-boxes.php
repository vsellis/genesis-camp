<?php
/**
 * This class controls the meta boxes.
 * @package  GenesisCamp
 */

class Event_Meta_Boxes {

	private $prefix = '_camp_';

	public function __construct() {

		add_action( 'cmb2_init', array( $this, 'event_information' ) );

	}

	public function event_information() {

		$info = new_cmb2_box(array(
			'id'           => $this->prefix . 'event_information',
			'title'        => 'Event Information',
			'object_types' => array( 'event' )
		));

		$info->add_field(array(
			'name' => 'Event Date',
			'id'   => $this->prefix . 'event_date',
			'type' => 'text_date'
		));

		$info->add_field(array(
			'name' => 'Event Time',
			'id'   => $this->prefix . 'event_time',
			'type' => 'text_time'
		));

		$info->add_field(array(
			'name' => 'Event Location',
			'id'   => $this->prefix . 'event_location',
			'type' => 'textarea_small'
		));

		$downloads = $info->add_field(array(
			'id'      => $this->prefix . 'event_downloads',
			'type'    => 'group',
			'options' => array(
				'group_title'   => 'Download {#}',
				'add_button'    => 'Add Anoter Download',
				'remove_button' => 'Remove Download',
				'sortable'      => true
			)
		));

		$info->add_group_field( $downloads, array(
			'name' => 'Download Title',
			'id'   => 'title',
			'type' => 'text'
 		) );

 		$info->add_group_field( $downloads, array(
			'name' => 'Download File',
			'id'   => 'file',
			'type' => 'file'
 		) );

	}

}