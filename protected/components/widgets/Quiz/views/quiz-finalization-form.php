<section class="finalization-form validation">
    <?php echo CHtml::beginForm('','post',array('id'=>'quizFinalizationForm')); ?>
        <div class="form-row">
            <div class="form-group">
                <?php echo CHtml::activeLabel($model,'name'); ?>
                <figure class="form-control-name">
                    <?php echo CHtml::activeTextField($model,'name', array(
                                                                    'placeholder'=>'Имя',
                                                                    'class'=>'form-control')
                    ) ?>
                    <span class="mdi mdi-account"></span>
                </figure>
                <?php echo CHtml::error($model,'name', array('class' => 'invalid-feedback')); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <div class="btn-group btn-group-toggle">
                    <?php echo CHtml::activeRadioButtonList($model, 'selectedSource', $model->sources, array(
                            'container' => 'div',
                            'separator' => '',
                            "template"=>"<div class='btn btn-primary'>{label}{input}</div>"
                    )) ?>
                </div>
                <?php echo CHtml::error($model,'selectedSource', array('class' => 'invalid-feedback')); ?>
            </div>
        </div>
    <?php echo CHtml::endForm(); ?>
</section>