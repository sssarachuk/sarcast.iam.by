<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>    

    <section class="breadcrumbs-custom bg-image" style="background-image: url(/images/breadcrumbs-image.jpg);">
        <div class="shell">
          <h1 class="breadcrumbs-custom__title">Цены</h1>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/">Главная</a></li>
            <li class="active">Цены</li>
          </ul> 
        </div>
      </section>

<section class="section section-md bg-white text-center">
        <div class="shell"> 
         <?php foreach($categories as $category): ?>
         <span id="price-<?=$category->slug;?>"></span>
         <h2><?=$category->h1;?></h2>
         <br>
              <?php foreach($services as $key => $service): ?>
                <? if ($service->category_id == $category->id) { ?>  
                 <?php $images_url = $service->showImagesUrl(); ?>
              <!-- Box triangle-->
              <article class="box-triangle <?=($key%2) ? 'box-triangle_reverse': '';?>"><span class="box-triangle__aside"> <img class="box-triangle__image" src="<?=$IMG->resize(is_array($images_url) ? $images_url[0] : $images_url, 585, 433);?>" alt="" width="585" height="433"></span>
                <div class="box-triangle__main">
                  <p class="heading-1"><span><?=$service->title;?></span></p>
                  <p><?=$service->description;?></p>
                  <div class="box-info"><span class="box-info__icon icon mdi mdi-emoticon-happy"></span><span class="box-info__title"><?=$service['price'];?></span></div>
                </div>
              </article>
              <? } ?>  
              <?php endforeach; ?>
              <br><br>
        <?php endforeach; ?>
        </div>
      </section>