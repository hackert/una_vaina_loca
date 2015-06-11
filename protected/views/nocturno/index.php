<?php
$this->breadcrumbs=array(
	'Nocturnos',
);

$this->menu=array(
array('label'=>'Create Nocturno','url'=>array('create')),
array('label'=>'Manage Nocturno','url'=>array('admin')),
);
?>

<h1>Nocturnos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
