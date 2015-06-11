<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ogc_fid,
);

$this->menu=array(
	array('label'=>'List Localidades', 'url'=>array('index')),
	array('label'=>'Create Localidades', 'url'=>array('create')),
	array('label'=>'Update Localidades', 'url'=>array('update', 'id'=>$model->ogc_fid)),
	array('label'=>'Delete Localidades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ogc_fid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Localidades', 'url'=>array('admin')),
);
?>

<h1>View Localidades #<?php echo $model->ogc_fid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ogc_fid',
		'the_geom',
		'nombrelocalidad',
		'idparroquia',
		'idtipolocalidad',
		'idlocalidad',
		'iduser',
		'fecha_create',
	),
)); ?>
