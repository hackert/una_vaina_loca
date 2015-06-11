<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'localidades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'the_geom'); ?>
		<?php echo $form->textField($model,'the_geom'); ?>
		<?php echo $form->error($model,'the_geom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrelocalidad'); ?>
		<?php echo $form->textField($model,'nombrelocalidad',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombrelocalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idparroquia'); ?>
		<?php echo $form->textField($model,'idparroquia'); ?>
		<?php echo $form->error($model,'idparroquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idtipolocalidad'); ?>
		<?php echo $form->textField($model,'idtipolocalidad'); ?>
		<?php echo $form->error($model,'idtipolocalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idlocalidad'); ?>
		<?php echo $form->textField($model,'idlocalidad'); ?>
		<?php echo $form->error($model,'idlocalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_create'); ?>
		<?php echo $form->textField($model,'fecha_create'); ?>
		<?php echo $form->error($model,'fecha_create'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->