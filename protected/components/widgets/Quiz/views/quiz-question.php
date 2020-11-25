<section class="quiz-body container">
    <div class="row row-flex">
        <section class="col-xs-12 col-sm-8 col-md-8">
            <header class="quiz-body__header">
                <span class="mdi mdi-clipboard-text"></span>
                <?=$quizTitle;?>
            </header>
            <div class="quiz-body__question">
                <h3><?=$model->text;?></h3>
                <?php if ($model->type == QuizQuestionType::SingleSelect): ?>
                    <?php $this->widget('QuizSingleSelectWidget', array(
                            'options'=>$model->options,
                            'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::SingleSelectImage): ?>
                    <?php $this->widget('QuizSingleSelectImageWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::SingleSelectDropDown): ?>
                    <?php $this->widget('QuizSingleSelectDropDownWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::MultiSelect): ?>
                    <?php $this->widget('QuizMultiSelectWidget', array(
                            'options'=>$model->options,
                            'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::MultiSelectImage): ?>
                    <?php $this->widget('QuizMultiSelectImageWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::MultiSelectDropDown): ?>
                    <?php $this->widget('QuizMultiSelectDropDownWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::RangeSelector): ?>
                    <?php $this->widget('QuizRangeSelectorWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::Datepicker): ?>
                    <?php $this->widget('QuizDatepickerWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?elseif ($model->type == QuizQuestionType::TextField): ?>
                    <?php $this->widget('QuizTextFieldWidget', array(
                        'options'=>$model->options,
                        'selectedOptions'=>$model->selectedOptions
                    )); ?>
                <?else:?>
                    <?=$model->type?> Данный тип вопроса не существует в системе (обратитесь к администратору)
                <?endif;?>
            </div>
            <footer class="quiz-body__footer">
                <button onClick='location.href="?index=<?=$previousIndex;?>"'
                        class="button button-primary button-ujarak <?=$previousButtonDisabled ? 'button-grey' : 'button-pink';?>"
                    <?=$previousButtonDisabled ? 'disabled' : '';?>>
                    <span class="icon mdi mdi-arrow-left"></span>
                    Предыдущий
                </button>
                <button onClick='location.href="?index=<?=$nextIndex;?>"'
                        class="button button-primary button-ujarak <?=$nextButtonDisabled ? 'button-grey' : 'button-pink';?> button-inline"
                    <?=$nextButtonDisabled ? 'disabled' : '';?>>
                    Следующий
                    <span class="icon mdi mdi-arrow-right"></span>
                </button>
            </footer>
        </section>
        <aside class="col-xs-12 col-sm-4 col-md-4 quiz-body__aside">
            <div class="quiz-body__aside__bonus-group">
                <div class="quiz-body__aside__bonus-item discount">
                    <span class="discount__title">Ваша скидка: </span>
                    <span class="discount__value">0%</span>
                </div>
                <div class="quiz-body__aside__bonus-item">
                    Каталог поз для фотосессии
                    <span class="mdi mdi-lock-outline"></span>
                </div>
                <div class="quiz-body__aside__bonus-item">
                    Методички по подбору образа
                    <span class="mdi mdi-lock-outline"></span>
                </div>
            </div>
        </aside>
    </div>
</section>