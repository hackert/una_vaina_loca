<?php
$this->breadcrumbs=array(
	'Parroquiases',
);

$this->menu=array(
array('label'=>'Create Parroquias','url'=>array('create')),
array('label'=>'Manage Parroquias','url'=>array('admin')),
);
?>

<h1>Parroquiases</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
