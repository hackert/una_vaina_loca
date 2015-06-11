<?php
/* @var $this OficinaspostalesController */
/* @var $model Oficinaspostales */

$this->breadcrumbs=array(
	'Oficinaspostales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Oficinaspostales', 'url'=>array('index')),
	array('label'=>'Create Oficinaspostales', 'url'=>array('create')),
	array('label'=>'Update Oficinaspostales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Oficinaspostales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Oficinaspostales', 'url'=>array('admin')),
);
?>

<h1>View Oficinaspostales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'the_geom',
		'nombreoficina',
		'descripcion',
		'idlocalidad',
		'direccion',
		'telefono',
		'activo',
		'iduser',
		'fecha_creacion',
		'idoficinapostal',
	),
)); ?>
