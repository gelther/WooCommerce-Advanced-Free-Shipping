<?PHP
if( ! defined( "ABSPATH" ) ) exit; // Exit if accessed directly

/**
 * Create condition dropdown.
 *
 * Set all conditions and create dropdown for it.
 *
 * @since 1.0.0
 *
 * @param  mixed   $id             Throw in the condition ID.
 * @param  midex   $group          Condition group ID.
 * @param  string  $current_value  Current chosen slug.
 */
function wafs_condition_conditions( $id, $group = 0, $current_value = "subtotal" ) {
	$conditions = array(
		__( "Cart", "woocommerce-advanced-free-shipping" ) => array(
			"subtotal"                => __( "Subtotal", "woocommerce-advanced-free-shipping" ),
			"subtotal_ex_tax"         => __( "Subtotal ex. taxes", "woocommerce-advanced-free-shipping" ),
			"tax"                     => __( "Tax", "woocommerce-advanced-free-shipping" ),
			"quantity"                => __( "Quantity", "woocommerce-advanced-free-shipping" ),
			"contains_product"        => __( "Contains product", "woocommerce-advanced-free-shipping" ),
			"coupon"                  => __( "Coupon", "woocommerce-advanced-free-shipping" ),
			"weight"                  => __( "Weight", "woocommerce-advanced-free-shipping" ),
			"contains_shipping_class" => __( "Contains shipping class", "woocommerce-advanced-free-shipping" ),
		),
		__( "User Details", "woocommerce-advanced-free-shipping" ) => array(
			"zipcode" => __( "Zipcode", "woocommerce-advanced-free-shipping" ),
			"city"    => __( "City", "woocommerce-advanced-free-shipping" ),
			"state"   => __( "State", "woocommerce-advanced-free-shipping" ),
			"country" => __( "Country", "woocommerce-advanced-free-shipping" ),
			"role"    => __( "User role", "woocommerce-advanced-free-shipping" ),
		),
		__( "Product", "woocommerce-advanced-free-shipping" ) => array(
			"width"        => __( "Width", "woocommerce-advanced-free-shipping" ),
			"height"       => __( "Height", "woocommerce-advanced-free-shipping" ),
			"length"       => __( "Length", "woocommerce-advanced-free-shipping" ),
			"stock"        => __( "Stock", "woocommerce-advanced-free-shipping" ),
			"stock_status" => __( "Stock status", "woocommerce-advanced-free-shipping" ),
			"category"     => __( "Category", "woocommerce-advanced-free-shipping" ),
		),
	);

	$conditions = apply_filters( "wafs_conditions", $conditions );

	?><span class='wafs-condition-wrap wafs-condition-wrap-<?PHP echo absint( $id ); ?>'>

		<select class='wafs-condition' data-group='<?PHP echo absint( $group ); ?>' data-id='<?PHP echo absint( $id ); ?>'
			name='_wafs_shipping_method_conditions[<?PHP echo absint( $group ); ?>][<?PHP echo absint( $id ); ?>][condition]'><?PHP

			foreach( $conditions as $option_group => $values ) :

				?><optgroup label='<?PHP echo esc_attr( $option_group ); ?>'><?PHP

					foreach( $values as $key => $value ) :
						?><option value='<?PHP echo esc_attr( $key ); ?>' <?PHP selected( $key, $current_value ); ?>><?PHP echo esc_html( $value ); ?></option><?PHP
					endforeach;

				?></optgroup><?PHP

			endforeach;

		?></select>

	</span><?PHP
}
