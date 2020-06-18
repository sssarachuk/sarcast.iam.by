<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();
?>

    <section class="breadcrumbs-custom bg-image" style="background-image: url(/images/breadcrumbs-image.jpg);">
        <div class="shell">
          <h1 class="breadcrumbs-custom__title"><?=$category->h1;?></h1>
            <ul class="breadcrumbs-custom__path">
            <li><a href="/">Главная</a></li>
            <li class="active"><?=$category->h1;?></li>
          </ul>
        </div>
      </section>

<section class="section section-md bg-white oh text-center">
        <div class="shell">        
        <div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
            <div class="row">
                <?php foreach($albums as $album): ?>
              <?php $images_url = $album->showImagesUrl(); ?>
              <?php if ($album->invisibility != 1) { ?>
              <div class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                  <a href="/album/<?=$album->slug;?>" >
                      <img class="lazy" data-src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" src="<?=$IMG->resize($images_url[0], 37, 37, true);?>" alt="<?=$album->title;?>" width="370" height="370">
                      <noscript><img src="<?=$IMG->resize($images_url[0], 370, 370, true);?>" data-src="" alt="<?=$album->title;?>" ></noscript>
                      </a>
                  <div class="row"><a href="/album/<?=$album->slug;?>"><div class="col-sm-12 heading-4" style="min-height: 60px;"><?=$album->h1;?></div></a></div>
                </div>
                <? } ?>
                <?php endforeach; ?>
            </div>
          </div>
          <div class="range range-30 range-md-center">
            <div class="cell-md-11 cell-lg-10">
                <p><?=$category->text1;?></p>
            </div>
            <!--стоимость-->
            <!--<div class="cell-xs-12 bg-gray-lighter" style="padding: 15px;">
              <h3><?=$category->title;?> - Стоимость</h3>
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


            