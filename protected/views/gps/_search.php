<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_gps',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'id_vehiculo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'codigo',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'modelo',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->checkBoxGroup($model,'reporta'); ?>

		<?php echo $form->textFieldGroup($model,'imei',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'sim_card',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldGroup($model,'fecha_instalacion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'linea',array('class'=>'span5','maxlength'=>12)); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
