<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>

    <section class="breadcrumbs-custom bg-image" style="background-image: url(/images/breadcrumbs-image.jpg);">
        <div class="shell">
          <h1 class="breadcrumbs-custom__title"><?=$category->h1;?></h1>
            <ul class="breadcrumbs-custom__path">
            <li><a href="/">Главная</a></li>
            <li class="active"><?=$category->h1;?></li>
          </ul>
        </div>
      </section>

<section class="section section-md bg-white oh text-center">
        <div class="shell">
        <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
            <div class="row">
                <?php foreach($albums as $album): ?>
              <?php $images_url = $album->showImagesUrl(); ?>

              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <a href="/album/<?=$album->slug;?>" >
                      <img class="lazy" data-src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" src="<?=$IMG->resize($images_url[0], 37, 37, true);?>" alt="<?=$album->title;?>" width="370" height="370">
                      <noscript><img src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" data-src="" alt="<?=$album->title;?>" ></noscript>
                      </a>
                  <div class="row"><a href="/album/<?=$album->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$album->h1;?> (<?=count($images_url)-1;?> фото)</div></a></div>
                </div>

                <?php endforeach; ?>
            </div>
          </div>
      </div>
</section>


