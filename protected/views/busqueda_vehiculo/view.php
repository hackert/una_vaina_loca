<?php
$this->breadcrumbs=array(
	'Busqueda Vehiculos'=>array('index'),
	$model->id_vehiculo,
);

$this->menu=array(
array('label'=>'List busqueda_vehiculo','url'=>array('index')),
array('label'=>'Create busqueda_vehiculo','url'=>array('create')),
array('label'=>'Update busqueda_vehiculo','url'=>array('update','id'=>$model->id_vehiculo)),
array('label'=>'Delete busqueda_vehiculo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vehiculo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage busqueda_vehiculo','url'=>array('admin')),
);
?>

<h1>View busqueda_vehiculo #<?php echo $model->id_vehiculo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_vehiculo',
		'placa',
		'serial_carroseria',
		'serial_motor',
		'color',
		'anio',
		'transmision',
		'tipov',
		'marca',
		'rotulado',
		'numero',
		'logo',
),
)); ?>
