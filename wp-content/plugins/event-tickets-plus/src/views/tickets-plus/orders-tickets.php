<?php
/**
 * List of Ticket Orders
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/tickets-plus/orders-tickets.php
 *
 * @package TribeEventsCalendar
 *
 * @since   4.11.2 Use customizable ticket name functions.
 *
 * @version 4.11.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$view           = Tribe__Tickets__Tickets_View::instance();
$post_id        = get_the_ID();
$post           = get_post( $post_id );
$post_type      = get_post_type_object( $post->post_type );
$user_id        = get_current_user_id();
$active_modules = Tribe__Tickets__Tickets::modules();

if ( ! $view->has_ticket_attendees( $post_id, $user_id ) ) {
	return;
}

$orders = $view->get_event_attendees_by_order( $post_id, $user_id );
$order  = array_values( $orders );
?>
<div class="tribe-tickets">
	<h2><?php
		echo esc_html(
			sprintf(
				__( 'My %1$s for This %2$s', 'event-tickets-plus' ),
				tribe_get_ticket_label_plural( 'orders_tickets_heading' ),
				$post_type->labels->singular_name
			)
		); ?>
	</h2>
	<ul class="tribe-orders-list">
		<input type="hidden" name="event_id" value="<?php echo absint( $post_id ); ?>">
		<?php foreach ( $orders as $order_id => $attendees ) : ?>
			<?php
			$first_attendee = reset( $attendees );

			// If Provider is not found then Continue
			if ( ! array_key_exists( $first_attendee['provider'], $active_modules ) ) {
				continue;
			}

			// Fetch the actual Provider
			$provider = call_user_func( [ $first_attendee['provider'], 'get_instance' ] );
			$order    = call_user_func_array( [ $provider, 'get_order_data' ], [ $order_id ] );
			?>
			<li class="tribe-item" id="order-<?php echo esc_html( $order_id ); ?>">
				<div class="user-details">
					<p>
						<?php
							printf(
								esc_html__( 'Order #%1$s: %2$d %3$s reserved by %4$s (%5$s) on %6$s', 'event-tickets-plus' ),
								esc_html( $order_id ),
								count( $attendees ),
								_n(
									esc_html( tribe_get_ticket_label_singular( 'orders_tickets' ) ),
									esc_html( tribe_get_ticket_label_plural( 'orders_tickets' ) ),
									count( $attendees ),
									'event-tickets-plus'
								),
								esc_attr( $order['purchaser_name'] ),
								'<a href="mailto:' . esc_url( $order['purchaser_email'] ) . '">' . esc_html( $order['purchaser_email'] ) . '</a>',
								date_i18n( tribe_get_date_format( true ), strtotime( esc_attr( $order['purchase_time'] ) ) )
							);
						?>
					</p>
					<?php
						/**
						 * Inject content into the Tickets User Details block on the orders page
						 *
						 * @param array   $attendees Attendee array.
						 * @param WP_Post $post_id   Post object that the tickets are tied to.
						 */
						do_action( 'event_tickets_user_details_tickets', $attendees, $post_id );
					?>
				</div>
				<ul class="tribe-tickets-list tribe-list">
					<?php foreach ( $attendees as $i => $attendee ) : ?>
						<li class="tribe-item" id="ticket-<?php echo esc_attr( $order_id ); ?>">
							<input type="hidden" name="attendee[<?php echo esc_attr( $order_id ); ?>][attendees][]" value="<?php echo esc_attr( $attendee['attendee_id'] ); ?>">
							<p class="list-attendee">
								<?php echo sprintf( esc_html__( 'Attendee %d', 'event-tickets-plus' ), $i + 1 ); ?>
							</p>
							<div class="tribe-ticket-information">
								<?php
								$price = '';

								if ( class_exists( $attendee['provider'] ) ) {
									/** @var Tribe__Tickets__Tickets $provider */
									$provider = new $attendee['provider'];
									$price    = $provider->get_price_html( $attendee['product_id'], $attendee );
								}
								?>

								<?php if ( ! empty( $attendee['ticket_exists'] ) ) : ?>
									<span class="ticket-name"><?php echo esc_html( $attendee['ticket'] ); ?></span>
								<?php endif; ?>

								<?php if ( ! empty( $price ) ): ?>
									- <span class="ticket-price"><?php echo $price; ?></span>
								<?php endif; ?>
							</div>
							<?php
							/**
							 * Inject content into an Tickets attendee block on the Tickets orders page
							 *
							 * @param array   $attendee Attendee array.
							 * @param WP_Post $post     Post object that the tickets are tied to.
							 */
							do_action( 'event_tickets_orders_attendee_contents', $attendee, $post );
							?>
						</li>
					<?php endforeach; ?>
				</ul>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
