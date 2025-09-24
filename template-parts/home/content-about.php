<?php

$fields = get_field('about');
$content = $fields['context'];
$image = $fields['images'];

?>
<section class="max-padding about">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-image col-12">
                <div class="about_image">
                    <img src="<?php echo $image['desktop']['url']; ?>" alt="<?php echo $image['desktop']['title']; ?>" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-context col-12">
                <img class="sec-desc" src="/wp-content/uploads/2025/09/about-sec.png" alt="korepetytor">
                <h2><?php echo $content['title']; ?></h2>
                <p><?php echo $content['desc']; ?></p>
                <div class="icon_points">
                    <?php  foreach($content['points'] as $point): ?>
                        <div class="single-item d-flex">
                            <img src="<?php echo $point['ikona']['url']; ?>" alt="<?php echo $point['ikona']['title']; ?>">
                            <div class="single-item_context">
                                <h3><?php echo $point['title']; ?></h3>
                                <?php echo $point['description']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="tutoring">
                    <h3><?php echo $content['tutor-title']; ?></h3>
                    <p><?php echo $content['tutoring']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>