<section class="finalization-form validation">
    <?php echo CHtml::beginForm('', 'post', array('id' => 'quizFinalizationForm')); ?>
    <div class="form-row">
        <div class="form-group">
            <?php echo CHtml::activeLabel($model, 'name'); ?>
            <figure class="form-control-name">
                <?php echo CHtml::activeTextField($model, 'name', array(
                        'placeholder' => 'Имя',
                        'class' => 'form-control')
                ) ?>
                <span class="mdi mdi-account"></span>
            </figure>
            <?php echo CHtml::error($model, 'name', array('class' => 'invalid-feedback')); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <div class="btn-group btn-group-toggle">
                <?php echo CHtml::activeRadioButtonList($model, 'selectedSource', $model->sources, array(
                    'container' => 'div',
                    'separator' => '',
                    'class' => 'radio-button',
                    'template' => '
                        <div class="btn-wrapper">
                            {label}{input}
                        </div>',
                    'labelOptions' => array('class' => 'btn btn-light-grey'),
                )) ?>
            </div>
            <?php echo CHtml::error($model, 'selectedSource', array('class' => 'invalid-feedback')); ?>
        </div>
    </div>
    <div class="form-row email">
        <div class="form-group">
            <?php echo CHtml::activeLabel($model, 'email'); ?>
            <figure class="form-control-name">
                <?php echo CHtml::activeTextField($model, 'email', array(
                        'placeholder' => 'Email',
                        'class' => 'form-control')
                ) ?>
                <span class="mdi mdi-email"></span>
            </figure>
            <?php echo CHtml::error($model, 'email', array('class' => 'invalid-feedback')); ?>
        </div>
    </div>
    <div class="form-row phone">
        <div class="form-group">
            <?php echo CHtml::activeLabel($model, 'phone'); ?>
            <figure class="form-control-name">
                <?php echo CHtml::activeTextField($model, 'phone', array(
                        'placeholder' => 'Телефон',
                        'class' => 'form-control')
                ) ?>
                <span class="mdi mdi-email"></span>
            </figure>
            <?php echo CHtml::error($model, 'phone', array('class' => 'invalid-feedback')); ?>
        </div>
    </div>
    <?php echo CHtml::endForm(); ?>
</section>