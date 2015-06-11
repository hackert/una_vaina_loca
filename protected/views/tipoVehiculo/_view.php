<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipov')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id_tipov), array('view', 'id' => $data->id_tipov)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
    <?php echo CHtml::encode($data->descripcion); ?>
    <br />


</div>