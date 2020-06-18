<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>

<!--1 6 квадратов + кнопки Узнать стоимость + Получить подарки (показать подарки)
переход по квадрату идет к слайдерам на каждый вид съемки
2 сверху Описание + Подробное этой съемки
 + по центру мини-слайдер
 + снизу Пакеты услуг таблица + кнопка Стоимость Х вида съемки
2.1 свадебные
2.2 семейные
2.3 женские
2.4 мужские
2.5 детские
2.6 путешествия
часто задаваемые вопросы
Подарки-квиз + кнопка Воцап-->


<!--Слайдер-->
<section class="section section-variant-1 bg-white text-center" style="padding:0 0 15px 0;">
        <div class="shell">
          <div class="range range-30 range-md-center">
           <h1><?= К_ЗАГОЛОВОК2_ГЛАВНОЙ_СТРАНИЦЫ ?></h1>
            <div class="cell-md-11 cell-lg-10">            
              <!-- Single post-->			  
			  <div class="owl-carousel-wrap owl-carousel_style-1">
                    <div class="owl-carousel-wrap owl-carousel_style-1"> 					
				  <div class="owl-carousel" data-autoplay="false" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav" >
				  <!--У всех фото должна быть заранее одинаковая высота-->
					  <div><div><img class="owl-lazy" data-src="images/m-slider1.jpg" src="data:image/jpeg;base64,/9j/4QBCRXhpZgAASUkqAAgAAAABAJiCAgAeAAAAGgAAAAAAAABDb3B5cmlnaHQgwqkgU0lBUkhFSSBTQVJBQ0hVSwAAAP/hBr9odHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQ4IDc5LjE2NDAzNiwgMjAxOS8wOC8xMy0wMTowNjo1NyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wUmlnaHRzPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvcmlnaHRzLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczpJcHRjNHhtcENvcmU9Imh0dHA6Ly9pcHRjLm9yZy9zdGQvSXB0YzR4bXBDb3JlLzEuMC94bWxucy8iIHhtcFJpZ2h0czpNYXJrZWQ9IlRydWUiIHhtcFJpZ2h0czpXZWJTdGF0ZW1lbnQ9Imh0dHA6Ly92ay5jb20vc3NzYXJhY2h1ayIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSI4REJFNkY1NDZGNkMxMzg1OUY5NDVDOEU0Q0Y3QkI5NSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1NTkwNDIzMzk5OUIxMUVBOUEwQ0Q0NUIwRTAwMkMzQSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1NTkwNDIzMjk5OUIxMUVBOUEwQ0Q0NUIwRTAwMkMzQSIgeG1wOkNyZWF0b3JUb29sPSJDYXB0dXJlIE9uZSAyMCBXaW5kb3dzIiBwaG90b3Nob3A6QXV0aG9yc1Bvc2l0aW9uPSJwaG90b2dyYXBoZXIiPiA8eG1wUmlnaHRzOlVzYWdlVGVybXM+IDxyZGY6QWx0PiA8cmRmOmxpIHhtbDpsYW5nPSJ4LWRlZmF1bHQiPkFsbCByaWdodHMgcmVzZXJ2ZWQuIE5vIHJlcHJvZHVjdGlvbiBvZiBhbnkga2luZDwvcmRmOmxpPiA8L3JkZjpBbHQ+IDwveG1wUmlnaHRzOlVzYWdlVGVybXM+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmJjZGRkZWU2LWQ2NmQtMjQ0Zi04ZmVhLTI2Zjg0NTU2YTBlNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpiY2RkZGVlNi1kNjZkLTI0NGYtOGZlYS0yNmY4NDU1NmEwZTciLz4gPGRjOnJpZ2h0cz4gPHJkZjpBbHQ+IDxyZGY6bGkgeG1sOmxhbmc9IngtZGVmYXVsdCI+Q29weXJpZ2h0IMKpIFNJQVJIRUkgU0FSQUNIVUs8L3JkZjpsaT4gPC9yZGY6QWx0PiA8L2RjOnJpZ2h0cz4gPGRjOmNyZWF0b3I+IDxyZGY6U2VxPiA8cmRmOmxpPlNpYXJoZWkgU2FyYWNodWs8L3JkZjpsaT4gPC9yZGY6U2VxPiA8L2RjOmNyZWF0b3I+IDxJcHRjNHhtcENvcmU6Q3JlYXRvckNvbnRhY3RJbmZvIElwdGM0eG1wQ29yZTpDaVRlbFdvcms9IiszNzUtMzMtMzk1OTY2NjsgKzM3NS0yNS02NjYzOTU5IiBJcHRjNHhtcENvcmU6Q2lVcmxXb3JrPSJodHRwOi8vc3NzYXJhY2h1ay5jb20iIElwdGM0eG1wQ29yZTpDaUFkckN0cnk9IkJlbGFydXMiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/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" alt="" width="968" height="537"></div></div>					  
					  <div><div><img class="owl-lazy" data-src="images/m-slider2.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/m-slider3.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/m-slider4.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/m-slider6.jpg" alt="" width="968" height="537"></div></div>
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
				</div></div>
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
                <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">
                  <div class="cell-sm-6 cell-md-7">                    
                     <!--<div class="box-width-1 box-centered layout-columns__main">
                        <p class="h3" style="margin:0;">Оставьте свои контакты, расскажу о всех предложениях и ценах</p>           
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
                        </form>
                        <p class="icon-gray-7">*предложения и свободные даты ограничены</p>
                     </div>-->                     
                    <div class="col-xs-12 col-sm-3">                      
                    </div> 
                   <div class="col-xs-12 col-sm-6">
                     <p class="h3" style="margin:0;">Оставьте свои контакты, расскажу о всех предложениях и ценах</p>
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
                        </form>
                        <p class="icon-gray-7">*предложения и свободные даты ограничены</p>
                    </div>    
                    <div class="col-xs-12 col-sm-3">                      
                    </div>                                                                           
                </div>                 
                </div>                 
        </div>
        <span id="portfolio-1"></span>
    </div>
