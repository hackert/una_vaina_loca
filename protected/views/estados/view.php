<?php
$this->breadcrumbs=array(
	'Estadoses'=>array('index'),
	$model->gid,
);

$this->menu=array(
array('label'=>'List Estados','url'=>array('index')),
array('label'=>'Create Estados','url'=>array('create')),
array('label'=>'Update Estados','url'=>array('update','id'=>$model->gid)),
array('label'=>'Delete Estados','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Estados','url'=>array('admin')),
);
?>

<h1>View Estados #<?php echo $model->gid; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'the_geom',
		'idestado',
		'nombreestado',
		'codigo_ine',
		'capital',
		'idregion',
		'gid',
),
)); ?>
