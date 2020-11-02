<main class="quiz">
    <article class="section section-variant-1 bg-white text-center">
        <h1><?=$quiz->name;?></h1>
        <div class="quiz quiz-body">
            <?php foreach($quiz->questions as $question): ?>
                <?php $this->widget('QuizQuestionWidget', array('questionModel'=>$question)); ?>
            <?php endforeach; ?>
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
</main>