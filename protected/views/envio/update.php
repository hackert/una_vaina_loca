<?php
$this->breadcrumbs=array(
	'Envios'=>array('index'),
	$model->id_envio=>array('view','id'=>$model->id_envio),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Envio','url'=>array('index')),
	array('label'=>'Create Envio','url'=>array('create')),
	array('label'=>'View Envio','url'=>array('view','id'=>$model->id_envio)),
	array('label'=>'Manage Envio','url'=>array('admin')),
	);
	?>

	<h1>Update Envio <?php echo $model->id_envio; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>