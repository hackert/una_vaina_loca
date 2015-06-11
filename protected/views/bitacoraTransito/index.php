<?php
$this->breadcrumbs=array(
	'Bitacora Transitos',
);

$this->menu=array(
array('label'=>'Create BitacoraTransito','url'=>array('create')),
array('label'=>'Manage BitacoraTransito','url'=>array('admin')),
);
?>

<h1>Bitacora Transitos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
