<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cinematograf
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->


<?php if ( is_active_sidebar( 'banner_widget_sidebar' ) ) : ?>
	<div id="banner_widget_sidebar secondary" class="banner_widget_sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'banner_widget_sidebar' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>