<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>

   <div class="page" style="padding-top: 0;">
      <div class="section section-single bg-gray-dark bg-image bg-image-dark" style="background-image: url(<?=$album->showImagesUrl()[0];?>);">
        <div class="section-single__inner" style="background: rgba(0,0,0,0.5);">
          <div class="section-single__header">
            <div class="shell">
            <!-- Brand-->
            </div>
          </div>
          <div class="section-single__main">
            <div class="shell">
              <div class="range range-md-center">
                <div class="cell-md-12 cell-lg-11" style="margin-bottom: 130px;">
                  <h1 class="text-bold"><?=$album->h1;?></h1>
                  <div class="divider-small divider-primary"> </div>
                  <ul class="breadcrumbs-custom__path">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/category/<?=$category->slug;?>"><?=$category->h1;?></a></li>
                    <li class="active"><?=$album->h1;?></li>
                  </ul>
                  <br><br>
                  <a href="#photo-1"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-down"></span>Смотреть фотографии</div></a>
                </div>
              </div>
            </div>
          </div>
          <div class="section-single__footer">
            <div class="shell">
                <div class="range range-md-center">
                    <div class="cell-md-12 cell-lg-11">
                    <!-- Footer-->
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<section id="photo-1" class="section section-md bg-white oh text-center">
        <div class="shell">
        <p><?=$album->text1;?></p>
    <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
            <div class="row">
                <?php $images_url = $album->showImagesUrl(); ?>
                <? $counter = 0; ?>
                <?php foreach($images_url as $url): ?>
                <?php if ($counter != 0) { ?>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <?php $resized_image = $IMG->resize($url, 0, 800);
                        $size = getimagesize($_SERVER['DOCUMENT_ROOT'].$resized_image);
                    ?>
                    <img class="lazy nosave" data-src="<?=$resized_image;?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?=$album->title;?> фото <?=$counter;?>" <?php echo $size[3];?>>
                    <noscript><img class="nosave" src="<?=$resized_image;?>" data-src="" alt="<?=$album->title;?>" ></noscript>
                    </div>
                <? } ?>
                <? $counter++; ?>
                <?php endforeach; ?>
            </div>
          </div>
          <br>
          <p><?=$album->text2;?></p>
      </div>
</section>


<section class="section section-md bg-white oh text-center">
  <div class="shell">
  <div class="col-xs-12 col-sm-12">
    <h3>Хотите себе такую съемку? Оставьте заявку</h3>
    <br>
    </div>
  <div class="col-xs-12 col-sm-3">
    </div>
  <div class="col-xs-12 col-sm-6">
    <form id="callback-<?=$album->id?>" class="callback rd-mailform form_inline" method="post" action="">
    <div class="form__inner">
      <div class="form-wrap">
        <input class="form-input phone f-1 required input-pink" id="contact-phone-<?=$album->id?>" type="text" name="phone">
        <label class="form-label rd-input-label icon-gray-7" for="contact-phone-<?=$album->id?>" style="padding:5px;">Введите телефон</label>
      </div>
      <div class="form-button" style="padding-left:5px; padding-right:5px;">
        <button class="button button-primary button-ujarak button-pink" type="submit">Забронировать дату&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>
      </div>
    </div>
    <span id="text-success-<?=$album->id?>"></span>
    <textarea class="form-input f-1" id="contact-message-<?=$album->id?>" name="message" style="display: none !important;">Url: <?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>, Path: <?=$album->folder?></textarea>
  </form>
  <p class="icon-gray-7">*вы узнаете цены и свободна ли ваша дата</p>
    </div>
    <div class="col-xs-12 col-sm-3">
    </div>
  </div>
</section>

<!--Скачать фотографии-->

<!--Скачать фотографии-->

<section class="section section-md bg-white oh text-center">
        <div class="shell">
    <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">
                 <br>
                  <h2>Смотрите также:</h2>
                  <br>
              </div>

              <? $counter = 0; ?><!--показать только 6 альбомов, в приоритете следующие за текущим-->
              <?php foreach($albums as $alb): ?>
              <?php $images_url = $alb->showImagesUrl(); ?>
              <?php if ($alb->id == $album->id) {
                    $counter = 1;//нашли текущий альбом, начинаем показывать следующие
                } elseif (($counter >= 1) && ($counter <= 6)) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                      <a href="/album/<?=$alb->slug;?>" >
                          <img class="lazy" data-src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" src="<?=$IMG->resize($images_url[0], 37, 37, true);?>" alt="<?=$alb->title;?>" width="370" height="370">
                          <noscript><img src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" data-src="" alt="<?=$alb->title;?>" ></noscript>
                          </a>
                      <div class="row"><a href="/album/<?=$alb->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$alb->h1;?> (<?=count($images_url);?> фото)</div></a></div>
                   </div>
                   <? $counter++; ?>
                <? } ?>
              <?php endforeach; ?>

                <?php if ($counter < 6) ?><!--если недобрали 6шт, то заполнить с начала-->
                    <?php foreach($albums as $alb): ?>
                      <?php $images_url = $alb->showImagesUrl(); ?>
                      <?php if ($alb->id == $album->id) {
                            break;//нашли текущий альбом, закончили
                        } elseif ($counter <= 6) { ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                              <a href="/album/<?=$alb->slug;?>" >
                                  <img class="lazy" data-src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" src="<?=$IMG->resize($images_url[0], 37, 37, true);?>" alt="<?=$alb->title;?>" width="370" height="370">
                                  <noscript><img src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" data-src="" alt="<?=$alb->title;?>" ></noscript>
                                  </a>
                              <div class="row"><a href="/album/<?=$alb->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$alb->h1;?> (<?=count($images_url);?> фото)</div></a></div>
                           </div>
                           <? $counter++; ?>
                        <? } ?>
                      <?php endforeach; ?>

            </div>
          </div>
      </div>
      </section>