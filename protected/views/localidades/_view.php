<?php
/* @var $this LocalidadesController */
/* @var $data Localidades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ogc_fid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ogc_fid), array('view', 'id'=>$data->ogc_fid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('the_geom')); ?>:</b>
	<?php echo CHtml::encode($data->the_geom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrelocalidad')); ?>:</b>
	<?php echo CHtml::encode($data->nombrelocalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idparroquia')); ?>:</b>
	<?php echo CHtml::encode($data->idparroquia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipolocalidad')); ?>:</b>
	<?php echo CHtml::encode($data->idtipolocalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlocalidad')); ?>:</b>
	<?php echo CHtml::encode($data->idlocalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_create')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_create); ?>
	<br />

	*/ ?>

</div>