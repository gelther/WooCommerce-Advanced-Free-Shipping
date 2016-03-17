<?PHP
if( ! defined( "ABSPATH" ) ) exit; // Exit if accessed directly

/**
 * Create operator dropdown.
 *
 * Set all operators and create dropdown for it.
 *
 * @since 1.0.0
 *
 * @param  int     $id             Throw in the condition ID.
 * @param  int     $group          Condition group ID.
 * @param  string  $current_value  Current chosen slug.
 */
function wafs_condition_operator( $id, $group = 0, $current_value = "==" ) {
	$operators = array(
		"==" => __( "Equal to", "woocommerce-advanced-free-shipping" ),
		"!=" => __( "Not equal to", "woocommerce-advanced-free-shipping" ),
		">=" => __( "Greater or equal to", "woocommerce-advanced-free-shipping" ),
		"<=" => __( "Less or equal to ", "woocommerce-advanced-free-shipping" ),
	);

	$operators = apply_filters( "wafs_operators", $operators );

	?><span class='wafs-operator-wrap wafs-operator-wrap-<?PHP echo absint( $id ); ?>'>

		<select id='' class='wafs-operator' name='_wafs_shipping_method_conditions[<?PHP echo absint( $group ); ?>][<?PHP echo absint( $id ); ?>][operator]'>

			<?PHP foreach( $operators as $key => $value ) :

				?><option value='<?PHP echo esc_attr( $key ); ?>' <?PHP selected( $key, $current_value ); ?>><?PHP echo esc_html( $value ); ?></option><?PHP

			endforeach; ?>

		</select>

	</span><?PHP
}
