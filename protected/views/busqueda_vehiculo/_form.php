<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'busqueda-vehiculo-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'placa',array('class'=>'span5','maxlength'=>7)); ?>

	<?php echo $form->textFieldGroup($model,'serial_carroseria',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'serial_motor',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'color',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldGroup($model,'anio',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'transmision',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'tipov',array('class'=>'span5')); ?>

	<?php echo $form->textFieldGroup($model,'marca',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxGroup($model,'rotulado'); ?>

	<?php echo $form->textFieldGroup($model,'numero',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxGroup($model,'logo'); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
