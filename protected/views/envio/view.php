<?php
$this->breadcrumbs=array(
	'Envios'=>array('index'),
	$model->id_envio,
);

$this->menu=array(
array('label'=>'List Envio','url'=>array('index')),
array('label'=>'Create Envio','url'=>array('create')),
array('label'=>'Update Envio','url'=>array('update','id'=>$model->id_envio)),
array('label'=>'Delete Envio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_envio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Envio','url'=>array('admin')),
);
?>

<h1 class="text-center">Datos del Empaquetado #<?php echo $model->id_envio; ?></h1>


<div class="panel panel-success">
	 <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Tipo de Envio: </b><?php echo $model->tipo_envio; ?>
        </div>
        <div class="col-md-4">
            <b>Cantidad de Articulos: </b><?php  echo $model->cant_articulo; ?>
        </div>
        <div class="col-md-4">
            <b>Codigo del Empaque: </b><?php echo  $model->codigo_envio; ?>
        </div>
    </div>

     <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Número de Saca: </b><?php if($model->num_saca == null){ echo "No Aplica"; }else{ echo $model->num_saca; }  ?>
        </div>
        <div class="col-md-4">
            <b>Peso Total: </b><?php  echo $model->peso_total; ?>
        </div>
        <div class="col-md-4">
           
        </div>
    </div>
</div>

<?php /* $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_envio',
		'tipo_envio',
		'cant_articulo',
		'codigo_envio',
		'create_date',
		'modified_date',
		'num_saca',
		'peso_total',
),
)); */ ?>


<div class="text-right">
    <!-- *********** -->
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'info',
        'label' => 'Volver',
        'size' => 'medium',
        'id' => 'CancelarForm',
        'icon' => 'icon-ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('envio/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>