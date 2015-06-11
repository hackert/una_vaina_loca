<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_nocturno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nocturno),array('view','id'=>$data->id_nocturno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pernorta')); ?>:</b>
	<?php echo CHtml::encode($data->pernorta); ?>
	<br />


</div>