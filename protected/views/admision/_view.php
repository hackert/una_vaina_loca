


<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_admision')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_admision),array('view','id'=>$data->id_admision)); ?>
	<br />
    <b><?php  echo CHtml::encode($data->getAttributeLabel('cod_paquete')); ?>:</b>
	<?php  echo CHtml::encode($data->cod_paquete); ?>
	<br />  

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_admision')); ?>:</b>
	<?php echo CHtml::encode($data->peso_admision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_admision')); ?>:</b>
	<?php echo CHtml::encode($data->precio_admision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dimension_admision')); ?>:</b>
	<?php echo CHtml::encode($data->dimension_admision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pago_recepcion')); ?>:</b>
	<?php echo CHtml::encode($data->pago_recepcion); ?>
	<br />

	 
	

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('es_activo')); ?>:</b>
	<?php echo CHtml::encode($data->es_activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_estatus')); ?>:</b>
	<?php echo CHtml::encode($data->fk_estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sede')); ?>:</b>
	<?php echo CHtml::encode($data->id_sede); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->id_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rutae')); ?>:</b>
	<?php echo CHtml::encode($data->id_rutae); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empaque')); ?>:</b>
	<?php echo CHtml::encode($data->empaque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('articulo')); ?>:</b>
	<?php echo CHtml::encode($data->articulo); ?>
	<br />

	*/ ?>

</div>