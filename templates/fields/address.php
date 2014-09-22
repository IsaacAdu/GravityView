<?php
/**
 * Address field output, with "Map It" link removed
 *
 * @group GravityView
 */

global $gravityview_view;

extract( $gravityview_view->field_data );

// If it's the full address
if( floor( $field_id ) === floatval( $field_id ) ) {

	// Use Gravity Forms' method to get the full address.
	// Pass the `text` parameter so the map link isn't added like when passing `html`
	$value_with_newline = GFCommon::get_lead_field_display( $field, $value, "", false, 'text' );

	// Add map link if it's not set (default, back compat) or if it's set to yes
	if( !isset( $field_settings['show_map_link'] ) || !empty( $field_settings['show_map_link'] ) ){

		// Add the map link as another line
	    $value_with_newline .= "\n" . gravityview_get_map_link( $value_with_newline );

	}

	// Full address without the "Map It" link
	echo str_replace("\n", '<br />', $value_with_newline );

} else {

	echo gravityview_get_field_value( $entry, $field_id, $display_value );

}
