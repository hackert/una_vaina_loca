<?php
/* @var $this OficinaspostalesController */
/* @var $model Oficinaspostales */

$this->breadcrumbs=array(
	'Oficinaspostales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Oficinaspostales', 'url'=>array('index')),
	array('label'=>'Manage Oficinaspostales', 'url'=>array('admin')),
);
?>

<h1>Create Oficinaspostales</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>