<?php
$this->breadcrumbs=array(
	'Parroquiases'=>array('index'),
	$model->gid,
);

$this->menu=array(
array('label'=>'List Parroquias','url'=>array('index')),
array('label'=>'Create Parroquias','url'=>array('create')),
array('label'=>'Update Parroquias','url'=>array('update','id'=>$model->gid)),
array('label'=>'Delete Parroquias','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Parroquias','url'=>array('admin')),
);
?>

<h1>View Parroquias #<?php echo $model->gid; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'gid',
		'the_geom',
		'parroquia',
		'codigo_ine',
		'idparroquia',
		'idmunicipio',
),
)); ?>
