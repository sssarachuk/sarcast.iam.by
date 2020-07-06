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
                <?php if(!empty($album->review_before) && empty($album->review_after)) { ?>
                  <br><br>
                  <?php if(!empty($album->gallery1_link)) { ?>
                    <a href="<?=$album->gallery1_link?>" rel="nofollow" target="_blank"><span class="button button-primary button-ujarak button-pink">Галерея 1 - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
                  <?php } ?>
                  <?php if(!empty($album->gallery2_link)) { ?>
                    <a href="<?=$album->gallery2_link?>" rel="nofollow" target="_blank"><span class="button button-primary button-ujarak button-pink">Галерея 2 - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
                  <?php } ?>
                <?php } ?>
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

<section id="form-1" class="section section-md bg-white oh text-center">
    <div class="shell">
    <div class="col-xs-12 col-sm-12">
    <?php if(empty($album->review_before) && (!empty($album->gallery1_link) || !empty($album->gallery2_link))) { ?>
      <h3>Заполните форму чтобы скачать фотографии</h3>
      <p class="icon-gray-7">*несколько вопросов о вашем впечатлении при работе со мной</p>
    <?php } else if(!empty($album->gallery1_link) || !empty($album->gallery2_link)) { ?>
      <!--<h3>Ссылки на фотографии</h3>-->
    <?php } ?>
      <br>
      </div>
    <div class="col-xs-12 col-sm-3">
      </div>
    <div class="col-xs-12 col-sm-6">
    <?php if(empty($album->review_before) && (!empty($album->gallery1_link) || !empty($album->gallery2_link))) { ?>
      <!-- RD Mailform-->
      <form class="callback" id="callback-<?=$album->id?>" method="post" action="">
          <!--Ваш контактный Email-->
          <div class="form-wrap">
            <input class="form-input required f-1" id="contact-email-<?=$album->id?>" type="email" name="email">
            <label class="form-label icon-gray-7" for="contact-email-<?=$album->id?>">Ваш контактный e-mail *</label>
          </div>
          <!--Ваш контактный телефон-->
          <div class="form-wrap">
            <input class="form-input phone f-1 required" id="contact-phone-<?=$album->id?>" type="text" name="phone">
            <label class="form-label icon-gray-7" for="contact-phone-<?=$album->id?>">Ваш контактный телефон *</label>
          </div>
          <!--Вопросы-->
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-1-<?=$album->id?>">Несколько слов о съемке *</label>
            <textarea class="form-input required f-1" id="contact-question-1-<?=$album->id?>" name="contact-question-1"></textarea>
          </div>
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-2-<?=$album->id?>">Несколько слов обо мне *</label>
            <textarea class="form-input required f-1" id="contact-question-2-<?=$album->id?>" name="contact-question-2"></textarea>
          </div>
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-3-<?=$album->id?>">Что вам понравилось? *</label>
            <textarea class="form-input required f-1" id="contact-question-3-<?=$album->id?>" name="contact-question-3"></textarea>
          </div>
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-4-<?=$album->id?>">Что мне стоит улучшить? *</label>
            <textarea class="form-input required f-1" id="contact-question-4-<?=$album->id?>" name="contact-question-4"></textarea>
          </div>
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-5-<?=$album->id?>">Кто еще работал на съемке? (ссылки на их странички) *</label>
            <textarea class="form-input required f-1" id="contact-question-5-<?=$album->id?>" name="contact-question-5"></textarea>
          </div>
          <!--Текст и кнопка-->
          <span id="text-success-<?=$album->id?>"></span>
          <div id="client-button-<?=$album->id?>" class="form-wrap form-button offset-1">
            <br>
            <button class="button button-primary button-ujarak button-pink" type="submit">Отправить&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>
            <!--<p class="icon-gray-7">*после отправки перезагрузите страницу</p>-->
          </div>
          <!--Скрытое поле-->
          <textarea class="form-input f-1" id="contact-message-<?=$album->id?>" name="message" style="display: none !important;">Url: <?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>, Path: <?=$album->folder?></textarea>
          <!--Скрытое поле-->
          <textarea class="form-input f-1" id="is-clientview-<?=$album->id?>" name="is-clientview" style="display: none !important;"><?=$album->id?></textarea>
      </form>
<?php } else { ?>

  <?php } ?>

    <div id="client-gallery-<?=$album->id?>" style="display: none !important;">
    <br>
      <?php if(!empty($album->gallery1_link)) { ?>
        <div>
          <br>
          <a href="<?=$album->gallery1_link?>" rel="nofollow" target="_blank"><span class="button button-primary button-ujarak button-pink">Галерея 1 - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
        </div>
      <?php } ?>
      <?php if(!empty($album->gallery2_link)) { ?>
        <div>
          <br>
          <a href="<?=$album->gallery2_link?>" rel="nofollow" target="_blank"><span class="button button-primary button-ujarak button-pink">Галерея 2 - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
        </div>
      <?php } ?>
    </div>

  </div>
    <div class="col-xs-12 col-sm-3">
    </div>
    <div class="col-xs-12 col-sm-12" style="margin-top: 30px;">
      <div><span>Поделитесь с друзьями (<?=count($album->showImagesUrl())-1;?> фото, лучшие): </span>
        <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
        <script src="https://yastatic.net/share2/share.js"></script>
        <div class="ya-share2"
        data-services="vkontakte,odnoklassniki,facebook,viber,whatsapp,telegram"
        data-title="<?=$album->h1?> ✈ <?=$category->h1?>"
        data-description="<?=$album->title?>"
        data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$album->showImagesUrl()[0];?>"
        data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->slug;?>">
        </div>
      </div>
    </div>

    </div>
  </section>

  <?php if(!empty($album->review_before)) { ?>
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
                      <div class="row"><a href="/album/<?=$alb->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$alb->h1;?> (<?=count($images_url)-1;?> фото)</div></a></div>
                   </div>
                   <? $counter++; ?>
                <? } ?>
              <?php endforeach; ?>
              <?php if ($counter == 0) $counter = 1; ?> <!--если текущий альбом был скрыт-->
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
                            <div class="row"><a href="/album/<?=$alb->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$alb->h1;?> (<?=count($images_url)-1;?> фото)</div></a></div>
                          </div>
                          <? $counter++; ?>
                      <? } ?>
                    <?php endforeach; ?>

            </div>
          </div>
      </div>
      </section>
  <?php } ?>