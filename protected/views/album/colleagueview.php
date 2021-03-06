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
                <div class="cell-md-12 cell-lg-11" style="margin-bottom: 30px;">
                  <h1 class="text-bold"><?=$album->h1;?></h1>
                  <div class="divider-small divider-primary"> </div>
                  <!--<ul class="breadcrumbs-custom__path">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/category/<?=$category->slug;?>"><?=$category->h1;?></a></li>
                    <li class="active"><?=$album->h1;?></li>
                  </ul>-->
                  <br><br>

                  <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                  <script src="https://yastatic.net/share2/share.js"></script>

                  <div class="col-xs-12 col-sm-12" style="margin-top: 30px;">
                  <div><span>
                    Сделайте репост на своей странице</span>
                    <div class="ya-share2"
                    data-services="facebook,odnoklassniki,vkontakte,whatsapp,viber,telegram"
                    data-title="Альбом «<?=$album->h1?>»"
                    data-description="<?=$album->title?> <?=$hashtags?>"
                    data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$album->showImagesUrl()[0];?>"
                    data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->id.'-'.$album->created_at.'?utm_repost=colleaguepost&date='.date('Ymd_His');?>">
                    </div>
                  </div><br>
                  </div>
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
        <h2>Кто работал на съемке:</h2>
        <p class="icon-gray-7">* если вы хотите быть здесь указаны или заметили ошибку, то сообщите мне об этом</p>
        <p><?=$album->text1;?></p>
    <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
            <div class="row">
                <?php $images_url = $album->showImagesUrl(); ?>
                <? $counter = 0; ?>
                <?php foreach($images_url as $url): ?>
                <?php if ($counter != 0) { ?>
                <div class="col-xs-12 col-sm-12 col-md-12" style="position:relative; padding-top:5px;">
                  <div class="ya-share2" style="position:absolute; top:10px; left:44%;"
                    data-services="pinterest,facebook,odnoklassniki,vkontakte,whatsapp,viber,telegram" data-limit="4"
                    data-title="Альбом «<?=$album->h1?>»"
                    data-description="<?=$album->title?> <?=$hashtags?>"
                    data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$url;?>"
                    data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->id.'-'.$album->created_at.'?utm_repost=colleaguepost&date='.date('Ymd_His');?>">
                  </div>
                  <?php if(getimagesize($_SERVER['DOCUMENT_ROOT'].$url)[0] > getimagesize($_SERVER['DOCUMENT_ROOT'].$url)[1]) {
                      $resized_image = $IMG->resize($url, 1080, 0);
                    }
                    else {
                      $resized_image = $IMG->resize($url, 0, 800);
                    }
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

<?php if(!empty($album->gallery1_link) || !empty($album->gallery2_link)) { ?>
<section id="form-1" class="section section-md bg-white oh text-center">
    <div class="shell">
    <h2>Кто работал на съемке:</h2>
    <p class="icon-gray-7">* если вы хотите быть здесь указаны или заметили ошибку, то сообщите мне об этом</p>
    <p><?=$album->text1;?></p>
    <?php if(!empty($album->gallery2_link)) { ?>
      <div class="col-xs-12 col-sm-12">
        <h3 style="background:#ffff00;">Скачать обработанные фотографии можно ниже</h3>        
        <b style="color:#008000;">(заполните анкету для скачивания)</b>
        <div><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"></div>        
      </div>
    <div class="col-xs-12 col-sm-3">
      </div>
    <div class="col-xs-12 col-sm-6">
      <!-- RD Mailform-->
      <form class="callback" id="callback-<?=$album->id?>" method="post" action="">
          <!--Ваше имя-->
          <div class="form-wrap">
            <input class="form-input required f-1" id="contact-name-<?=$album->id?>" type="name" name="name">
            <label class="form-label icon-gray-7" for="contact-name-<?=$album->id?>">Ваше имя *</label>
          </div>
          <!--Ваш контактный телефон-->
          <div class="form-wrap">
            <input class="form-input phone f-1 required" id="contact-phone-<?=$album->id?>" type="text" name="phone">
            <label class="form-label icon-gray-7" for="contact-phone-<?=$album->id?>">Ваш телефон *</label>
          </div>
          <!--Ваш контактный Email-->
          <div class="form-wrap">
              <input class="form-input required f-1" id="contact-email-<?=$album->id?>" type="email" name="email">
              <label class="form-label icon-gray-7" for="contact-email-<?=$album->id?>">Ваш e-mail *</label>
          </div>
          <!--Вопросы-->
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-1-<?=$album->id?>"><?=ВОПРОС_1_НА_ЭМЕЙЛ?> *</label>
            <textarea class="form-input required f-1" id="contact-question-1-<?=$album->id?>" name="contact-question-1"></textarea>
          </div>
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-2-<?=$album->id?>"><?=ВОПРОС_2_НА_ЭМЕЙЛ?> *</label>
            <textarea class="form-input required f-1" id="contact-question-2-<?=$album->id?>" name="contact-question-2"></textarea>
          </div>
          <div class="form-wrap">
            <label class="form-label icon-gray-7" for="contact-question-3-<?=$album->id?>"><?=ВОПРОС_3_НА_ЭМЕЙЛ?> *</label>
            <textarea class="form-input required f-1" id="contact-question-3-<?=$album->id?>" name="contact-question-3"></textarea>
          </div>

          <!--Текст и кнопка-->
          <span id="text-success-<?=$album->id?>"></span>
          <div id="client-button-<?=$album->id?>" class="form-wrap form-button offset-1">
            <br>
            <button class="button button-primary button-ujarak button-pink" type="submit">Скачать обработанные фото&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>            
          </div>
          <!--Скрытое поле-->
          <textarea class="form-input f-1" id="contact-message-<?=$album->id?>" name="message" style="display: none !important;">Url: <?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>, Path: <?=$album->folder?></textarea>
          <!--Скрытое поле-->
          <textarea class="form-input f-1" id="is-colleagueview-<?=$album->id?>" name="is-colleagueview" style="display: none !important;"><?=$album->id?></textarea>
      </form>

  <div id="client-gallery-<?=$album->id?>" style="display: none !important;" >
      <br>      
      <div class="col-xs-12 col-sm-12" style="margin-top: 30px;"></div>
      <?php if(!empty($album->gallery2_link)) { ?>
          <a href="<?=$album->gallery2_link?>" rel="nofollow noopener" target="_blank"><span class="button button-primary button-ujarak button-pink">Обработанные фото - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
      <?php } ?>      
    </div>
  </div>
    <div class="col-xs-12 col-sm-3">
    </div>
    <?php } ?>
    <div class="col-xs-12 col-sm-12">
    <?php if(!empty($album->gallery1_link)) { ?>
          <br><br>
          <a href="javascript:void(0)" onclick="alert('Отдаю за репост. Смотрите инструкцию ниже'); return false;"><span class="button button-primary button-ujarak button-pink">Все необработанные фото - Скачать&nbsp;<span class="icon mdi mdi-arrow-down"></span></span></a>
          <div><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"></div>
          <b style="color:#008000;">1. Сделайте репост на своей странице</b>
          <div><span></span>
            <div class="ya-share2"
            data-services="vkontakte,odnoklassniki,facebook,whatsapp,viber,telegram"
            data-limit="3"
            data-title="Альбом «<?=$album->h1?>»"
            data-description="<?=$album->title?> <?=$hashtags?>"
            data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$album->showImagesUrl()[0];?>"
            data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->id.'-'.$album->created_at.'?utm_repost=colleaguepost&date='.date('Ymd_His');?>">
            </div>
          </div>
          <div><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"></div>          
          <b style="color:#008000;">2. И отправьте мне в лс ссылку на репост</b>
          <div>
          <ul class="list-icons list-inline-sm">            
            <li><a class="icon icon-sm fa fa-instagram icon-style-camera text-primary" href="<?=INSTAGRAM_АККАУНТ?>" rel="nofollow noopener" target="_blank"><span></span><span></span><span></span><span></span></a></li>
            <li><a class="icon icon-sm fa fa-pinterest icon-style-camera text-primary" href="<?=VKONTAKTE_АККАУНТ?>" rel="nofollow noopener" target="_blank"><span></span><span></span><span></span><span></span></a></li>
            <li><a class="icon icon-sm fa fa-facebook icon-style-camera text-primary" href="<?=FACEBOOK_АККАУНТ?>" rel="nofollow noopener" target="_blank"><span></span><span></span><span></span><span></span></a></li>
            <li><a class="icon icon-sm fa fa-whatsapp icon-style-camera text-primary" href="<?=WHATSAPP_АККАУНТ?>" rel="nofollow noopener" target="_blank"><span></span><span></span><span></span><span></span></a></li>
            <li><a class="icon icon-sm fa fa-phone-square icon-style-camera text-primary" href="<?=VIBER_АККАУНТ?>" rel="nofollow noopener" target="_blank"><span></span><span></span><span></span><span></span></a></li>
          </ul>
          </div>
          <div><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"></div>
          <b style="color:#008000;">3. Получите ссылку на весь необработанный материал в ответ!</b>
      <?php } ?>
      <div class="col-xs-12 col-sm-12" style="margin-top: 30px;"><p class="icon-gray-7" style="color:#008000; background:#ffff00;">Нравится сайт? <a style="text-decoration:underline;" href="mailto:ded48@inbox.ru" rel="nofollow noopener" target="_blank"><b>Напишите сюда</b></a> и сделаем вам такой же</p></div>
    </div>
    </div>
  </section>
  <?php } ?>