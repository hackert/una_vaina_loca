<?php
$this->breadcrumbs=array(
	'Admisions'=>array('index'),
	$model->id_admision=>array('view','id'=>$model->id_admision),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Admision','url'=>array('index')),
	array('label'=>'Create Admision','url'=>array('create')),
	array('label'=>'View Admision','url'=>array('view','id'=>$model->id_admision)),
	array('label'=>'Manage Admision','url'=>array('admin')),
	);
	?>

	<h1>Update Admision <?php echo $model->id_admision; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>