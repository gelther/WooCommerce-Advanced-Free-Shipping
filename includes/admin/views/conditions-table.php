<?PHP
/**
 * Conditions table.
 *
 * Display table with all the user configured Free shipping conditions.
 *
 * @author		Jeroen Sormani
 * @package 	WooCommerce Advanced Free Shipping
 * @version		1.0.0
 */

if( ! defined( "ABSPATH" ) ) exit; // Exit if accessed directly

$method_conditions = get_posts( array( "posts_per_page" => "-1", "post_type" => "wafs", "post_status" => array( "draft", "publish" ) ) );

?><tr valign="top">
	<th scope="row" class="titledesc">
		<?PHP _e( "Method conditions", "woocommerce-advanced-free-shipping" ); ?>:<br />
<!-- 		<small>Read more</small> -->
	</th>
	<td class="forminp" id="<?PHP echo $this->id; ?>_shipping_methods">

		<table class='wp-list-table wafs-table widefat'>
			<thead>
				<tr>
					<th style='padding-left: 10px;'><?PHP _e( "Title", "woocommerce-advanced-free-shipping" ); ?></th>
					<th style='padding-left: 10px;'><?PHP _e( "Shipping title", "woocommerce-advanced-free-shipping" ); ?></th>
					<th style='padding-left: 10px;'><?PHP _e( "Condition groups", "woocommerce-advanced-free-shipping" ); ?></th>
				</tr>
			</thead>
			<tbody><?PHP

				$i = 0;
				foreach( $method_conditions as $method_condition ) :

					$method_details = get_post_meta( $method_condition->ID, "_wafs_shipping_method", true );
					$conditions     = get_post_meta( $method_condition->ID, "_wafs_shipping_method_conditions", true );
					$alt            = ( $i++ ) % 2 == 0 ? "alternate" : "";

					?><tr class='<?PHP echo $alt; ?>'>
						<td>
							<strong>
								<a href='<?PHP echo get_edit_post_link( $method_condition->ID ); ?>' class='row-title' title='<?PHP _e( "Edit Method", "woocommerce-advanced-free-shipping" ); ?>'>
									<?PHP echo empty( $method_condition->post_title ) ? __( "Untitled", "woocommerce-advanced-free-shipping" ) : esc_html( $method_condition->post_title ); ?>
								</a>
							</strong>
							<div class='row-actions'>
								<span class='edit'>
									<a href='<?PHP echo get_edit_post_link( $method_condition->ID ); ?>' title='<?PHP _e( "Edit Method", "woocommerce-advanced-free-shipping" ); ?>'>
										<?PHP _e( "Edit", "woocommerce-advanced-free-shipping" ); ?>
									</a>
										|
								</span>
								<span class='trash'>
									<a href='<?PHP echo get_delete_post_link( $method_condition->ID ); ?>' title='<?PHP _e( "Delete Method", "woocommerce-advanced-free-shipping" ); ?>'><?PHP
										_e( "Delete", "woocommerce-advanced-free-shipping" );
									?></a>
								</span>
							</div>
						</td>
						<td><?PHP echo empty( $method_details["shipping_title"] ) ? __( "Free Shipping", "woocommerce-advanced-free-shipping" ) : esc_html( $method_details["shipping_title"] ); ?></td>
						<td><?PHP echo count( $conditions ); ?></td>
						</td>
					</tr><?PHP

				endforeach;

				if( empty( $method_conditions ) ) :

					?><tr>
						<td colspan='2'><?PHP _e( "There are no Free Shipping methods. Yet...", "woocommerce-advanced-free-shipping" ); ?></td>
					</tr><?PHP
					endif;

			?></tbody>
			<tfoot>
				<tr>
					<th colspan='4' style='padding-left: 10px;'>
						<a href='<?PHP echo admin_url( "post-new.php?post_type=wafs" ); ?>' class='add button'><?PHP _e( "Add Free Shipping Method", "woocommerce-advanced-free-shipping" ); ?></a>
					</th>
				</tr>
			</tfoot>
		</table>
	</td>
</tr>
