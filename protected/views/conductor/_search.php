<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_persona',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span5','maxlength'=>40)); ?>

		<?php echo $form->textFieldGroup($model,'apellido',array('class'=>'span5','maxlength'=>40)); ?>

		<?php echo $form->textFieldGroup($model,'nacionalidad',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->textFieldGroup($model,'cedula',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'tipo_trab',array('class'=>'span5')); ?>

		<?php echo $form->checkBoxGroup($model,'licencia'); ?>

		<?php echo $form->textFieldGroup($model,'grado',array('class'=>'span5','maxlength'=>1)); ?>

		<?php echo $form->checkBoxGroup($model,'es_activo'); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
