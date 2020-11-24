<div class="quiz-multi-select fluid-container">
    <div class="alert alert-danger" role="alert">
        <span class="mdi mdi-checkbox-marked-circle"></span>
        Выберите один или несколько
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 quiz-multi-select__section">
            <?php foreach($options as $option): ?>
                <label class="quiz-multi-select__item">
                    <input type="checkbox"
                           value="<?=$option->value?>"
                            <?=$this->optionIsSelected($option) ? 'checked' : ''?>
                    />
                    <?=$option->text?>
                </label>
            <?php endforeach; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 quiz-multi-select__section">
            <img src="<?=Yii::app()->params['albumImagesWebDir']."1.jpg"?>"/>
        </div>
    </div>
</div>