</div>
</section>
<!--кнопка Узнать подробнее-->  
<!--Ключевые преимущества-->
<section class="section section-md bg-gray-lighter oh text-center" style="padding-top: 5px;">
<div class="shell">
    <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
        <div class="row">            
            <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">
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
<!--6 квадратов-->
<!--<section class="section section-md bg-white oh text-center">
<div class="shell">
    <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
        <div class="row">            
            <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                     <a href="#weddings" >                                              
                      <img class="lazy" data-src="up/i/album/Vitalij-Irina-Svadebnaya-fotosessiya-Mozyr/9.jpg" src="<?=$IMG->resize('up/i/album/Vitalij-Irina-Svadebnaya-fotosessiya-Mozyr/9.jpg', 60, 40, true);?>" alt="" width="600" height="400">                      
                      <noscript><img src="up/i/album/Vitalij-Irina-Svadebnaya-fotosessiya-Mozyr/9.jpg" data-src="" alt="" ></noscript>
                    </a>
                      <div class="row"><a href="#weddings"><div class="col-sm-12 heading-4" style="min-height: 60px;">Свадебное портфолио</div></a></div>                      
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                     <a href="#families" >                                              
                      <img class="lazy" data-src="up/i/album/2019-09-10-Tatyana-Lyubina/TL-332-Sarachuk.com.jpg" src="<?=$IMG->resize('up/i/album/2019-09-10-Tatyana-Lyubina/TL-332-Sarachuk.com.jpg', 60, 40, true);?>" alt="" width="600" height="400">                      
                      <noscript><img src="up/i/album/2019-09-10-Tatyana-Lyubina/TL-332-Sarachuk.com.jpg" data-src="" alt="" ></noscript>
                    </a>
                      <div class="row"><a href="#families"><div class="col-sm-12 heading-4" style="min-height: 60px;">Семейное портфолио</div></a></div>                      
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                     <a href="#girls" >                                              
                      <img class="lazy" data-src="up/i/album/2016-09-15-Alina-Sarachuk/Photo-747-Sarachuk.com.jpg" src="<?=$IMG->resize('up/i/album/2016-09-15-Alina-Sarachuk/Photo-747-Sarachuk.com.jpg', 60, 40, true);?>" alt="" width="600" height="400">                      
                      <noscript><img src="up/i/album/2016-09-15-Alina-Sarachuk/Photo-747-Sarachuk.com.jpg" data-src="" alt="" ></noscript>
                    </a>
                      <div class="row"><a href="#girls"><div class="col-sm-12 heading-4" style="min-height: 60px;">Женское портфолио</div></a></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                     <a href="#men" >                                              
                      <img class="lazy" data-src="up/i/album/2016-05-29-Sasha-Mozeiko/Photo-823-Sarachuk.com.jpg" src="<?=$IMG->resize('up/i/album/2016-05-29-Sasha-Mozeiko/Photo-823-Sarachuk.com.jpg', 60, 40, true);?>" alt="" width="600" height="400">                      
                      <noscript><img src="up/i/album/2016-05-29-Sasha-Mozeiko/Photo-823-Sarachuk.com.jpg" data-src="" alt="" ></noscript>
                    </a>
                      <div class="row"><a href="#men"><div class="col-sm-12 heading-4" style="min-height: 60px;">Мужское портфолио</div></a></div>                      
            </div>            
        </div>
    </div>
