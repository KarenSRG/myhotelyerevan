<?php 
/**
 * The header for the HotelOne theme.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HotelOne
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta http-equiv="Content-Security-Policy">
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<?php do_action( 'hotelone_before_site_start' ); ?>
<div id="wrapper">
	
	<?php 
	hotelone_header();
	?>