<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_modelo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_modelo),array('view','id'=>$data->id_modelo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_marca')); ?>:</b>
	<?php echo CHtml::encode($data->fk_marca); ?>
	<br />


</div>