</div>
</section>-->
<!--6 квадратов-->
<!--Свадебные-->
<section id="weddings" class="section section-variant-1 bg-white text-center">
        <div class="shell">
          <div class="range range-30 range-md-center">
           <div class="cell-md-11 cell-lg-10">
                          <h2>Свадебные фотосессии</h2>                          
                    </div>
            <div class="cell-md-11 cell-lg-10">            
              <!-- Single post-->			  
			  <div class="owl-carousel-wrap owl-carousel_style-1">
                    <div class="owl-carousel-wrap owl-carousel_style-1"> 					
				  <div class="owl-carousel" data-autoplay="false" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav2" >				  
				  <!--У всех фото должна быть заранее одинаковая высота-->					  
					  <div><div><img class="owl-lazy" data-src="/up/i/album/Alexander-Alina-Svadba-Royal-Hall-Minsk/RH-82.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/Ivan-Valeriya-Svadba-Gomel/16.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/Olya-Fotosessiya-nevesty-Mozyr/12.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/Evgenij-Diana-Svadba-Minsk/59.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/Mihail-Olga-Svadba-Mozyr/6.jpg" alt="" width="968" height="537"></div></div>			  
					</div>
					<div class="owl-outer-navigation" id="owl-carousel-nav2">
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
				</div></div>
            </div>
            
            <div class="cell-md-11 cell-lg-10">
            <!--2 квадрата-->
            <section class="section section-md bg-white oh text-center" style="padding-top: 0px;">
            <div class="shell">
                <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
                    <div class="row">                           
                                <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">                                 
                                 <p>Фотосъемка прогулки — важная часть свадебного дня. Именно эти кадры надолго остаются в памяти и составляют основу свадебного фотоальбома. Однако стоит помнить и о ключевых событиях: сборы, официальная часть, банкет. Эти кадры чаще всего вспоминаются и пересматриваются.</p>
                                 <br>
                                </div>      
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[0]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/<?=$album->slug;?>">
                                  <img class="lazy" data-src="<?=$IMG->resize($images_url[0], 370, 250, true);?>" src="<?=$IMG->resize($images_url[0], 37, 25, true);?>" alt="<?=$album->h1;?>" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize($images_url[0], 370, 250, true);?>" data-src="" alt="<?=$album->h1;?>" ></noscript>
                              </a>
                              <div class="row"><a href="/album/<?=$album->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$album->h1;?></div></a></div>
                            </div>                            
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[1]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/<?=$album->slug;?>">
                                  <img class="lazy" data-src="<?=$IMG->resize($images_url[0], 370, 250, true);?>" src="<?=$IMG->resize($images_url[0], 37, 25, true);?>" alt="<?=$album->h1;?>" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize($images_url[0], 370, 250, true);?>" data-src="" alt="<?=$album->h1;?>" ></noscript>
                              </a>
                              <div class="row"><a href="/album/<?=$album->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$album->h1;?></div></a></div>
                            </div>
                    </div>
                </div>
            </div>
            </section>
            <!--2 квадрата-->
            </div>
            <div class="cell-xs-12 bg-white" style="margin-top:0;">                 
                  <a href="/category/wedding"><div class="button button-icon button-icon-right button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-right"></span>Больше свадебных альбомов</div></a>       
            </div>
            <!--стоимость-->
            <!--<div class="cell-xs-12 bg-gray-lighter" style="padding: 15px;">
              <h3>СВАДЕБНЫЕ - Стоимость</h3>
              <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1" >
                
                <ul class="nav nav-tabs">
                  <li><a href="#tabs-1-1" data-toggle="tab">Лайт</a></li>
                  <li class="active"><a href="#tabs-1-2" data-toggle="tab">Стандарт</a></li>
                  <li><a href="#tabs-1-3" data-toggle="tab">Максимум</a></li>
                  <li><a href="#tabs-1-4" data-toggle="tab">Доп.опции</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade" id="tabs-1-1">
                    <p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly.  </p>
                    <p>Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade in active" id="tabs-1-2">
                    <p>The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click.  </p>
                    <p>We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us in the informal environments where we can have a dialogue instead of just a narrative like that.  With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. </p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-3">
                    <p>We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers.  </p>
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-4">
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly.  </p>
                    <p>You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!--стоимость-->
          </div>
        </div>
