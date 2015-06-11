<?php
/* @var $this OficinaspostalesController */
/* @var $model Oficinaspostales */

$this->breadcrumbs=array(
	'Oficinaspostales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Oficinaspostales', 'url'=>array('index')),
	array('label'=>'Create Oficinaspostales', 'url'=>array('create')),
	array('label'=>'View Oficinaspostales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Oficinaspostales', 'url'=>array('admin')),
);
?>

<h1>Update Oficinaspostales <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>