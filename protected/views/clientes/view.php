<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente,
);

$this->menu=array(
array('label'=>'List Clientes','url'=>array('index')),
array('label'=>'Create Clientes','url'=>array('create')),
array('label'=>'Update Clientes','url'=>array('update','id'=>$model->id_cliente)),
array('label'=>'Delete Clientes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Clientes','url'=>array('admin')),
);
?>

<h1>View Clientes #<?php echo $model->id_cliente; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cliente',
		'nb_cliente',
		'apellido_cliente',
		'cedula_cliente',
		'es_activo',
		'create_date',
		'modified_date',
		'id_contacto',
		'nacionalidad',
),
)); ?>