</section>
<!--Свадебные-->
<!--Семейные-->
<section id="families" class="section section-variant-1 bg-white text-center">
        <div class="shell">
          <div class="range range-30 range-md-center">
           <div class="cell-md-11 cell-lg-10">
                          <h2>Семейные фотосессии</h2>
                          <p>Творческие образы внесут разнообразия в личный альбом. Грамотный выбор места съемки — важный фактор, от которого зависит результат.</p>
                    </div>
            <div class="cell-md-11 cell-lg-10">            
              <!-- Single post-->			  
			  <div class="owl-carousel-wrap owl-carousel_style-1">
                    <div class="owl-carousel-wrap owl-carousel_style-1"> 					
				  <div class="owl-carousel" data-autoplay="false" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav3" >				  
				  <!--У всех фото должна быть заранее одинаковая высота-->					  
					  <div><div><img class="owl-lazy" data-src="up/i/album/2018-05-04-Татьяна-Ковалькова/TK-454-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/2019-09-10-Tatyana-Lyubina/TL-327-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/2019-08-18-Анастасия-Назаренко/AN-345-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/2019-10-19-Alexandra-Kirinskaya/AK-4-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/2017-08-20-Lesnie-nimfi/LN-465-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>					  
					</div>
					<div class="owl-outer-navigation" id="owl-carousel-nav3">
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
				</div></div>
            </div>
            <div class="cell-md-11 cell-lg-10">
            <!--2 квадрата-->
            <section class="section section-md bg-white oh text-center" style="padding-top: 0px;">
            <div class="shell">
                <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
                    <div class="row">                           
                                <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">                                 
                                 <p>Чтобы у вас сразу сложилось впечатление о том, как я снимаю - вот наглядные примеры полных фотосерий</p>
                                 <br>
                                </div>      
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[0]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/semeinaya-fotosessiya-v-minske">
                                  <img class="lazy" data-src="<?=$IMG->resize('up/i/album/2018-05-04-Татьяна-Ковалькова/TK-442-Sarachuk.com.jpg', 370, 250, true);?>" src="<?=$IMG->resize('up/i/album/2018-05-04-Татьяна-Ковалькова/TK-442-Sarachuk.com.jpg', 37, 25, true);?>" alt="" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize('up/i/album/2018-05-04-Татьяна-Ковалькова/TK-442-Sarachuk.com.jpg', 370, 250, true);?>" data-src="" alt="" ></noscript>
                              </a>
                              <div class="row"><a href="/album/semeinaya-fotosessiya-v-minske"><div class="col-sm-12 heading-4" style="min-height: 60px;">Семейная фотосессия мама с дочкой</div></a></div>
                            </div>                            
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[1]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/tatyana-semeinaya-fotosessiya-v-mozyre">
                                  <img class="lazy" data-src="<?=$IMG->resize('up/i/album/2019-09-10-Tatyana-Lyubina/TL-332-Sarachuk.com.jpg', 370, 250, true);?>" src="<?=$IMG->resize('up/i/album/2019-09-10-Tatyana-Lyubina/TL-332-Sarachuk.com.jpg', 37, 25, true);?>" alt="" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize('up/i/album/2019-09-10-Tatyana-Lyubina/TL-332-Sarachuk.com.jpg', 370, 250, true);?>" data-src="" alt="" ></noscript>
                              </a>
                              <div class="row"><a href="/album/tatyana-semeinaya-fotosessiya-v-mozyre"><div class="col-sm-12 heading-4" style="min-height: 60px;">Семейная фотосессия</div></a></div>
                            </div>
                    </div>
                </div>
            </div>
            </section>
            <!--2 квадрата-->
            </div>
            <div class="cell-xs-12 bg-white" style="margin-top:0;">                 
                  <a href="/category/family-and-children"><div class="button button-icon button-icon-right button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-right"></span>Больше семейных альбомов</div></a>       
            </div>
            <!--стоимость-->
            <!--<div class="cell-xs-12 bg-gray-lighter" style="padding: 15px;">
              <h3>СЕМЕЙНЫЕ - Стоимость</h3>
              <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-2">
                
                <ul class="nav nav-tabs">
                  <li><a href="#tabs-2-1" data-toggle="tab">Лайт</a></li>
                  <li class="active"><a href="#tabs-2-2" data-toggle="tab">Стандарт</a></li>
                  <li><a href="#tabs-2-3" data-toggle="tab">Максимум</a></li>
                  <li><a href="#tabs-2-4" data-toggle="tab">Доп.опции</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade" id="tabs-2-1">
                    <p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly.  </p>
                    <p>Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade in active" id="tabs-2-2">
                    <p>The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click.  </p>
                    <p>We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us in the informal environments where we can have a dialogue instead of just a narrative like that.  With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. </p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-3">
                    <p>We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers.  </p>
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-4">
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly.  </p>
                    <p>You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!--стоимость-->
          </div>
        </div>
