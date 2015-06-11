<?php
$this->breadcrumbs=array(
	'Bitacora Transitos'=>array('index'),
	$model->id_transito,
);

$this->menu=array(
array('label'=>'List BitacoraTransito','url'=>array('index')),
array('label'=>'Create BitacoraTransito','url'=>array('create')),
array('label'=>'Update BitacoraTransito','url'=>array('update','id'=>$model->id_transito)),
array('label'=>'Delete BitacoraTransito','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_transito),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage BitacoraTransito','url'=>array('admin')),
);
?>

<h1>View BitacoraTransito #<?php echo $model->id_transito; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_transito',
		'fksede_salida',
		'fecha_salida',
		'fksede_llegada',
		'fecha_llegada',
		'id_fkestatus',
		'create_date',
		'modified_date',
		'peso_salida',
		'peso_llegada',
		'fk_despacho',
),
)); ?>
