<?php
$this->breadcrumbs=array(
	'Conductors',
);

$this->menu=array(
array('label'=>'Create Conductor','url'=>array('create')),
array('label'=>'Manage Conductor','url'=>array('admin')),
);
?>

<h1>Conductors</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
