<?php
$this->breadcrumbs=array(
	'Municipioses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Municipios','url'=>array('index')),
array('label'=>'Manage Municipios','url'=>array('admin')),
);
?>

<h1>Create Municipios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>