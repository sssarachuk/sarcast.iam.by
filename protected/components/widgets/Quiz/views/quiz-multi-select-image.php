<div class="quiz-multi-select-image fluid-container">
    <div class="alert alert-danger" role="alert">
        <span class="mdi mdi-checkbox-marked-circle"></span>
        Выберите один или несколько
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 quiz-multi-select-image__section">
            <?php foreach($options as $option): ?>
                <label class="quiz-multi-select-image__item<?=$this->optionIsSelected($option) ? ' quiz-multi-select-image__item--selected' : ''?>">
                    <input type="checkbox" name="quiz-multi-select-image"
                           value="<?=$option->value?>"
                        <?=$this->optionIsSelected($option) ? 'checked' : ''?>
                    />
                    <div class="quiz-multi-select-image__item-box">
                        <img src="<?=$option->imgUrl?>"/>
                        <p><?=$option->text?></p>
                    </div>
                </label>
            <?php endforeach; ?>
        </div>
    </div>
</div>