<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_vehiculo',array('class'=>'span5')); ?>

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
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
