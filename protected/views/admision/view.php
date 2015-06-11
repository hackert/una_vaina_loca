<?php


$this->menu=array(
array('label'=>'List Admision','url'=>array('index')),
array('label'=>'Create Admision','url'=>array('create')),
array('label'=>'Update Admision','url'=>array('update','id'=>$model->id_admision)),
array('label'=>'Delete Admision','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_admision),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Admision','url'=>array('admin')),
);
?>

<h1 class="text-center">Datos del Paquete #<?php echo $model->id_admision; ?></h1>
<div class="panel panel-success">
	 <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Precio Admision: </b><?php echo $model->precio_admision; ?>
        </div>
        <div class="col-md-4">
            <b>Dimension Paquete: </b><?php if($model->dimension_admision == null){ echo "No Posee"; }else{ echo $model->dimension_admision; } ?>
        </div>
        <div class="col-md-4">
            <b>Pago a Recepcion: </b><?php echo  $model->pago_recepcion; ?>
        </div>
    </div>

     <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Fecha Entrega: </b><?php echo $model->fecha_entrega; ?>
        </div>
        <div class="col-md-4">
            <b>Cliente: </b><?php if($model->dimension_admision == null){ echo "No Posee"; }else{ echo $model->dimension_admision; } ?>
        </div>
        <div class="col-md-4">
            <b>Receptor: </b><?php echo  $model->pago_recepcion; ?>
        </div>
    </div>
<?php  /* $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array( */
		/*'id_admision', */
		/* 'peso_admision',
		'precio_admision',
		'dimension_admision',
		'pago_recepcion',
		'fecha_entrega',		
		'es_activo',
		'fk_estatus',
		'create_date',  */
		/*'modified_by',*/ 
	/*	'id_sede',
		'id_cliente',
		'empaque',
		array( 'name'  =>'articulo', 
		 	    'value' =>'$data->articulo0->descripcion'),
),
)); */ ?>
</div>

<div class="text-right">
    <!-- *********** -->
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'info',
        'label' => 'Volver',
        'size' => 'medium',
        'id' => 'CancelarForm',
        'icon' => 'icon-ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('admision/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>