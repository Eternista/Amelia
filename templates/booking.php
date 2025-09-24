<?php
/**
 * Template Name: Booking
 *
 * @package Amelia
 */

get_header();
?>

<main id="primary" class="site-main">


PANEL
<?php echo do_shortcode('[bookingpress_form]'); ?>
<br/>
<br/>
REZERWACJE
<?php echo do_shortcode('[bookingpress_my_appointments]'); ?>
<br/>
<br/>
Package FOrm
<?php echo do_shortcode('[bookingpress_appointment_datetime]'); ?>
<br/>
<br/>
Service
<?php echo do_shortcode('[bookingpress_form service=1]'); ?>
<br/>
<br/>
Edycja
<?php echo do_shortcode('[bookingpress_appointment_calendar_integration]'); ?>
</main><!-- #main -->

<?php
get_footer();

