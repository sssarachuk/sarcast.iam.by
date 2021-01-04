<section class="quiz-body quiz-finalization container">
    <div class="row row-flex">
        <section class="col-xs-12 col-sm-8 col-md-8">
            <header class="quiz-body__header">
                <span class="mdi mdi-clipboard-text"></span>
                <?=$quizTitle;?>
            </header>
            <div class="quiz-body__question">
                <h3>Заполните форму и получите точечный расчет стоимости съемки</h3>
                <form>
                    <label>Введите имя <input type="text" name="name"/></label>
                    <br/>
                    <label><input type="radio" name="source" value="Email"/>Email</label>
                    <label><input type="radio" name="source" value="Viber"/>Viber</label>
                    <label><input type="radio" name="source" value="Telegram"/>Telegram</label>
                    <label><input type="radio" name="source" value="WhatsUp"/>WhatsUp</label>
                    <br/>
                    <?php switch($selectedSource):
                    case 'Email': ?>
                        <label>Введите Email <input type="text" name="email" /></label>
                        <?php break; ?>
                    <?php case 'Viber': ?>
                        <?php case 'Telegram': ?>
                        <?php case 'WhatsUp': ?>
                        <label>Введите номер телефона: <input type="text" name="phone" /></label>
                            <?php break; ?>
                <?php endswitch; ?>


                </form>
            </div>
            <footer class="quiz-body__footer">
                <button onClick='location.href="?index=<?=$previousIndex;?>"'
                        class="button button-primary button-ujarak <?=$previousButtonDisabled ? 'button-grey' : 'button-pink';?>"
                    <?=$previousButtonDisabled ? 'disabled' : '';?>>
                    <span class="icon mdi mdi-arrow-left"></span>
                    Предыдущий
                </button>
                <button class="button button-primary button-ujarak button-pink button-inline">
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