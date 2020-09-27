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
                    В качестве благодарности за мою работу<br>поделитесь в соцсетях: </span>
                    <div class="ya-share2"
                    data-services="vkontakte,odnoklassniki,facebook,whatsapp,viber,telegram"
                    data-title="Альбом «<?=$album->h1?>» ✈ <?=$category->h1?>"
                    data-description="<?=$album->title?> <?=$hashtags?>"
                    data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$album->showImagesUrl()[0];?>"
                    data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->slug;?>">
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
                    data-services="pinterest,collections,vkontakte,odnoklassniki,facebook,whatsapp,viber,telegram" data-limit="5"
                    data-title="Альбом «<?=$album->h1?>» ✈ <?=$category->h1?>"
                    data-description="<?=$album->title?> <?=$hashtags?>"
                    data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$url;?>"
                    data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->slug;?>">
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
      <div class="col-xs-12 col-sm-12">
        <h3 style="background:#ffff00;">Скачать фотографии можно ниже</h3>
        <div><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"></div>
        <b style="color:#008000;">(ссылку получите после заполнения формы отзыва)</b>
        <div><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"><span class="icon mdi mdi-arrow-down"></div>
        <b style="color:#008000; background:#ffff00;">Пожалуйста, проявите ответственность, так вы поможете всем нам лучше работать в команде.<br><br>Уделите немного больше времени в благодарность за фото.<br>Спасибо за понимание!</b>
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
            <label class="form-label icon-gray-7" for="contact-name-<?=$album->id?>">Ваша страничка в интернете (укажу здесь для вашей рекламы) *</label>
          </div>
          <!--Ваш контактный телефон-->
          <div class="form-wrap">
            <input class="form-input phone f-1 required" id="contact-phone-<?=$album->id?>" type="text" name="phone">
            <label class="form-label icon-gray-7" for="contact-phone-<?=$album->id?>">Ваш телефон (для приема заказов по моей рекомендации) *</label>
          </div>
          <!--Ваш контактный Email-->
          <div class="form-wrap">
              <input class="form-input required f-1" id="contact-email-<?=$album->id?>" type="email" name="email">
              <label class="form-label icon-gray-7" for="contact-email-<?=$album->id?>">Ваш e-mail (придет ссылка на скачку фото (проверяйте спам)) *</label>
          </div>

          <div class="form-wrap" style="padding: 10px 0;">
            <br><b>а теперь ПРЕДСТАВЬТЕ СЕБЯ КЛИЕНТОМ<br>(что бы вы ответили на эти вопросы?):</b><br>
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
            <div class="form-wrap">
              <label class="form-label icon-gray-7" for="contact-question-4-<?=$album->id?>"><?=ВОПРОС_4_НА_ЭМЕЙЛ?> *</label>
              <textarea class="form-input required f-1" id="contact-question-4-<?=$album->id?>" name="contact-question-4"></textarea>
            </div>            

          <!--Текст и кнопка-->
          <span id="text-success-<?=$album->id?>"></span>
          <div id="client-button-<?=$album->id?>" class="form-wrap form-button offset-1">
            <br>
            <button class="button button-primary button-ujarak button-pink" type="submit">Хочу скачать&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>
            <b style="color:#008000;">* после нажатия ссылки придут на ваш e-mail (проверяйте спам)</b>
          </div>
          <!--Скрытое поле-->
          <textarea class="form-input f-1" id="contact-message-<?=$album->id?>" name="message" style="display: none !important;">Url: <?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>, Path: <?=$album->folder?></textarea>
          <!--Скрытое поле-->
          <textarea class="form-input f-1" id="is-colleagueview-<?=$album->id?>" name="is-colleagueview" style="display: none !important;"><?=$album->id?></textarea>
      </form>

  <div id="client-gallery-<?=$album->id?>" style="display: none !important;" >
      <br>
      <div><span>В качестве благодарности за мою работу<br>поделитесь в соцсетях: </span>
          <div class="ya-share2"
          data-services="vkontakte,odnoklassniki,facebook,whatsapp,viber,telegram"
          data-title="Альбом «<?=$album->h1?>» ✈ <?=$category->h1?>"
          data-description="<?=$album->title?> <?=$hashtags?>"
          data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$album->showImagesUrl()[0];?>"
          data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$album->slug;?>">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12" style="margin-top: 30px;"></div>
      <?php if(!empty($album->gallery1_link)) { ?>
          <a href="<?=$album->gallery1_link?>" rel="nofollow noopener" target="_blank"><span class="button button-primary button-ujarak button-pink">Галерея 1 - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
      <?php } ?>
      <?php if(!empty($album->gallery2_link)) { ?>
          <a href="<?=$album->gallery2_link?>" rel="nofollow noopener" target="_blank"><span class="button button-primary button-ujarak button-pink">Галерея 2 - Скачать&nbsp;<span class="icon mdi mdi-download"></span></span></a>
      <?php } ?>
      <div class="col-xs-12 col-sm-12" style="margin-top:10px; color:#008000; background:#ffff00;"><p>Ссылка на скачку уже отправлена на ваш E-mail (проверьте почту, и папку Спам).<br><b>Повторно заполнять не нужно!</b></p></div>
      <div class="col-xs-12 col-sm-12" style="margin-top: 30px;"><p class="icon-gray-7" style="color:#008000; background:#ffff00;">Хотите себе такой сайт? <a style="text-decoration:underline;" href="mailto:sssarachuk@yandex.ru" rel="nofollow noopener" target="_blank"><b>Напишите сюда</b></a></p></div>
    </div>
  </div>
    <div class="col-xs-12 col-sm-3">
    </div>
    </div>
  </section>
  <?php } ?>

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