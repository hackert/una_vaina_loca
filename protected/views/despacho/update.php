<?php
$this->breadcrumbs=array(
	'Despachos'=>array('index'),
	$model->id_despacho=>array('view','id'=>$model->id_despacho),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Despacho','url'=>array('index')),
	array('label'=>'Create Despacho','url'=>array('create')),
	array('label'=>'View Despacho','url'=>array('view','id'=>$model->id_despacho)),
	array('label'=>'Manage Despacho','url'=>array('admin')),
	);
	?>

	<h1>Update Despacho <?php echo $model->id_despacho; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>