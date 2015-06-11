<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'vehiculo-form',
    'enableAjaxValidation' => false,
        ));


$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.numeric.js');




Yii::app()->clientScript->registerScript('vehiculo-form', "
$(document).ready(function(){
         $('#Vehiculo_anio').numeric();  
          $('#Vehiculo_numero').numeric();       
    });
");
?>

<h4 class="note">Los campos con <span class="required">*</span> son requeridos.</h4><br>

<?php echo $form->errorSummary($model); ?>


<div class="row">
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'placa', array('class' => 'span5', 'maxlength' => 7)); ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'serial_carroseria', array('class' => 'span6', 'maxlength' => 20)); ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'serial_motor', array('class' => 'span5', 'maxlength' => 20)); ?>
    </div>
</div> 



<div class="row">
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'color', array('class' => 'span6', 'maxlength' => 20)); ?>
    </div>
    <div class="col-md-4">  
        <?php echo $form->textFieldGroup($model, 'anio', array('class' => 'span5')); ?>
    </div>
    <div class="col-md-4">  
        <?php
        echo $form->dropDownListGroup($model, 'transmision', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(2),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
</div> 

<div class="row">
    <div class="col-md-4">  
        <?php
        $criteria1 = new CDbCriteria;
        $criteria1->order = 'descripcion ASC';
        echo $form->dropDownListGroup($model, 'tipov', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => CHtml::listData(TipoVehiculo::model()->findAll($criteria1), 'id_tipov', 'descripcion'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?> 
    </div>
    <div class="col-md-4">  
        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'descripcion ASC';
        echo $form->dropDownListGroup($model, 'marca', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => CHtml::listData(Marca::model()->findAll($criteria), 'id_marca', 'descripcion'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Vehiculo/Cargarmodelo'),
                        'update' => '#' . CHtml::activeId($model, 'modelo'),
                    ),
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">  
        <?php
        echo $form->dropDownListGroup($model, 'modelo', array(), array(
            'class' => 'span6 Limpiar',
            'title' => 'Indique el Modelo',
            'prompt' => '-- Seleccione --'
                ), array('class' => 'span6'));
        ?>
    </div>
</div>


<div class="row">
    <div class="col-md-4">  
        <?php
        echo $form->dropDownListGroup($model, 'dependencia', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => Maestro::FindMaestrosByPadreSelect(3),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">  
        <?php
        echo $form->dropDownListGroup($model, 'logo', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => array('1' => 'SI', '0' => 'NO'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
    <div class="col-md-4">  
        <?php
        echo $form->dropDownListGroup($model, 'rotulado', array('wrapperHtmlOptions' => array('class' => 'col-sm-4',),
            'widgetOptions' => array(
                'data' => array('1' => 'SI', '0' => 'NO'),
                'htmlOptions' => array(
                    'empty' => 'SELECCIONE',
                ),
            )
                )
        );
        ?>
    </div>
</div> 


<div class="row">
    <div class="col-md-6">  
        <?php echo $form->textFieldGroup($model, 'numero', array('class' => 'span5')); ?>
    </div>
    <div class="col-md-6">  
        <?php echo $form->textFieldGroup($model, 'descripcion', array('class' => 'span5')); ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('Vehiculo/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>

<?php $this->endWidget(); ?>
