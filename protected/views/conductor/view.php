<?php
$this->breadcrumbs=array(
	'Conductors'=>array('index'),
	$model->id_persona,
);

$this->menu=array(
array('label'=>'List Conductor','url'=>array('index')),
array('label'=>'Create Conductor','url'=>array('create')),
array('label'=>'Update Conductor','url'=>array('update','id'=>$model->id_persona)),
array('label'=>'Delete Conductor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_persona),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Conductor','url'=>array('admin')),
);
?>

<h1>Datos del Conductor #<?php echo $model->id_persona; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_persona',
		'nombre',
		'apellido',
		'nacionalidad',
		'cedula',
		'tipo_trab',
		'licencia',
		'grado',
		'es_activo',
),
)); ?>
