<div class="quiz-single-select fluid-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 quiz-single-select__section">
            <?php foreach($options as $option): ?>
                <label class="quiz-single-select__item">
                    <input type="radio" name="quiz-single-select"
                           value="<?=$option->value?>"
                           <?=$this->optionIsSelected($option) ? 'checked' : ''?>
                    />
                    <?=$option->text?>
                </label>
            <?php endforeach; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 quiz-single-select__section">
             <img src="<?=Yii::app()->params['albumImagesWebDir']."4.jpg"?>"/>
        </div>
    </div>
</div>