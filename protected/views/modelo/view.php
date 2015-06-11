<?php
//$this->menu = array(
//    array('label' => 'List Modelo', 'url' => array('index')),
//    array('label' => 'Create Modelo', 'url' => array('create')),
//    array('label' => 'Update Modelo', 'url' => array('update', 'id' => $model->id_modelo)),
//    array('label' => 'Delete Modelo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_modelo), 'confirm' => 'Are you sure you want to delete this item?')),
//    array('label' => 'Manage Modelo', 'url' => array('admin')),
//);
?>

<h1 class="text-center">Modelo #<?php echo $model->id_modelo; ?></h1>

<div class="panel panel-success">
    <div class="panel-body col-md-12">
        <div class="col-md-6">
            <b>Marca:</b><?= $model->fkMarca->descripcion ?>
        </div>
        <div class="col-md-6">
            <b>Descripcion: </b><?= $model->descripcion ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('Modelo/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>