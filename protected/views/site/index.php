<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>

<!--Слайдер-->
<section id="start" class="section section-variant-1 bg-white text-center" style="padding:0 0 15px 0;">
        <div class="shell">
          <div class="range range-30 range-md-center">
           <h1><?= К_ЗАГОЛОВОК2_ГЛАВНОЙ_СТРАНИЦЫ ?></h1>
            <div class="cell-md-11 cell-lg-10">
              <!-- Single post-->
              <div class="owl-carousel-wrap owl-carousel_style-1">
                <div class="owl-carousel" data-autoplay="true" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav" >

                <? $counter = 1; ?>
                <?php foreach($sliders as $slider): ?>
                    <?php $images_url = $slider->showImagesUrl(); ?>
                    <? if (!isset($images_url) || empty($images_url))
                          break; ?>
                      <div class="owl-stage-outer">
                        <div class="owl-stage">
                          <div class="owl-item">
                            <div class="item">
                              <?php $resized_image = $IMG->resize($images_url, 968, 0);
                                    $size = getimagesize($_SERVER['DOCUMENT_ROOT'].$resized_image); ?>
                              <img class="owl-lazy" data-src="<?=$resized_image;?>"
                               src="<? if ($counter == 1) echo $IMG->resize($images_url, 96, 0); ?>"
                               alt="<?=К_ЗАГОЛОВОК_ГЛАВНОЙ_СТРАНИЦЫ?> - Фото <?=$counter;?>" <? echo $size[3]; ?> >
                              <? $counter++; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php endforeach; ?>

                </div>
                <div class="owl-outer-navigation" id="owl-carousel-nav">
                  <button class="owl-arrow owl-arrow-prev">
                    <svg x="0px" y="0px" viewBox="0 0 28.5 16" width="26" height="14">
                    <line fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="27.5" y1="8" x2="1" y2="8" ></line>
                    <polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8.8,15 1,8 8.8,1"></polyline>
                    </svg>
                  </button>
                  <button class="owl-arrow owl-arrow-next">
                    <svg x="0px" y="0px" viewBox="0 0 28.5 16" width="26" height="14">
                    <line fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" y1="8" x2="27.5" y2="8"></line>
                    <polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="19.7,15 27.5,8 19.7,1"></polyline>
                    </svg>
                  </button>
                  </div>
              </div>
              <!-- Single post-->
            </div>
          </div>
        </div>
