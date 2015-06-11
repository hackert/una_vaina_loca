<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'tipo-vehiculo-form',
    'enableAjaxValidation' => false,
        ));
?>

<h4 class="note">Los campos con <span class="required">*</span> son requeridos.</h4><br><br>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-12">   
        <?php echo $form->textFieldGroup($model, 'descripcion', array('class' => 'span5', 'maxlength' => 20)); ?>
    </div>
</div>   

<div class="form-actions">
    <!-- *********** -->
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Registrar' : 'Guardar',
        'icon' => 'icon-ok-sign icon-white',
        'size' => 'medium'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset',
        'context' => 'success',
        'label' => 'Limpiar',
        'size' => 'medium',
        'icon' => 'icon-remove',
            //'id' => 'GuardarForm'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'danger',
        'label' => 'Cancelar',
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

<?php $this->endWidget(); ?>
