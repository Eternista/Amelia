<?php
/**
 * Template Name: Strona Główna
 *
 * @package Amelia
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php

        echo get_template_part( 'template-parts/home/content', 'banner' );

        echo get_template_part( 'template-parts/home/content', 'about' );
        
        echo get_template_part( 'template-parts/home/content', 'education' );

        echo get_template_part( 'template-parts/home/content', 'offert' );

        echo get_template_part( 'template-parts/home/content', 'testimonials' );
        
        echo get_template_part( 'template-parts/home/content', 'faq' );

        echo get_template_part( 'template-parts/home/content', 'contact' );
        ?>

</main><!-- #main -->

<?php
get_footer();

