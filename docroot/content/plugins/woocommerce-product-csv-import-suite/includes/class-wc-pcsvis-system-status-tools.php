<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_PCSVIS_System_Status_Tools {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'woocommerce_debug_tools', array( $this, 'tools' ) );
	}

	/**
	 * Tools we add to WC
	 * @param  array $tools
	 * @return array
	 */
	public function tools( $tools ) {
		$tools['delete_products'] = array(
			'name'		=> __( 'Delete Products','wc_csv_import'),
			'button'	=> __( 'Delete ALL products','wc_csv_import' ),
			'desc'		=> __( 'This tool will delete all products allowing you to start fresh.', 'wc_csv_import' ),
			'callback'  => array( $this, 'delete_products' )
		);
		$tools['delete_variations'] = array(
			'name'		=> __( 'Delete Variations','wc_csv_import'),
			'button'	=> __( 'Delete ALL variations','wc_csv_import' ),
			'desc'		=> __( 'This tool will delete all variations allowing you to start fresh.', 'wc_csv_import' ),
			'callback'  => array( $this, 'delete_variations' )
		);
		$tools['delete_orphaned_variations'] = array(
			'name'		=> __( 'Delete Orphans','wc_csv_import'),
			'button'	=> __( 'Delete orphaned variations','wc_csv_import' ),
			'desc'		=> __( 'This tool will delete variations which have no parent.', 'wc_csv_import' ),
			'callback'  => array( $this, 'delete_orphaned_variations' )
		);
		return $tools;
	}

	/**
	 * Delete products
	 */
	public function delete_products() {
		global $wpdb;

		// Delete products
		$result  = absint( $wpdb->delete( $wpdb->posts, array( 'post_type' => 'product' ) ) );
		$result2 = absint( $wpdb->delete( $wpdb->posts, array( 'post_type' => 'product_variation' ) ) );

		// Delete meta and term relationships with no post
		$wpdb->query( "DELETE pm
			FROM {$wpdb->postmeta} pm
			LEFT JOIN {$wpdb->posts} wp ON wp.ID = pm.post_id
			WHERE wp.ID IS NULL" );
		$wpdb->query( "DELETE tr
			FROM {$wpdb->term_relationships} tr
			LEFT JOIN {$wpdb->posts} wp ON wp.ID = tr.object_id
			WHERE wp.ID IS NULL" );

		echo '<div class="updated"><p>' . sprintf( __( '%d Products Deleted', 'wc_csv_import' ), ( $result + $result2 ) ) . '</p></div>';
	}

	/**
	 * Delete variations
	 */
	public function delete_variations() {
		global $wpdb;

		// Delete products
		$result = absint( $wpdb->delete( $wpdb->posts, array( 'post_type' => 'product_variation' ) ) );

		// Delete meta and term relationships with no post
		$wpdb->query( "DELETE pm
			FROM {$wpdb->postmeta} pm
			LEFT JOIN {$wpdb->posts} wp ON wp.ID = pm.post_id
			WHERE wp.ID IS NULL" );
		$wpdb->query( "DELETE tr
			FROM {$wpdb->term_relationships} tr
			LEFT JOIN {$wpdb->posts} wp ON wp.ID = tr.object_id
			WHERE wp.ID IS NULL" );

		echo '<div class="updated"><p>' . sprintf( __( '%d Variations Deleted', 'wc_csv_import' ), $result ) . '</p></div>';
	}

	/**
	 * Delete orphans
	 */
	public function delete_orphaned_variations() {
		global $wpdb;

		// Delete meta and term relationships with no post
		$result = absint( $wpdb->query( "DELETE products
			FROM {$wpdb->posts} products
			LEFT JOIN {$wpdb->posts} wp ON wp.ID = products.post_parent
			WHERE wp.ID IS NULL AND products.post_type = 'product_variation';" ) );

		echo '<div class="updated"><p>' . sprintf( __( '%d Variations Deleted', 'wc_csv_import' ), $result ) . '</p></div>';
	}	
}

new WC_PCSVIS_System_Status_Tools();