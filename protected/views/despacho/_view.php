<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_despacho')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_despacho),array('view','id'=>$data->id_despacho)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_despacho')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_despacho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_transporte')); ?>:</b>
	<?php echo CHtml::encode($data->fk_transporte); ?>
	<br />


</div>