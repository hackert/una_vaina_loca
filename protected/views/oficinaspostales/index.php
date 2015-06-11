<?php
/* @var $this OficinaspostalesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Oficinaspostales',
);

$this->menu=array(
	array('label'=>'Create Oficinaspostales', 'url'=>array('create')),
	array('label'=>'Manage Oficinaspostales', 'url'=>array('admin')),
);
?>

<h1>Oficinaspostales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
