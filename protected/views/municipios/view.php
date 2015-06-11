<?php
$this->breadcrumbs=array(
	'Municipioses'=>array('index'),
	$model->gid,
);

$this->menu=array(
array('label'=>'List Municipios','url'=>array('index')),
array('label'=>'Create Municipios','url'=>array('create')),
array('label'=>'Update Municipios','url'=>array('update','id'=>$model->gid)),
array('label'=>'Delete Municipios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Municipios','url'=>array('admin')),
);
?>

<h1>View Municipios #<?php echo $model->gid; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'the_geom',
		'nombremunicipio',
		'codigo_ine',
		'idestado',
		'idmunicipio',
		'gid',
),
)); ?>
