<h1 class="text-center">Vehiculo #<?php echo $model->id_vehiculo; ?></h1>

<div class="panel panel-success">
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>id vehiculo: </b><?= $model->id_vehiculo ?>
        </div>
        <div class="col-md-4">
            <b>Placa: </b><?= $model->placa ?>
        </div>
        <div class="col-md-4">
            <b>Serial de la  Carroseria: </b><?= $model->serial_carroseria ?>
        </div>
    </div>
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Serial del Motor: </b><?= $model->serial_motor ?>
        </div>
        <div class="col-md-4">
            <b>Color:</b><?= $model->color ?>
        </div>
        <div class="col-md-4">
            <b>Descripción: </b><?= $model->descripcion ?>
        </div>
    </div>
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Año: </b><?= $model->anio ?>
        </div>
        <div class="col-md-4">
            <b>Transmisión: </b><?= $model->transmision ?>
        </div>
        <div class="col-md-4">
            <b>Tipo Vehiculo: </b><?= $model->tipov ?>
        </div>
    </div>
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Marca: </b><?= $model->marca ?>
        </div>
        <div class="col-md-4">
            <b>rotulado: </b><?= ($model->rotulado== 1)?'SI':'NO' ?>
        </div>
        <div class="col-md-4">
            <b>Número: </b><?= $model->numero ?>
        </div>
    </div>
    
    <div class="panel-body col-md-12">
        <div class="col-md-4">
            <b>Logo: </b><?= $model->logo ?>
        </div>
        <div class="col-md-4">
            <b>Dependencia: </b><?= ($model->dependencia== 1)?'SI':'NO' ?>
        </div>
        <div class="col-md-4">
            <b>Modelo: </b><?= $model->modelo ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('vehiculo/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>
