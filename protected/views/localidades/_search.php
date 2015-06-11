<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ogc_fid'); ?>
		<?php echo $form->textField($model,'ogc_fid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'the_geom'); ?>
		<?php echo $form->textField($model,'the_geom'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombrelocalidad'); ?>
		<?php echo $form->textField($model,'nombrelocalidad',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idparroquia'); ?>
		<?php echo $form->textField($model,'idparroquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idtipolocalidad'); ?>
		<?php echo $form->textField($model,'idtipolocalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlocalidad'); ?>
		<?php echo $form->textField($model,'idlocalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_create'); ?>
		<?php echo $form->textField($model,'fecha_create'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->