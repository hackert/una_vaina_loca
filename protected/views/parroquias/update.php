<?php
$this->breadcrumbs=array(
	'Parroquiases'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Parroquias','url'=>array('index')),
	array('label'=>'Create Parroquias','url'=>array('create')),
	array('label'=>'View Parroquias','url'=>array('view','id'=>$model->gid)),
	array('label'=>'Manage Parroquias','url'=>array('admin')),
	);
	?>

	<h1>Update Parroquias <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>