<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>

    <section class="breadcrumbs-custom bg-image" style="background-image: url(/images/breadcrumbs-image2.jpg);">
        <div class="shell">
          <h1 class="breadcrumbs-custom__title">Обо мне</h1>
          <ul class="breadcrumbs-custom__path">
            <li><a href="/">Главная</a></li>
            <li class="active">Обо мне</li>
          </ul>
        </div>
      </section>

      <!-- Get in Touch-->
      <section class="section section-md bg-white text-center">
        <div class="shell">
          <div class="range range-md-center">
            <div class="cell-md-11 cell-lg-10">

                <div class="col-xs-12 col-sm-12">
                  <p>
                    <img class="lazy nosave" data-src="/images/about-me-picture.jpg" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?=К_ЗАГОЛОВОК2_ГЛАВНОЙ_СТРАНИЦЫ;?> фото">
                    <noscript><img class="nosave" src="/images/about-me-picture.jpg" data-src="" alt="<?=К_ЗАГОЛОВОК2_ГЛАВНОЙ_СТРАНИЦЫ;?> фото" ></noscript>

                    <?=$page->text;?>
                  </p>
                </div>

                <div class="col-xs-12 col-sm-11"><br><h2>Когда у вас свадьба / съемка?</h2></div>
                <div class="col-xs-12 col-sm-3"></div>
                <div class="col-xs-12 col-sm-6">
                    <form class="callback" id="callback" method="post" action="">
                      <div class="form-wrap">
                        <input class="form-input required f-1" id="contact-date" type="text" data-time-picker="date" name="date">
                        <label class="form-label icon-gray-7" for="contact-date">Дата мероприятия *</label>
                      </div>
                      <div class="form-wrap">
                        <input class="form-input required f-1" id="contact-name" type="text" name="name">
                        <label class="form-label icon-gray-7" for="contact-name">Ваше имя / имена *</label>
                      </div>
                      <div class="form-wrap">
                        <input class="form-input required f-1" id="contact-email" type="email" name="email">
                        <label class="form-label icon-gray-7" for="contact-email">Ваш e-mail *</label>
                      </div>
                      <div class="form-wrap">
                        <input class="form-input phone f-1" id="contact-phone" type="text" name="phone">
                        <label class="form-label icon-gray-7" for="contact-phone">Ваш Whatsapp / телефон</label>
                      </div>
                      <div class="form-wrap">
                        <label class="form-label icon-gray-7" for="contact-message">Дайте знать больше о вашей фотосессии</label>
                        <textarea class="form-input f-1" id="contact-message" name="message"></textarea>
                      </div>
                        <span id="text-success"></span>
                      <div class="form-wrap form-button offset-1">
                        <span id="text-success"></span>
                        <br>
                        <button class="button button-primary button-ujarak button-pink" type="submit">Отправить заявку&nbsp;<span class="icon mdi mdi-keyboard-return"></span></button>
                      </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-3"></div>

            </div>
          </div>
        </div>
      </section>