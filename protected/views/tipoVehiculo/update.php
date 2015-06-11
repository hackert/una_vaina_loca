<?php
//$this->breadcrumbs = array(
//    'Tipo Vehiculos' => array('index'),
//    $model->id_tipov => array('view', 'id' => $model->id_tipov),
//    'Update',
//);
//
//$this->menu = array(
//    array('label' => 'List TipoVehiculo', 'url' => array('index')),
//    array('label' => 'Create TipoVehiculo', 'url' => array('create')),
//    array('label' => 'View TipoVehiculo', 'url' => array('view', 'id' => $model->id_tipov)),
//    array('label' => 'Manage TipoVehiculo', 'url' => array('admin')),
//);
?>
<div class="panel panel-success">
    <div  class="panel-heading">
        <h1 class="text-center">Actualizar Tipo de Vehiculo <?php echo $model->id_tipov; ?></h1>
    </div>
    <div class="panel-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>