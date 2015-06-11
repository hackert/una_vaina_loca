<?php
//$this->breadcrumbs=array(
//	'Gps'=>array('index'),
//	$model->id_gps,
//);
//
//$this->menu=array(
//array('label'=>'List Gps','url'=>array('index')),
//array('label'=>'Create Gps','url'=>array('create')),
//array('label'=>'Update Gps','url'=>array('update','id'=>$model->id_gps)),
//array('label'=>'Delete Gps','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gps),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage Gps','url'=>array('admin')),
//);
?>

<h1 class="text-center">Datos del Gps #<?php echo $model->id_gps; ?></h1>

<div class="panel panel-success">
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Id del GPS: </b><?= $model->id_gps ?>
        </div>
        <div class="col-md-4">
            <b>id vehiculo: </b><?= $model->id_vehiculo ?>
        </div>
        <div class="col-md-4">
            <b>Código: </b><?= $model->codigo ?>
        </div>
    </div>
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Modelo: </b><?= $model->modelo ?>
        </div>
        <div class="col-md-4">
            <b>Reporta:</b><?= $model->reporta ?>
        </div>
        <div class="col-md-4">
            <b>Imei: </b><?= $model->imei ?>
        </div>
    </div>
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Sim CARD: </b><?= $model->sim_card ?>
        </div>
        <div class="col-md-4">
            <b>Fecha Instalacion:</b><?= $model->fecha_instalacion ?>
        </div>
        <div class="col-md-4">
            <b>Linea: </b><?= $model->linea ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('gps/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>
