<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_modelo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldGroup($model,'descripcion',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldGroup($model,'fk_marca',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