</section>
<!--Семейные-->
<!--Женские-->
<section id="girls" class="section section-variant-1 bg-white text-center">
        <div class="shell">
          <div class="range range-30 range-md-center">
           <div class="cell-md-11 cell-lg-10">
                          <h2>Женские фотосессии</h2>
                          <p>Хорошие качественные фотографии можно положить в личный альбом или оформить в красивую рамку. Портретная фотосъемка может проходить в студии, на улице или в удобном интерьере.</p>
                    </div>
            <div class="cell-md-11 cell-lg-10">            
              <!-- Single post-->			  
			  <div class="owl-carousel-wrap owl-carousel_style-1">
                    <div class="owl-carousel-wrap owl-carousel_style-1"> 					
				  <div class="owl-carousel" data-autoplay="false" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav4" >				  
				  <!--У всех фото должна быть заранее одинаковая высота-->					  
					  <div><div><img class="owl-lazy" data-src="images/g1.jpg" src="" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/2016-09-18-MK-Olega-Zotova/OZ-578-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/g2.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/g3.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="up/i/album/2016-09-15-Alina-Sarachuk/Photo-750-Sarachuk.com.jpg" alt="" width="968" height="537"></div></div>
					</div>
					<div class="owl-outer-navigation" id="owl-carousel-nav4">
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
				</div></div>
            </div>
            <div class="cell-md-11 cell-lg-10">
            <!--2 квадрата-->
            <section class="section section-md bg-white oh text-center" style="padding-top: 0px;">
            <div class="shell">
                <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
                    <div class="row">                           
                                <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">                                 
                                 <p>Чтобы у вас сразу сложилось впечатление о том, как я снимаю - вот наглядные примеры полных фотосерий</p>
                                 <br>
                                </div>      
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[0]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/kreativnaya-fotosessiya-mk-zotova-v-moskve">
                                  <img class="lazy" data-src="<?=$IMG->resize('up/i/album/2016-09-18-MK-Olega-Zotova/OZ-598-Sarachuk.com.jpg', 370, 250, true);?>" src="<?=$IMG->resize('up/i/album/2016-09-18-MK-Olega-Zotova/OZ-598-Sarachuk.com.jpg', 37, 25, true);?>" alt="" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize('up/i/album/2016-09-18-MK-Olega-Zotova/OZ-598-Sarachuk.com.jpg', 370, 250, true);?>" data-src="" alt="" ></noscript>
                              </a>
                              <div class="row"><a href="/album/kreativnaya-fotosessiya-mk-zotova-v-moskve"><div class="col-sm-12 heading-4" style="min-height: 60px;">Креативная фотосессия</div></a></div>
                            </div>                            
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[1]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/alina-fotosessiya-v-zabroshennom-dome">
                                  <img class="lazy" data-src="<?=$IMG->resize('up/i/album/2016-09-15-Alina-Sarachuk/Photo-746-Sarachuk.com.jpg', 370, 250, true);?>" src="<?=$IMG->resize('up/i/album/2016-09-15-Alina-Sarachuk/Photo-746-Sarachuk.com.jpg', 37, 25, true);?>" alt="" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize('up/i/album/2016-09-15-Alina-Sarachuk/Photo-746-Sarachuk.com.jpg', 370, 250, true);?>" data-src="" alt="" ></noscript>
                              </a>
                              <div class="row"><a href="/album/alina-fotosessiya-v-zabroshennom-dome"><div class="col-sm-12 heading-4" style="min-height: 60px;">Рокерская фотосессия</div></a></div>
                            </div>
                    </div>
                </div>
            </div>
            </section>
            <!--2 квадрата-->
            </div>
            <div class="cell-xs-12 cell-sm-5 bg-white" style="margin:0 15px 15px 15px;">                 
                  <a href="/category/girls-studio"><div class="button button-icon button-icon-right button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-right"></span>Больше женских (в студии)</div></a> 
            </div><br>
            <div class="cell-xs-12 cell-sm-5 bg-white" style="margin:0 5px 15px 15px;">                 
                  <a href="/category/girls"><div class="button button-icon button-icon-right button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-right"></span>Больше женских (на локации)</div></a>    
            </div>
            <!--стоимость-->
            <!--<div class="cell-xs-12 bg-gray-lighter" style="padding: 15px;">
              <h3>Женские - Стоимость</h3>
              <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-3">
                
                <ul class="nav nav-tabs">
                  <li><a href="#tabs-3-1" data-toggle="tab">Лайт</a></li>
                  <li class="active"><a href="#tabs-3-2" data-toggle="tab">Стандарт</a></li>
                  <li><a href="#tabs-3-3" data-toggle="tab">Максимум</a></li>
                  <li><a href="#tabs-3-4" data-toggle="tab">Доп.опции</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade" id="tabs-3-1">
                    <p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly.  </p>
                    <p>Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade in active" id="tabs-3-2">
                    <p>The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click.  </p>
                    <p>We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us in the informal environments where we can have a dialogue instead of just a narrative like that.  With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. </p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-3-3">
                    <p>We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers.  </p>
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-3-4">
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly.  </p>
                    <p>You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!--стоимость-->
          </div>
        </div>
