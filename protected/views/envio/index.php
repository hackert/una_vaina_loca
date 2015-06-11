<?php
$this->breadcrumbs=array(
	'Envios',
);

$this->menu=array(
array('label'=>'Create Envio','url'=>array('create')),
array('label'=>'Manage Envio','url'=>array('admin')),
);
?>

<h1>Envios Empaquetados</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
