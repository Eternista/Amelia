<?php

$fields = get_field('banner');
$content = $fields['content'];
$image = $fields['images'];

?>
<section class="max-padding banner">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-context col-12">
                <h1><?php echo $content['title']; ?></h1>
                <p><?php echo $content['desc']; ?></p>
                <div class="d-flex dual-btn">
                    <a href="#" class="btn btn-primary"><span class="btn_text">Umów lekcję próbną</span></a>
                    <a href="#" class="btn btn-secondary"><span class="btn_text">Zobacz program</span></a>
                </div>
                <div class="d-flex students">
                    <img src="" alt="students">
                    <p>200+ zadowolonych uczniów</p>
                </div>
            </div>
            <div class="col-image col-12">
                <div class="banner_image">
                    <img src="<?php echo $image['desktop']['url']; ?>" alt="<?php echo $image['desktop']['alt']; ?>" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>