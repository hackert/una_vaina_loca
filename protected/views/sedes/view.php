<?php
$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	$model->id_sede,
);

$this->menu=array(
array('label'=>'List Sedes','url'=>array('index')),
array('label'=>'Create Sedes','url'=>array('create')),
array('label'=>'Update Sedes','url'=>array('update','id'=>$model->id_sede)),
array('label'=>'Delete Sedes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sede),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Sedes','url'=>array('admin')),
);
?>

<h1>View Sedes #<?php echo $model->id_sede; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_sede',
		'nb_sede',
		'direccion_sede',
		'fk_estado',
		'fk_municipio',
		'fk_parroquia',
		'fk_estatus',
		'create_date',
		'modified_by',
		'es_activo',
		'tipo_sede',
),
)); ?>
