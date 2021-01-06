<main class="quiz section section-variant-1 bg-white">
    <?php if ($isStarted == false): ?>
        <?php $this->widget('QuizTitleWidget', array('model'=>$quizTitle)); ?>
    <?php else: ?>
        <?php if ($nextButtonDisabled == true): ?>
            <?php $this->widget('QuizFinalizationWidget', array(
                'quizTitle'=>$quizTitle->title,
                'previousIndex'=>$previousIndex,
                'previousButtonDisabled'=>$previousButtonDisabled,
                'currentDiscount'=>$currentDiscount,
            )); ?>
            <?php else: ?>
            <?php $this->widget('QuizQuestionWidget', array(
                'quizTitle'=>$quizTitle->title,
                'model'=>$currentQuestion,
                'previousIndex'=>$previousIndex,
                'previousButtonDisabled'=>$previousButtonDisabled,
                'nextIndex'=>$nextIndex,
                'nextButtonDisabled'=>$nextButtonDisabled,
                'currentDiscount'=>$currentDiscount,
            )); ?>
        <?php endif ?>
    <?php endif ?>
</main>