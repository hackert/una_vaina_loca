<?php
$this->breadcrumbs=array(
	'Municipioses'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Municipios','url'=>array('index')),
	array('label'=>'Create Municipios','url'=>array('create')),
	array('label'=>'View Municipios','url'=>array('view','id'=>$model->gid)),
	array('label'=>'Manage Municipios','url'=>array('admin')),
	);
	?>

	<h1>Update Municipios <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>