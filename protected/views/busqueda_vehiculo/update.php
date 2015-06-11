<?php
$this->breadcrumbs=array(
	'Busqueda Vehiculos'=>array('index'),
	$model->id_vehiculo=>array('view','id'=>$model->id_vehiculo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List busqueda_vehiculo','url'=>array('index')),
	array('label'=>'Create busqueda_vehiculo','url'=>array('create')),
	array('label'=>'View busqueda_vehiculo','url'=>array('view','id'=>$model->id_vehiculo)),
	array('label'=>'Manage busqueda_vehiculo','url'=>array('admin')),
	);
	?>

	<h1>Update busqueda_vehiculo <?php echo $model->id_vehiculo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>