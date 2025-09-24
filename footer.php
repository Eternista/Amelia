<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #page div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amelia
 */

    $footer = get_field("footer", "option");
    $heading = $footer["title"];
    $desc = $footer["desc"];
    $social = $footer["social"];

?>

<footer class="site-footer py-8 px-4">
    <div class="container">
      <div class="row white">
        <h2 class="white-heading"><?php echo $heading ?></h2>
        <p><?php echo $desc ?></p>
        <div class="social d-flex">
            <?php foreach($social as $single) :?>
                <a href="<?php echo $single['link'] ?>" class="social_icon">
                    <img src="<?php echo $single['icon']['url'] ?>" alt="<?php echo $single['icon']['url'] ?>">
                </a>
            <?php endforeach;  ?>
        </div>
        <hr>
        <p>
            &copy; <?php echo date('Y'); ?> Wszystkie prawa zastrzeżone.
        </p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>