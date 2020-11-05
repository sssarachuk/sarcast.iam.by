<div class="quiz-title container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <img src="<?=$model->previewImg;?>"></img>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="quiz-title__divider"></div>
            <h3><?=$model->title;?></h3>
            <div><?=$model->description;?></div>
            <button onClick='location.href="?index=0"' class="button button-primary button-ujarak button-pink">
                <span class="icon mdi mdi-checkbox-marked-circle-outline"></span>
                <?=$model->startButtonTitle;?>
            </button>
            <div class="quiz-title__bonus-group">
                <h6>Бонусы после прохождения теста</h6>
                <div class="quiz-title__bonus-item">
                    Каталог поз для фотосессии
                    <span class="mdi mdi-lock-outline"></span>
                </div>
                <div class="quiz-title__bonus-item">
                    Методички по подбору образа
                    <span class="mdi mdi-lock-outline"></span>
                </div>
            </div>
        </div>
    </div>
</div>