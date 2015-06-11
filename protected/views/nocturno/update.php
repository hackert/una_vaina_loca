<?php
$this->breadcrumbs=array(
	'Nocturnos'=>array('index'),
	$model->id_nocturno=>array('view','id'=>$model->id_nocturno),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Nocturno','url'=>array('index')),
	array('label'=>'Create Nocturno','url'=>array('create')),
	array('label'=>'View Nocturno','url'=>array('view','id'=>$model->id_nocturno)),
	array('label'=>'Manage Nocturno','url'=>array('admin')),
	);
	?>

	<h1>Update Nocturno <?php echo $model->id_nocturno; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>