<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>
    

    <section class="breadcrumbs-custom bg-image" style="background-image: url(/images/breadcrumbs-image.jpg);">
        <div class="shell">
          <h1 class="breadcrumbs-custom__title">Отзывы</h1>
        <ul class="breadcrumbs-custom__path">
            <li><a href="/">Главная</a></li>
            <li class="active">Отзывы</li>
          </ul>
        </div>
      </section>

    <section class="section section-md bg-white text-center">
        <div class="shell">
        <ul class="breadcrumbs-custom__path">         
          <div class="range range-50 range-sm-center">
              <?php foreach($reviews as $review): ?>
            <div class="cell-sm-9 cell-md-6">
              <!-- Quote boxed-->
              <article class="quote-boxed"><span></span><span></span><span></span><span></span>
                <p class="quote-boxed__title"><?=$review->title;?></p>
                <div class="quote-boxed__text">
                  <svg class="quote-boxed__shape" version="1.1" x="0px" y="0px" viewBox="0 0 32.2 28" width="32.2" height="28">
                    <path d="M6.2,0C2.8,0,0,2.8,0,6.3s2.8,6.3,6.2,6.3c6.2,0,2.1,12.3-6.2,12.3v3C14.7,27.9,20.4,0,6.2,0L6.2,0z M23.9,0       c-3.4,0-6.2,2.8-6.2,6.3s2.8,6.3,6.2,6.3c6.2,0,2.1,12.3-6.2,12.3v3C32.4,27.9,38.2,0,23.9,0L23.9,0z M23.9,0"></path>
                  </svg>
                  <p><?=$review->description;?></p>
                </div>
                <ul class="quote-boxed__meta">
                  <li>
                    <div class="unit unit-horizontal unit-middle">
                        <?php $images_url = $review->showImagesUrl(); ?>                       
                      <div class="unit__left"><img class="quote-boxed__avatar" src="<?=$IMG->resize(is_array($images_url) ? $images_url[0] : $images_url, 46, 46, true);?>" alt="" width="46" height="46">
                      </div>
                      <div class="unit__body">
                        <cite class="quote-boxed__cite"><?=$review->name;?></cite>
                      </div>
                    </div>
                  </li>
                  <li>
                    <time class="quote-boxed__time"><?=$review->date;?></time>
                  </li>
                </ul>
              </article>
            </div>
            <?php endforeach; ?>
            
          </div>
        </div>
      </section>