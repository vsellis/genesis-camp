<?php
/**
 * This file controls the ouput
 * @package  GenesisCamp
 */

class Event_Info {

	public function __construct() {

		add_action( 'genesis_entry_content', array( $this, 'event_do_info' ) );

	}

	public function event_do_info() {

		if( 'event' !== get_post_type() )
			return;

		$info = get_post_meta( get_the_ID() );
		$date = get_post_meta( get_the_ID(), '_camp_event_date', true );
		$time = get_post_meta( get_the_ID(), '_camp_event_time', true );
		$location = get_post_meta( get_the_ID(), '_camp_event_location', true );
		$downloads = get_post_meta( get_the_ID(), '_camp_event_downloads', true );
		
		// var_dump ($info);
		echo '<section class="event-info">';
			printf( '<strong>Date</strong>: %s <br>', $date );
			printf( '<strong>Time</strong>: %s <br>', $time );
			printf( '<strong>Location</strong>: %s <br>', $location );

			if ( $downloads ) {
				echo '<ul class="event-downloads">';
					foreach ( $downloads as $download ) {
							printf( '<li><a target="_blank" href="%s">%s</a></li>', $download['file'], $download['title'] );
						
					}
				echo '</ul>';
			}
		echo '</section>';
	}

}