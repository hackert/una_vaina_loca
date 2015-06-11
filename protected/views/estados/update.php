<?php
$this->breadcrumbs=array(
	'Estadoses'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Estados','url'=>array('index')),
	array('label'=>'Create Estados','url'=>array('create')),
	array('label'=>'View Estados','url'=>array('view','id'=>$model->gid)),
	array('label'=>'Manage Estados','url'=>array('admin')),
	);
	?>

	<h1>Update Estados <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>