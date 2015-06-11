<?php
$this->breadcrumbs=array(
	'Busqueda Vehiculos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List busqueda_vehiculo','url'=>array('index')),
array('label'=>'Manage busqueda_vehiculo','url'=>array('admin')),
);
?>

<h1>Create busqueda_vehiculo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>