</section>
<!--Слайдер-->
<!--кнопка Узнать подробнее-->
<section id="send-form" class="section section-md bg-white oh text-center">
<div class="shell">
    <div>
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="cell-sm-6 cell-md-7">
                    <div class="col-xs-12 col-sm-2">
                    </div>
                   <div class="col-xs-12 col-sm-6">
                     <p class="h3" style="margin:0;">Оставьте заявку чтобы получить <span style="display: inline-block;"><b>3 подарка</b></span> и консультацию</p>
                     <form id="callback" class="callback rd-mailform form_inline" method="post" action="">
                          <div class="form__inner">
                            <div class="form-wrap">
                              <input class="form-input phone f-1 required input-pink" id="contact-phone" type="text" name="phone">
                              <label class="form-label rd-input-label icon-gray-7" for="contact-phone" style="padding:5px;">Введите телефон</label>
                            </div>
                            <div class="form-button" style="padding-left:5px; padding-right:5px;">
                              <button class="button button-primary button-ujarak button-pink" type="submit">Узнать подробнее&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>
                            </div>
                          </div>
                          <span id="text-success"></span>
                          <textarea class="form-input f-1" id="contact-message" name="message" style="display: none !important;">Url: <?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>, Gift: true</textarea>
                        </form>
                        <p class="icon-gray-7">*предложения и свободные даты ограничены</p>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                      <img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjE5NjEzQzZEQjRBMDExRUE4NkZCOUM4Nzc1QkQyQjA3IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjE5NjEzQzZDQjRBMDExRUE4NkZCOUM4Nzc1QkQyQjA3IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NkMzRTUyQUVBMEY5MTFFQUFBQ0FBODc2Q0E4QTk4M0EiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NkMzRTUyQUZBMEY5MTFFQUFBQ0FBODc2Q0E4QTk4M0EiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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" alt="Подарок 1" width="120" height="120">
                    </div>
                    <div class="col-xs-12 col-sm-2">
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
</section>
<!--кнопка Узнать подробнее-->
<!--Категории Альбомов-->
<?php foreach($categories as $category): ?>
<section id="<?=$category->slug?>" class="section section-variant-1 bg-white text-center">
        <div class="shell">
          <div class="range range-30 range-md-center">
             <div class="cell-md-11 cell-lg-10">
                 <h2><?=$category->h1?></h2>
              </div>
            <?php $images_url = $category->showImagesUrl(); ?>
            <? $counter = 1; ?>
            <? if (isset($images_url) && !empty($images_url)) { ?>
            <!-- Slider-->
            <div class="cell-md-11 cell-lg-10">
			  <div class="owl-carousel-wrap owl-carousel_style-1">
          <div class="owl-carousel" data-autoplay="false" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav-<?=$category->id;?>" >
              <?php foreach($images_url as $url) : ?>
                  <div class="owl-stage-outer">
                    <div class="owl-stage">
                      <div class="owl-item">
                        <div class="item">
                          <?php $resized_image = $IMG->resize($url, 968, 0); ?>
                          <?php $size = getimagesize($_SERVER['DOCUMENT_ROOT'].$resized_image); ?>
                          <img class="owl-lazy" data-src="<?=$resized_image;?>" alt="<?=$category->h1;?> - Фото <?=$counter;?>" <?php echo $size[3];?>>
                          <? $counter++; ?>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php endforeach; ?>
					</div>
					<div class="owl-outer-navigation" id="owl-carousel-nav-<?=$category->id?>">
						<button class="owl-arrow owl-arrow-prev">
						  <svg x="0px" y="0px" viewBox="0 0 28.5 16" width="26" height="14">
							<line fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="27.5" y1="8" x2="1" y2="8" ></line>
							<polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8.8,15 1,8 8.8,1"></polyline>
						  </svg>
						</button>
						<button class="owl-arrow owl-arrow-next">
						  <svg x="0px" y="0px" viewBox="0 0 28.5 16" width="26" height="14">
							<line fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1" y1="8" x2="27.5" y2="8"></line>
							<polyline fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="19.7,15 27.5,8 19.7,1"></polyline>
						  </svg>
						</button>
					  </div>
				</div>
            </div>
            <!-- Slider-->
            <? } ?>
            <div class="cell-xs-12 bg-white">
                  <a href="/category/<?=$category->slug?>"><div class="button button-primary button-ujarak button-pink">Посмотреть больше <span class="icon mdi mdi-arrow-right"></span></div></a>
                  <br>
                  <p class="icon-gray-7">*все альбомы фотографий</p>
            </div>
            <div class="cell-md-11 cell-lg-10">
                <p><?=$category->text1?></p>
            </div>
            <!--стоимость-->
            <? if (isset($services) && !empty($services)) { ?>
            <span id="price-<?=$category->slug?>"></span>
            <div class="cell-xs-12 bg-gray-lighter" style="padding: 15px;">
            <h3>Цена - <?=$category->h1_nav?></h3>
            <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-<?=$category->slug?>" >
                <ul class="nav nav-tabs">
                    <? $counter = 1; ?>
                    <?php foreach($services as $service): ?>
                        <? if ($service->category_id == $category->id) { ?>
                           <? if ($counter == 3) { ?>
                               <li class="active"><a href="#tabs-<?=$category->slug?>-<?=$counter?>" data-toggle="tab"><?=$service->title?></a></li>
                           <? } else {?>
                                <li><a href="#tabs-<?=$category->slug?>-<?=$counter?>" data-toggle="tab"><?=$service->title?></a></li>
                            <? } ?>
                            <? $counter++; ?>
                        <? } ?>
                    <?php endforeach; ?>
                </ul>
                   <div class="tab-content">
                    <? $counter = 1; ?>
                   <?php foreach($services as $service): ?>
                        <? if ($service->category_id == $category->id) { ?>

                                <div class="tab-pane fade<? if ($counter == 3) { echo " in active"; } ?>" id="tabs-<?=$category->slug?>-<?=$counter?>">

                                <div class="col-xs-12 col-sm-3">
                                  </div>
                                <div class="col-xs-12 col-sm-6">
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
                                  <div class="col-xs-12 col-sm-3">
                                  </div>

                                  <div class="col-xs-12 col-sm-12">
                                  </div>

                                <div class="col-xs-12 col-sm-6">
                                  <p><?=$service->description?></p>
                                  <div class="box-info"><span class="box-info__title"><?=$service->price?></span></div>
                                  <br><br>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                  <?php $images_url = $service->showImagesUrl(); ?>
                                  <img class="lazy nosave" data-src="<?=$IMG->resize(is_array($images_url) ? $images_url[0] : $images_url, 0, 400);?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw==" alt="Цена <?=$category->h1?> - <?=$service->title;?> фото <?=$service->id;?>" height="400">
                                </div>

                              </div>

                            <? $counter++; ?>
                        <? } ?>
                    <?php endforeach; ?>
                    </div>
              </div>
            </div>
            <? } ?>
            <!--стоимость-->
          </div>
        </div>
