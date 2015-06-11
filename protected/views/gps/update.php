<?php
//$this->breadcrumbs = array(
//    'Gps' => array('index'),
//    $model->id_gps => array('view', 'id' => $model->id_gps),
//    'Update',
//);
//
//$this->menu = array(
//    array('label' => 'List Gps', 'url' => array('index')),
//    array('label' => 'Create Gps', 'url' => array('create')),
//    array('label' => 'View Gps', 'url' => array('view', 'id' => $model->id_gps)),
//    array('label' => 'Manage Gps', 'url' => array('admin')),
//);
?>

<div class="panel panel-success">
    <div  class="panel-heading">
        <h1 class="text-center">Actualizar Gps <?php echo $model->id_gps; ?></h1>
    </div>
    <div class="panel-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>