<div class="quiz-single-select-image fluid-container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 quiz-single-select-image__section">
            <?php foreach($options as $option): ?>
                <label class="quiz-single-select-image__item<?=$this->optionIsSelected($option) ? ' quiz-single-select-image__item--selected' : ''?>">
                    <input type="radio" name="quiz-single-select-image"
                           value="<?=$option->value?>"
                           <?=$this->optionIsSelected($option) ? 'checked' : ''?>
                    />
                    <div class="quiz-single-select-image__item-box">
                        <img src="<?=$option->imgUrl?>"/>
                        <p><?=$option->text?></p>
                    </div>
                </label>
            <?php endforeach; ?>
        </div>
    </div>
</div>