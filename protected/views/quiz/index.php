<main class="quiz section section-variant-1 bg-white">
    <?php if ($isStarted == false): ?>
        <?php $this->widget('QuizTitleWidget', array('model'=>$quizTitle)); ?>
    <?php else: ?>
        <?php $this->widget('QuizQuestionWidget', array(
                'quizTitle'=>$quizTitle->title,
                'model'=>$currentQuestion,
                'previousIndex'=>$previousIndex,
                'previousButtonDisabled'=>$previousButtonDisabled,
                'nextIndex'=>$nextIndex,
                'nextButtonDisabled'=>$nextButtonDisabled,
        )); ?>
    <?php endif ?>
</main>