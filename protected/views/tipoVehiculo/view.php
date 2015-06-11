<?php
//$this->breadcrumbs = array(
//    'Tipo Vehiculos' => array('index'),
//    $model->id_tipov,
//);
//
//$this->menu = array(
//    array('label' => 'List TipoVehiculo', 'url' => array('index')),
//    array('label' => 'Create TipoVehiculo', 'url' => array('create')),
//    array('label' => 'Update TipoVehiculo', 'url' => array('update', 'id' => $model->id_tipov)),
//    array('label' => 'Delete TipoVehiculo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_tipov), 'confirm' => 'Are you sure you want to delete this item?')),
//    array('label' => 'Manage TipoVehiculo', 'url' => array('admin')),
//);
?>

<h1 class="text-center">Tipo de Vehiculo #<?php echo $model->id_tipov; ?></h1>

<div class="panel panel-success">
    <div class="panel-body col-md-12">
        <div class="col-md-6">
            <b>Id del Tipo de Vehiculo:</b><?= $model->id_tipov ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('tipoVehiculo/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>
