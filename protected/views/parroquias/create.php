<?php
$this->breadcrumbs=array(
	'Parroquiases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Parroquias','url'=>array('index')),
array('label'=>'Manage Parroquias','url'=>array('admin')),
);
?>

<h1>Create Parroquias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>