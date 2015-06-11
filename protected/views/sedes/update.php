<?php
$this->breadcrumbs=array(
	'Sedes'=>array('index'),
	$model->id_sede=>array('view','id'=>$model->id_sede),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Sedes','url'=>array('index')),
	array('label'=>'Create Sedes','url'=>array('create')),
	array('label'=>'View Sedes','url'=>array('view','id'=>$model->id_sede)),
	array('label'=>'Manage Sedes','url'=>array('admin')),
	);
	?>

	<h1>Update Sedes <?php echo $model->id_sede; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>