</section>
<?php endforeach; ?>
<!--Категории Альбомов-->
<!--Ключевые преимущества-->
<section class="section section-md bg-white oh text-center" style="padding-top: 5px;">
<div class="shell">
    <div style="position: relative;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                 <br>
                 <h2>Почему, 5 лет подряд, клиенты доверяют мне?</h2>
                 <br>
                  <div class="range range-30">
                <div class="cell-xs-10 cell-sm-6 cell-md-4">
                  <article class="box-minimal">
                    <div class="box-minimal__icon fa fa-thumbs-o-up"></div>
                    <h3 class="box-minimal__title">Профессионализм</h3>
                    <div class="box-minimal__divider"></div>
                    <div class="box-minimal__text">Съемка с двумя камерами топового уровня. Есть своя фотостудия, вспышки, и 5 премиум объективов. Фотографии со всех камер дублируются на 2 флешки. Гарантия сохранности материала 5 лет</div>
                  </article>
                </div>
                <div class="cell-xs-10 cell-sm-6 cell-md-4">
                  <article class="box-minimal">
                    <div class="box-minimal__icon fa fa-photo"></div>
                    <h3 class="box-minimal__title">Обработка фотографий</h3>
                    <div class="box-minimal__divider"></div>
                    <div class="box-minimal__text">Натуральные естественные цвета даже без фотошопа. Чтобы добиться таких цветов я несколько лет изучал живопись. Горжусь скоростью обработки, могу отдавать фото сразу на следующий день, быстрее всех</div>
                  </article>
                </div>
                <div class="cell-xs-10 cell-sm-6 cell-md-4">
                  <article class="box-minimal">
                    <div class="box-minimal__icon fa fa-plane"></div>
                    <h3 class="box-minimal__title">Насмотренность</h3>
                    <div class="box-minimal__divider"></div>
                    <div class="box-minimal__text">Снимаю правильные композиционные кадры, грамотно выбираю ракурсы и кадрирование. Путешествую и посещаю лучшие музеи и выставки, поэтому сразу вижу лучшие позы, свет, и локацию</div>
                  </article>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--Ключевые преимущества-->
