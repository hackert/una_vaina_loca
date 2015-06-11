<?php
//$this->breadcrumbs = array(
//    'Marcas' => array('index'),
//    $model->id_marca => array('view', 'id' => $model->id_marca),
//    'Update',
//);
//
//$this->menu = array(
//    array('label' => 'Listado Marca', 'url' => array('index')),
//    array('label' => 'Registro Marca', 'url' => array('create')),
//    array('label' => 'Visualizar Marca', 'url' => array('view', 'id' => $model->id_marca)),
//    array('label' => 'Administrador Marca', 'url' => array('admin')),
//);
?>
<div class="panel panel-success">
    <div  class="panel-heading">
        <h1 class="text-center">Actualizar Marca <?php echo $model->id_marca; ?></h1>
    </div>
    <div class="panel-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>