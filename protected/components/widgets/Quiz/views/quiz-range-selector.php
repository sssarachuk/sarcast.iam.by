<div class="quiz-range-selector fluid-container">
    <div class="alert alert-danger" role="alert">
        <span class="mdi mdi-checkbox-marked-circle"></span>
        Используйте ползунки для выбора диапазона значений
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 quiz-range-selector__section">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                    От <input type="text" id="quiz-range-selector-from"
                              maxlength="4"
                              pattern="\d*"
                              value="<?=$selectedOptions[0]->value?>">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    До <input type="text" id="quiz-range-selector-to"
                              maxlength="4"
                              pattern="\d*"
                              value="<?=$selectedOptions[1]->value?>">
                </div>
            </div>
            <div class="quiz-range-selector__slider-container">
                    <div id="quiz-range-selector-slider"
                         data-min="<?=$options[0]->value?>"
                         data-max="<?=$options[1]->value?>">

                    </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                   <label><?=$options[0]->value?></label>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <label><?=$options[1]->value?></label>
                </div>
            </div>
        </div>
    </div>
</div>