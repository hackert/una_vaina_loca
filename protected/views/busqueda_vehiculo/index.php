<?php
$this->breadcrumbs=array(
	'Busqueda Vehiculos',
);

$this->menu=array(
array('label'=>'Create busqueda_vehiculo','url'=>array('create')),
array('label'=>'Manage busqueda_vehiculo','url'=>array('admin')),
);
?>

<h1>Busqueda Vehiculos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
