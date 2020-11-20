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
                  <br>
                  <div class="col-xs-12 col-sm-12">
                    <form id="callback-<?=$service->id?>" class="callback rd-mailform form_inline" method="post" action="">
                    <div class="form__inner">
                      <div class="form-wrap">
                        <input class="form-input phone f-1 required input-pink" id="contact-phone-<?=$service->id?>" type="text" name="phone">
                        <label class="form-label rd-input-label icon-gray-7" for="contact-phone-<?=$service->id?>" style="padding:5px;">Введите телефон</label>
                      </div>
                      <div class="form-button" style="padding-left:5px; padding-right:5px;">
                        <button class="button button-primary button-ujarak button-pink" type="submit">Оставить заявку&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>
                      </div>
                    </div>
                    <span id="text-success-<?=$service->id?>"></span>
                    <textarea class="form-input f-1" id="contact-message-<?=$service->id?>" name="message" style="display: none !important;">Url: <?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?><br><br>Заявка: <?=$service->title?> | <?=$category->h1?><br><br><?=$service->description?><br><br>Price: <?=$service->price?><br></textarea>
                    </form>
                  </div>                  
                </div>
              </article>
              <? } ?>  
              <?php endforeach; ?>
              <br><br>
        <?php endforeach; ?>
        </div>
      </section>