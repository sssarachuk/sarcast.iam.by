<section class="quiz-body quiz-finalization container">
    <div class="row row-flex">
        <section class="col-xs-12 col-sm-8 col-md-8">
            <header class="quiz-body__header">
                <span class="mdi mdi-clipboard-text"></span>
                <?=$quizTitle;?>
            </header>
            <div class="quiz-body__question">
                <h3>Заполните форму и получите точечный расчет стоимости съемки</h3>
                <?php $this->widget('QuizFinalizationFormWidget') ?>
            </div>
            <footer class="quiz-body__footer">
                <button onClick='location.href="?index=<?=$previousIndex;?>"'
                        class="button button-primary button-ujarak <?=$previousButtonDisabled ? 'button-grey' : 'button-pink';?>"
                    <?=$previousButtonDisabled ? 'disabled' : '';?>>
                    <span class="icon mdi mdi-arrow-left"></span>
                    Предыдущий
                </button>
                <button id="btnGetResults" class="button button-primary button-ujarak button-pink button-inline">
                    <span class="icon mdi mdi-checkbox-marked-circle-outline"></span>
                    Получить результаты
                </button>
            </footer>
        </section>
        <aside class="col-xs-12 col-sm-4 col-md-4 quiz-body__aside">
            <div class="bonus-group">
                <div class="bonus-item discount">
                    <span class="discount__title">Ваша скидка: </span>
                    <span class="discount__value"><?=$currentDiscount?>%</span>
                </div>
                <div class="bonus-item">
                    Каталог поз для фотосессии
                    <span class="mdi mdi-lock-open-outline"></span>
                </div>
                <div class="bonus-item">
                    Методички по подбору образа
                    <span class="mdi mdi-lock-open-outline"></span>
                </div>
            </div>
        </aside>
    </div>
</section>