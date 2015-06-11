<div class="panel panel-success">
    <div  class="panel-heading">
        <h1 class="text-center">Actualizar Vehiculo <?php echo $model->id_vehiculo; ?></h1>
    </div>
    <div class="panel-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>