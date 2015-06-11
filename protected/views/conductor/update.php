<?php
$this->breadcrumbs=array(
	'Conductors'=>array('index'),
	$model->id_persona=>array('view','id'=>$model->id_persona),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Conductor','url'=>array('index')),
	array('label'=>'Create Conductor','url'=>array('create')),
	array('label'=>'View Conductor','url'=>array('view','id'=>$model->id_persona)),
	array('label'=>'Manage Conductor','url'=>array('admin')),
	);
	?>

	<h1>Update Conductor <?php echo $model->id_persona; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>