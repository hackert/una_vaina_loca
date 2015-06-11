<?php
$this->breadcrumbs=array(
	'Nocturnos'=>array('index'),
	$model->id_nocturno,
);

$this->menu=array(
array('label'=>'List Nocturno','url'=>array('index')),
array('label'=>'Create Nocturno','url'=>array('create')),
array('label'=>'Update Nocturno','url'=>array('update','id'=>$model->id_nocturno)),
array('label'=>'Delete Nocturno','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nocturno),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Nocturno','url'=>array('admin')),
);
?>

<h1>View Nocturno #<?php echo $model->id_nocturno; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_nocturno',
		'fecha_registro',
		'pernorta',
),
)); ?>
