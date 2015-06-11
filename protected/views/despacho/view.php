<?php


$this->menu=array(
array('label'=>'List Despacho','url'=>array('index')),
array('label'=>'Create Despacho','url'=>array('create')),
array('label'=>'Update Despacho','url'=>array('update','id'=>$model->id_despacho)),
array('label'=>'Delete Despacho','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_despacho),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Despacho','url'=>array('admin')),
);
?>

<h1 class="text-center">Datos del Despacho #<?php echo $model->id_despacho; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_despacho',
		'tipo_despacho',
		'fk_transporte',
),
)); ?>
