<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'gps-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>

<h4 class="note">Los campos con <span class="required">*</span> son requeridos.</h4><br><br>

<?php // echo $form->errorSummary($model);  ?>



<div class="row">
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'id_vehiculo', array('class' => 'span5')); ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'codigo', array('class' => 'span5', 'maxlength' => 15)); ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'modelo', array('class' => 'span5', 'maxlength' => 20)); ?>
    </div>
</div> 

<div class="row">
    <div class="col-md-4">  
        <?php echo CHtml::activeLabel($model, 'reporta'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSwitch', array(
            'name' => 'reporta',
            'options' => array(
                'onText' => 'SI',
                'offText' => 'NO',
            ),
                )
        );
        ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'imei', array('class' => 'span5', 'maxlength' => 15)); ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'sim_card', array('class' => 'span4', 'maxlength' => 15)); ?>
    </div>
</div> 

<div class="row">
    <div class="col-md-6">  
        <?php
        echo $form->datepickerGroup(
                $model, 'fecha_instalacion', array(
            'onchange' => 'Fecha()',
            'readOnly' => true,
            'class' => 'SoloNumero Bloquear',
            'options' => array('language' => 'es', 'format' => 'dd/mm/yyyy', 'startView' => 0, 'minViewMode' => 0, 'todayBtn' => 'linked', 'weekStart' => 0, 'startDate' => date("d/-2m/y"), 'endDate' => date("d/m/Y")),
            'hint' => 'Por favor haga clic dentro del campo para desplegar el calendario..!!.',
            'prepend' => '<i class="icon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
    </div>
    <div class="col-md-6">  
        <?php echo $form->textFieldGroup($model, 'linea', array('class' => 'span5', 'maxlength' => 12)); ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('Gps/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>

<?php $this->endWidget(); ?>
