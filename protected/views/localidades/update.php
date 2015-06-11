<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ogc_fid=>array('view','id'=>$model->ogc_fid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Localidades', 'url'=>array('index')),
	array('label'=>'Create Localidades', 'url'=>array('create')),
	array('label'=>'View Localidades', 'url'=>array('view', 'id'=>$model->ogc_fid)),
	array('label'=>'Manage Localidades', 'url'=>array('admin')),
);
?>

<h1>Update Localidades <?php echo $model->ogc_fid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>