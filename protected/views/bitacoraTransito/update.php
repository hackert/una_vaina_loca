<?php
$this->breadcrumbs=array(
	'Bitacora Transitos'=>array('index'),
	$model->id_transito=>array('view','id'=>$model->id_transito),
	'Update',
);

	$this->menu=array(
	array('label'=>'List BitacoraTransito','url'=>array('index')),
	array('label'=>'Create BitacoraTransito','url'=>array('create')),
	array('label'=>'View BitacoraTransito','url'=>array('view','id'=>$model->id_transito)),
	array('label'=>'Manage BitacoraTransito','url'=>array('admin')),
	);
	?>

	<h1>Update BitacoraTransito <?php echo $model->id_transito; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>