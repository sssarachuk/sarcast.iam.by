<section class="section section-variant-1 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <img src="<?=$model->previewImg;?>"></img>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <h3><?=$model->title;?></h3>
                <div><?=$model->description;?></div>
                <button onClick='location.href="?index=1"' class="button button-primary button-ujarak button-pink">
                    <span class="icon mdi mdi-checkbox-marked-circle-outline"></span>
                    <?=$model->startButtonTitle;?>
                </button>
            </div>
        </div>
    </div>
</section>