<!-- FAQ-->
<section class="section section-md bg-white">
        <div class="shell">
          <div class="range range-md-center">
           <div class="cell-md-11 cell-lg-10">
                          <h2 style="text-align:center;">Часто задаваемые вопросы</h2>
                          <p></p>
                          <br>
                    </div>
            <div class="cell-md-9 cell-lg-7">
              <!-- Bootstrap collapse-->
              <div class="panel-group panel-group-custom panel-group-corporate" id="accordion1" role="tablist" aria-multiselectable="false">
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading1" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse1" aria-controls="accordion1Collapse1" aria-expanded="false">Подскажите, сколько стоит фотосессия?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse1" role="tabpanel" aria-labelledby="accordion1Heading1">
                    <div class="panel-body">
                      <p>Стоимость обсуждается отдельно, в зависимости от ваших пожеланий. Ориентируйтесь на 20-50уе/час. Ниже есть форма заявки - напишите какую съемку вы хотите и узнаете рассчет точной цены</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading2" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse2" aria-controls="accordion1Collapse2">Снимаете ли вы в других городах, и сколько это стоит?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse2" role="tabpanel" aria-labelledby="accordion1Heading2">
                    <div class="panel-body">
                      <p>Да, я люблю путешествовать и с удовольствием приеду. Для свадебных съемок по Беларуси в стоимость не добавляются транспортные расходы</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading3" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse3" aria-controls="accordion1Collapse3">Отдаете ли вы весь отснятый материал?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse3" role="tabpanel" aria-labelledby="accordion1Heading3">
                    <div class="panel-body">
                      <p>Да, отбираю брак и отдаю весь материал в формате jpeg. Можно и без отбора, тогда передача фотографий возможна сразу после съемки при наличии ноутбука. И конечно же отбираю лучшие (10-30фото/час) и обрабатываю дома</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading4" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse4" aria-controls="accordion1Collapse4">Вы снимаете на улице или в студии?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse4" role="tabpanel" aria-labelledby="accordion1Heading4">
                    <div class="panel-body">
                      <p>Оба варианта, но предпочитаю студию. Учитывайте, что очень сложно планировать улицу в нашей климатической зоне, когда в любой момент может сорваться съемка из-за неподходящей погоды</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading5" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse5" aria-controls="accordion1Collapse5">Сколько по времени делаются фотографии?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse5" role="tabpanel" aria-labelledby="accordion1Heading5">
                    <div class="panel-body">
                      <p>До 1 месяца, но не более. Всегда делаю раньше, обычно 1 неделя, в любом случае я сразу же пишу вам. Если фотографии делаю долго это совсем не означает, что у меня нет творческого настроения, просто большая загрузка и я физически не успеваю</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading6" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse6" aria-controls="accordion1Collapse6">Как можно забрать фотографии?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse6" role="tabpanel" aria-labelledby="accordion1Heading6">
                    <div class="panel-body">
                      <p>Фотографии передаются через файлообменник мейл ру, качество фотографий при этом сохраняется</p>
                    </div>
                  </div>
                </div>
                <!-- Bootstrap panel-->
                <div class="panel panel-custom panel-corporate">
                  <div class="panel-heading" id="accordion1Heading7" role="tab">
                    <div class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1Collapse7" aria-controls="accordion1Collapse7">Есть ли у вас запасной комплект оборудования?
                        <div class="panel-arrow"></div></a>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="accordion1Collapse7" role="tabpanel" aria-labelledby="accordion1Heading7">
                    <div class="panel-body">
                      <p>Конечно, да! На каждой съемке у меня двойной набор профессиональной техники, более того все ваши фотографии хранятся в двух экземплярах</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<!-- FAQ-->