</section>
<!--Женские-->
<!--Мужские-->
<section id="men" class="section section-variant-1 bg-white text-center">
        <div class="shell">
          <div class="range range-30 range-md-center">
           <div class="cell-md-11 cell-lg-10">
                          <h2>Мужские фотосессии</h2>
                          <p>Фотографии, которые показывают индивидуальность. Их приятно оставить на память, а также использовать в работе и в повседневных целях</p>
                    </div>
            <div class="cell-md-11 cell-lg-10">            
              <!-- Single post-->			  
			  <div class="owl-carousel-wrap owl-carousel_style-1">
                    <div class="owl-carousel-wrap owl-carousel_style-1"> 					
				  <div class="owl-carousel" data-autoplay="false" data-autoplay-timeout="5000" data-speed="0" data-loop="true" data-stage-padding="0" data-margin="15" data-nav="false" data-mouse-drag="false" data-nav-custom="#owl-carousel-nav5" >				  
				  <!--У всех фото должна быть заранее одинаковая высота-->					  
					  <div><div><img class="owl-lazy" data-src="images/m1.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/m2.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/m3.jpg" alt="" width="968" height="537"></div></div>
					  <div><div><img class="owl-lazy" data-src="images/m4.jpg" alt="" width="968" height="537"></div></div>
					</div>
					<div class="owl-outer-navigation" id="owl-carousel-nav5">
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
				</div></div>
            </div>
            <div class="cell-md-11 cell-lg-10">
            <!--2 квадрата-->
            <section class="section section-md bg-white oh text-center" style="padding-top: 0px;">
            <div class="shell">
                <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
                    <div class="row">                           
                                <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">                                 
                                 <p>Чтобы у вас сразу сложилось впечатление о том, как я снимаю - вот наглядные примеры полных фотосерий</p>
                                 <br>
                                </div>      
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[0]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/sasha-fotosessiya-modelnaya-sportivnaya-v-mozyre">
                                  <img class="lazy" data-src="<?=$IMG->resize('up/i/album/2016-05-29-Sasha-Mozeiko/Photo-823-Sarachuk.com.jpg', 370, 250, true);?>" src="<?=$IMG->resize('up/i/album/2016-05-29-Sasha-Mozeiko/Photo-823-Sarachuk.com.jpg', 37, 25, true);?>" alt="" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize('up/i/album/2016-05-29-Sasha-Mozeiko/Photo-823-Sarachuk.com.jpg', 370, 250, true);?>" data-src="" alt="" ></noscript>
                              </a>
                              <div class="row"><a href="/album/sasha-fotosessiya-modelnaya-sportivnaya-v-mozyre"><div class="col-sm-12 heading-4" style="min-height: 60px;">Фотосессия баскетболиста</div></a></div>
                            </div>                            
                             <div class="col-xs-12 col-sm-6 col-md-6 isotope-item">
                             <?php $album = $albums[1]; ?>
                             <?php $images_url = $album->showImagesUrl(); ?>
                              <a href="/album/vladislav-modelnaya-mujskaya-fotosessiya-v-mozyre">
                                  <img class="lazy" data-src="<?=$IMG->resize('up/i/album/2018-06-03-Vladislav-Almazov/Photo-801-Sarachuk.com.jpg', 370, 250, true);?>" src="<?=$IMG->resize('up/i/album/2018-06-03-Vladislav-Almazov/Photo-801-Sarachuk.com.jpg', 37, 25, true);?>" alt="" width="370" height="250">
                                  <noscript><img src="<?=$IMG->resize('up/i/album/2018-06-03-Vladislav-Almazov/Photo-801-Sarachuk.com.jpg', 370, 250, true);?>" data-src="" alt="" ></noscript>
                              </a>
                              <div class="row"><a href="/album/vladislav-modelnaya-mujskaya-fotosessiya-v-mozyre"><div class="col-sm-12 heading-4" style="min-height: 60px;">Студийная мужская</div></a></div>
                            </div>
                    </div>
                </div>
            </div>
            </section>
            <!--2 квадрата-->            
            </div>
            <div class="cell-xs-12 bg-white" style="margin-top:0;">                 
                  <a href="/category/men"><div class="button button-icon button-icon-right button-default-outline button-ujarak"><span class="icon mdi mdi-arrow-right"></span>Больше мужских фотосессий</div></a> 
            </div><span></span>
            <!--стоимость-->
            <!--<div class="cell-xs-12 bg-gray-lighter" style="padding: 15px;">
              <h3>МУЖСКИЕ - Стоимость</h3>
              <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-4">
                
                <ul class="nav nav-tabs">
                  <li><a href="#tabs-4-1" data-toggle="tab">Лайт</a></li>
                  <li class="active"><a href="#tabs-4-2" data-toggle="tab">Стандарт</a></li>
                  <li><a href="#tabs-4-3" data-toggle="tab">Максимум</a></li>
                  <li><a href="#tabs-4-4" data-toggle="tab">Доп.опции</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane fade" id="tabs-4-1">
                    <p>Welcome to our wonderful world. We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly.  </p>
                    <p>Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade in active" id="tabs-4-2">
                    <p>The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click.  </p>
                    <p>We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us in the informal environments where we can have a dialogue instead of just a narrative like that.  With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. </p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-3">
                    <p>We sincerely hope that each and every user entering our website will find exactly what he/she is looking for. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers.  </p>
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. Our blog and social media accounts are available to encourage communication and connection between clients and personnel and tell you more about us.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-4-4">
                    <p>Our site design and navigation has been thoroughly thought out. The layout is aesthetically appealing, contains concise texts in order not to take your precious time. Text styling allows scanning the pages quickly. Site navigation is extremely intuitive and user-friendly.  </p>
                    <p>You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site. With advanced features of activating account and new login widgets, you will definitely have a great experience of using our web page. It will tell you lots of interesting things about our company, its products and services, highly professional staff and happy customers. You will always know where you are now and will be able to skip from one page to another with a single mouse click. We use only trusted, verified content, so you can believe every word we are saying. We are always happy to greet the new visitors on our site.</p>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">                           
                        <a href="#send-form"><div class="button button-icon button-icon-left button-default-outline button-ujarak"><span class="icon mdi mdi-gift"></span>Получить подарки</div></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!--стоимость-->
          </div>
        </div>
</section>
<!--Мужские-->
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
                <div class="col-xs-12 col-sm-12 col-md-12 isotope-item">
                  <div class="cell-sm-6 cell-md-7">
              <div class="box-width-3 box-centered">
                <div class="group-3-columns" data-lightgallery="group">
                  <div class="column-item"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjZDM0U1MkFGQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjZDM0U1MkFFQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RUU3REFBNjNBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RUU3REFBNjRBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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" alt="" width="120" height="120">
                      <div class="thumb-light__overlay"></div>Книга по позированию</div>
                  <div class="column-item"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0OCA3OS4xNjQwMzYsIDIwMTkvMDgvMTMtMDE6MDY6NTcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjZDM0U1MkFGQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjZDM0U1MkFFQTBGOTExRUFBQUNBQTg3NkNBOEE5ODNBIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RUU3REFBNjNBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RUU3REFBNjRBMEY4MTFFQUFFMkI4NkE2NkNFRTU2RDAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYG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" alt="" width="120" height="120">
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