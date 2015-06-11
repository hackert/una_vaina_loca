<?php
$this->breadcrumbs=array(
	'Gps',
);

$this->menu=array(
array('label'=>'Create Gps','url'=>array('create')),
array('label'=>'Manage Gps','url'=>array('admin')),
);
?>

<h1>Gps</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
