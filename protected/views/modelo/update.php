<?php
//$this->breadcrumbs = array(
//    'Modelos' => array('index'),
//    $model->id_modelo => array('view', 'id' => $model->id_modelo),
//    'Update',
//);
//
//$this->menu = array(
//    array('label' => 'List Modelo', 'url' => array('index')),
//    array('label' => 'Create Modelo', 'url' => array('create')),
//    array('label' => 'View Modelo', 'url' => array('view', 'id' => $model->id_modelo)),
//    array('label' => 'Manage Modelo', 'url' => array('admin')),
//);
?>
<div class="panel panel-success">
    <div  class="panel-heading">
        <h1 class="text-center">Actualizar Modelo <?php echo $model->id_modelo; ?></h1>
    </div>
    <div class="panel-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
