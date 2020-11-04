<main class="quiz">
    <?php if ($isStarted == false): ?>
        <?php $this->widget('QuizTitleWidget', array('model'=>$quizTitle)); ?>
    <?php else: ?>
    <article class="section section-variant-1 bg-white text-center">
        <h1><?=$quizName;?></h1>
        <div class="quiz quiz-body">
            <?php $this->widget('QuizQuestionWidget', array('model'=>$currentQuestion)); ?>
        </div>
        <footer class="quiz quiz-footer">
            <button class="button button-primary button-ujarak button-grey" disabled>
                <span class="icon mdi mdi-arrow-left"></span>
                Предыдущий
            </button>
            <button class="button button-primary button-ujarak button-pink button-inline">
                Следующий
                <span class="icon mdi mdi-arrow-right"></span>
            </button>
        </footer>
    </article>
    <?php endif ?>
</main>