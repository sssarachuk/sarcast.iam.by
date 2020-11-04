<main class="quiz section section-variant-1 bg-white">
    <?php if ($isStarted == false): ?>
        <?php $this->widget('QuizTitleWidget', array('model'=>$quizTitle)); ?>
    <?php else: ?>
        <?php $this->widget('QuizQuestionWidget', array('model'=>$currentQuestion)); ?>
        <footer class="quiz quiz-footer">
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
    <?php endif ?>
</main>