<!--Отправить заявку + получить подарок-->
<!--<section id="send-form2" class="section section-md bg-gray-lighter text-center">
<div class="shell">
  <div class="range range-md-center">
    <div class="cell-md-11 cell-lg-10">
     <h2>Проверьте, свободен ли я на вашу дату?</h2>
     <p>Отправьте заявку прямо сейчас!</p>
     <div class="layout-columns__main" style="margin:15px auto;">
      <div class="layout-columns">
       <div class="layout-columns__main-inner">
            <form class="callback" id="callback2" method="post" action="">
              <div class="form-wrap">
                <input class="form-input required f-1" id="contact-email2" type="email" name="email">
                <label class="form-label" for="contact-email">E-mail *<span style="color:green; font-size:80%;"> (нужен для отправки подарков):</span></label>
              </div>
              <div class="form-wrap">
                <input class="form-input required f-1" id="contact-name2" type="text" name="name">
                <label class="form-label" for="contact-name">Ваше имя *<span style="color:green; font-size:80%;"> (чтобы знать как к вам обращаться):</span></label>
              </div>
              <div class="form-wrap">
                <label class="form-label" for="contact-message">Инфо *<span style="color:green; font-size:80%;"> (как вы меня нашли, и что-то о себе):</span></label>
                <textarea class="form-input required f-1" id="contact-message2" name="message"></textarea>
              </div>
              <div class="form-wrap">
                <input class="form-input f-1" id="contact-date2" type="text" data-time-picker="date" name="date">
                <label class="form-label" for="contact-date">Дата съемки<span style="color:green; font-size:80%;"> (чтобы узнать свободна ли дата):</span></label>
              </div>
              <div class="form-wrap">
                <input class="form-input phone f-1" id="contact-phone2" type="text" name="phone">
                <label class="form-label" for="contact-phone">Телефон<span style="color:green; font-size:80%;"> (чтобы забрать Книгу №1, если у вас свадьба):</span></label>
              </div>
               <br>
                <span id="text-success2"></span>
              <div class="form-wrap form-button offset-1">
                <button class="button button-icon button-icon-left button-primary button-ujarak" type="submit"><span class="icon mdi mdi-gift"></span>Отправить запрос + получить подарки</button>
              </div>
            </form>
          </div>
      </div></div>
	  <div>
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="cell-sm-6 cell-md-7">
              <div class="box-width-3 box-centered">
                <div class="group-3-columns" data-lightgallery="group">
                  <div class="column-item"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjZDM0U1MkFGQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjZDM0U1MkFFQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RUU3REFBNjNBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RUU3REFBNjRBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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" alt="" width="120" height="120">
                      <div class="thumb-light__overlay"></div>Книга по позированию</div>
                  <div class="column-item"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjZDM0U1MkFGQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjZDM0U1MkFFQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RUU3REFBNjNBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RUU3REFBNjRBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAB4AHgDAREAAhEBAxEB/8QAmwABAAIDAAMAAAAAAAAAAAAAAAUGAwQHAQIIAQEAAwEBAQAAAAAAAAAAAAAAAgQFAwEGEAACAQMDAgMGAwcCBwAAAAABAgMAEQQhEgUxBkEiE1FhkTIUB3GBI6HRQlJighWxwuFykkNTkyQRAAIBAgQFAgMIAwAAAAAAAAABAhEDITESBEFxIjIFgaHwUdGRsUJyEyMzFGHBBv/aAAwDAQACEQMRAD8A+mKAUAoBQCgFAKAUAoBQCgFAKAUAoBQCgFAKAUAoBQCgFAKAUAoBQCgFAKAUAoBQCgPUyRhwhYB2BKqSLkDqQPzrxySFD0fLxkF3lUfiRVee8sxzkvtOitSfAygggEag9DVlM5igPFwSRfUdRSoPNAKAUAoBQCgFAKAUAoCi/cLH5DFz8LmsSwWNDA7kXEbbroW/pbcVNfKf9JYmnC9HKOHxzNfxlyLjK2+OJVcTv3nWd458GBZYrq4jJ3bl6+U1gXNyo5Gj/VXzL12J3HPysOTDkAB4SrwW8YnFrW/pZT8a+o/57fO7blB5wfs/oZHkdvokpLj95K9wZ8sGKYcdimRKLbx1Rfb+Psq35beu1HRB/uS9l8ZHDa2dTq+1FWx+4uU4/SZBkRR3JYttZQNTqetfOWN/ctOvyNK5YjIsva/N5fNYcnIPjfTYMjAYG8/qSRgaysOgVm+T3a+NfXbK/O7DVJaamXubUbctKdSZq4VxQCgFAKAUAoAelAR3J5Ub8YCjlUygFDjQhGF3I9h2A299Z293kY7fXF9yw9TvZttzo+Bzbu7ujlHfKx+MzmhhMRi9MqksZ0sVKyKwr41eWuqenVW3lR4r3Nu3s4Uq11fM5me5HObjnOQYucLQ5GUDshcDSOR+uxh0LdDUp7aM4dJcjKmZ077fc/AOTXLcFcR8Z45J9Am/chWx6HdtPSp+Dl/VvSc8I6af7KfkbanBJPGpn5vvzif8s3HLmRPybayruAWIf1MSFFvAXvXHd3r11u4lWvHh6chZsJJLgiMlh5DnJDj4ky/QIbz5RW6zMP8AtxqbXjH8THr+FVrTks2pS9l9Tu6RxJPgO4Oew+8MdOVzZcjHzP8A4siJz+kkrG+PJEiAKu5v0zYeOtfSeK8pcnd03HXV7GbutrFW6xVKHUa+pMgUAoBQCgFAReZ3T27hcg/H5nIwY2ZHEs7xSuEtFIxRWJay2LKR1rnK7GLo2TVuTVUjexc3Dy4hLizx5ETarJE6up/AqTU1JPIi00VXvPEmxsKaaTPXA4q5MuUdl4N5u/lcruVj/K27XQV855Hx1yTon+03WnGLefNcsTS2l+K4Vn9/0ON8pl4UULScRy0XLQMCVmS0Sk3/AJX85rAnsVGdHlya+82oXarKjKNyuRyWXKYo4J2c9VRQ3X2aMf2VobezCPFHO5Nsl+H5j7oJgtxPHds5T4DxenjyZICvGdrKbaarrcePhXadizXU54/JKtStqk32/ayf7a7c53H4HD4nkOL+g9ElsjNiwo8iaZz8zvLK7OrH+mwqnur2uTca0fD4odLa05vE6F29sxokXDw+Qnj+V8iUL6ZI62VSxT8DVCNtxeEWe3HXNxNjM7a5DmeVRcuGbjcWRQPXiX1WazXDBxpGykX1GlXtptdV1OVYrkcZX4xi6Uky8cl3X2vxgvyHL4eL1sJciJSbdbAtc19t+tD5mGrcnwM/Cc5xXOcZFyfFZAysGcsIp1DKG2MUbRgp0ZSOlSjJSVURlFp0ZvVI8FAKAUBxr7wll7twzDHvY4aS5G2SzfoSSvD5D1Ba4J/LxrL33f6F7bdvqU7Df66RcvOXdKsgleSFEh3x6Nsm2KQoA1BUFrVQaRZqyVxe5MKfjY8PuFf8mrM2Rj+q8sipG5tGvnI1Cre9vGsrfXJOfHBfMtWINKqwPTCn7Yxc6bkOG4HGnyCoRIJofVYkG7PF5x16Npf2Gu+0hW3i39pG/KVaVLfx3e3CHL+myOEhilhERkOPIoVRLbXe36flN7jdewNWP0LXGPv9Su3PhIkeW+63aXCiGNMHLysrJ3/TY6iNQ4jbaSZJGVVuegPWrNr9GKqkzk4XJcUU7l/vvyVpTx3b2JjsLCGTLyDPdr2N1jCD4NUJaJPCJNWZLNlXyfvV9xMcDKkOHj7XssGPBsRtQbtcsW08p1rjOCqtHTyOkbSxriWLjvuZxvffH5XE8or4k80ZXJwhIdrxn+OCQWa69bHUfhVHcK7blrTqvjNHaEI5I5blcSvHZ0/HsirJBMV3KANxv5XB1+ZbGtO3cU4qXzINUwPpn7NKV+23D3G1iMhiL31bJlNbm1/jRlbn+Rl0qwcBQCgFAct+7nH4MXMcdyMqSSy5cLYrfqEJEsMySJIiBSN+6Q3udelZnkHpo0Xdpimiq4vKcUTvJfDjhkdsiEQAoxDBnJ2MSASP4QNay3IuaStdx/SzciZ8R/Ux5kV43F9dxJPUA9fbWZun1su2O0sPYnCjL4+aV7MceU2jRd0gJUHc2l9v935VZ2suk47lYom/8VPjTZKjIcvtSRCw3xIdm0MBa2l7ai4vXepwK39xMP13wYgg8sc+6VgCAxkOhIIuSwJ99IujJxKW/wBMjgGMltVkcAbLC17D3n41LEEZzKTvjxMUYRbjsJBANx8KZEkYe3+O9fLYtOuKqJv9d91wQf4QgLXrzVwPKFhzIMPIc5MmZLkybVQyxwbA2zygsZDoR+F/GvbcVBUQbqz6Y7H4WLhe0uM46IuVihDt6riRg8xMrjcoUEB3IGnSvpLMdMEjFuSrJsna6EBQCgFAUb7oYQyY+OuoYoZrXF9SEI/aOlZXlMo+pd2ebOZ5nFEwO5WyoF9TcWBBPyDQ62OtqyHIvoh8rF3SgAFQiBRoFuATYgCs3dy6y3Z7TxxyZOHyszRPskVIQg3lCzMCVFx4e2p7Z19yd7s9Sz4PcPc8KKv1ZyUV/UvOqyW2i6x7mHt9/wCFXdRRcUYubn+vTEkycZCsxf1I0uqX3dAl7KCdTavU68z2KoQqbw+yBFxdpszxRR/IOgDNub8gakSoVXuWLNm5PH+oeRt8MjIrsT5VYAGxJtekpURKKPXgcES5siG4KBXBAubhtLWt41CEjyROthL6UzIrmEQtE6sN2/e17i9tCw/EV0bIo+mOFi9HhsCLUenjxLr18qAV9Pb7VyMOebN2pkRQCgFAVvvbHSbFxbmzLIdp18V16VmeU7VzLmzfUyojCgLJGy6KDYeAJ6m2tYjL6ZX+Y4crlkhbAADTx99Zu6XWWrUsCN4bBtzeZG92PpwgX1AuD5tNantsid59KLWOJJXaoBbba5AOvvFWUVKmrzXFhfp0MYYBGG467NfmX310jVBOpp4nDRRwyTzAhLHXS6qPEX9tenrZTe4MKVuYxGewiaCYxoOoAZf31C4+n1OsCV7L4XFkzMj1V8wi629rWqFp1ZG5giy5nDRrDIkXkjCERiwBLdBrrYV1ZzTOxYqenjQp/Iir8Bavro5Iw3mZakeCgFAKAie449+LEPZJ4f8AKazfJdkfzFna9z5FXmxxJIGtqtxfpe3urFkjQTIrl4m+pJOgMa2HxrN3ff6He1kavbmEp5Dk5SBuH06D3DYxqe1XSyV6WC9SyJAgPjp4VbSKzZpcpjiQxg3C2PTqNb6VKh7Fmq6RsqxyGyjVkBN7j/QV4SKj3jiq/OcWIwFti5Dmw6fqIK43n0nW1xJXs3GSObIcjUxjX+6o7bufI8v5ItJxlMLk/MQQfbqPCrbRwTL+osoHsFfVoxjzXoFAKAUBHc2L48fuk/2tWd5LsX5ixtu70IJ4Vtp09vvrFZfRBc1cZiA/+Mf6mszdvr9CzayHb9g/IsPF4B8IzXTbPpZ5d4EsvWrSZxaMGYbsljawNj+dTWR4aUmKrXYkbvE+2vKEqlX7tjSPlONdfGDIQt7t8ZrhfWCO1rib/aZ/XymXUCNFC/3Go7bNi9kizqWVSZPMLWI/Lwq22V0XuvrDHFAKAUAoDU5LGmyMcLCV3q24BiQDoRa4B9tVd3YdyNE8TrZmourK7lx8jiqTLissY13p51/Pb+6sG9tb0M44f4xNGF23LiVPn8+M5ULBgQ6WBBB1U/8AGsTdS6kXrUMDJ2/lIRmG/wAzxn4IRXbaz6WRuxxRMpNfp41ajI4NGtyE6qyG/gwvU6hI0v8AIRi1z8ai5EtJVO9eVhLYLqw3p6qke47f3VyuPUdbaoafa/eeHhyZMbkvLKyRxxJ5pGYXOirdv2VOxbl+FVqeXEnmdE4J+7OSdHHCHFxGsTNnSegSPdEA8nxArUtePuvuokUbt63HJ1Oi19AZgoBQCgFAKAUBG8t25wfLKF5DDjnKm6vqrg+50KsPjXG7trdzvimdIXpw7XQhIft3gYkkj4GXKiS6mGe0qgjpZvK/xY1lz8Hax0Nx90W4+Qn+JVMM3bfMw6qizAeMTf7X21Rn4m/HtpI7x3luWeBW+44+QjfHhGLOzup/TjhldiwN9AimuH9a7lpdeR2jchnVGHG7K705BrjGjwIjb9XMkBYg+yKLef8AqK1dt+JuS7monOe9txyxJXH+yXDZEsc3P5+RyRjBAxov/kxyD/MIyZT/AOytKz421DPq5lO5vZyywLnwfanbfAxelw/G4+CpFmaGNVdgP5n+ZvzNXlFLIqOTeZK1I8FAKAUAoBQCgFAKAUAoBQCgFAKAUAoBQCgP/9k" alt="" width="120" height="120">
                      <div class="thumb-light__overlay"></div>Конспекты по имиджу</div>
                  <div class="column-item"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjZDM0U1MkFGQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjZDM0U1MkFFQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RUU3REFBNjNBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RUU3REFBNjRBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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" alt="" width="120" height="120">
                      <div class="thumb-light__overlay"></div>Книга №1 по свадьбе</div>
                </div>
              </div>
            </div>
                </div>
        </div>
    </div>
      <br>
              <a href="#portfolio-1"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-up"></span>Вернуться к портфолио</div></a>
    </div>
  </div>
</div>
</section>-->
<!--Отправить заявку + получить подарок-->