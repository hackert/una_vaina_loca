<?php
$this->breadcrumbs=array(
	'Tipo Vehiculos',
);

$this->menu=array(
array('label'=>'Create TipoVehiculo','url'=>array('create')),
array('label'=>'Manage TipoVehiculo','url'=>array('admin')),
);
?>

<h1>Tipo Vehiculos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
