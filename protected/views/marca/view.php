<?php
//$this->breadcrumbs=array(
//	'Marcas'=>array('index'),
//	$model->id_marca,
//);
//
//$this->menu=array(
//array('label'=>'List Marca','url'=>array('index')),
//array('label'=>'Registro Marca','url'=>array('create')),
//array('label'=>'Update Marca','url'=>array('update','id'=>$model->id_marca)),
//array('label'=>'Delete Marca','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_marca),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage Marca','url'=>array('admin')),
//);
?>


<h1 class="text-center">Marca de Vehiculo #<?php echo $model->id_marca; ?></h1>

<div class="panel panel-success">
    <div class="panel-body col-md-12">
        <div class="col-md-6">
            <b>Id de la Marca:</b><?= $model->id_marca ?>
        </div>
        <div class="col-md-6">
            <b>Descripcion:</b><?= $model->descripcion ?>
        </div>
    </div>
</div>


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
            'onclick' => 'document.location.href ="' . $this->createUrl('marca/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>