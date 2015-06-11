<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('gid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gid),array('view','id'=>$data->gid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('the_geom')); ?>:</b>
	<?php echo CHtml::encode($data->the_geom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombremunicipio')); ?>:</b>
	<?php echo CHtml::encode($data->nombremunicipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_ine')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_ine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestado')); ?>:</b>
	<?php echo CHtml::encode($data->idestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmunicipio')); ?>:</b>
	<?php echo CHtml::encode($data->idmunicipio); ?>
	<br />


</div>