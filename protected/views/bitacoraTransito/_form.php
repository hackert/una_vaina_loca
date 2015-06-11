
<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validaciones_bitacora.js');
?>

<?php switch ($opc) { ?>
<?php case 1: ?>
        <p class="help-block" style="text-align: right">Los campos con<span class="required">*</span> son reuqeridos.</p>
        <div class="col-md-12">
            <div class="row-fluid">
                <div class="col-md-3">

                    <?php //echo $form->textFieldGroup($model,'fecha_llegada',array('class'=>'span5'));  ?>
                    <?php
                    echo $form->datepickerGroup(
                            $model, 'fecha_llegada', array(
                        'onchange' => 'Fecha()',
                        'readonly' => true,
                        'class' => 'SoloNumero Bloquear Limpiar',
                        'options' => array('language' => 'es', 'format' => 'dd/mm/yyyy', 'startView' => 0, 'minViewMode' => 0, 'todayBtn' => 'linked', 'weekStart' => 0, 'startDate' => date("d/-2m/y"), 'endDate' => date("d/m/Y")),
                        // 'hint' => 'Por favor haga clic dentro del campo para desplegar el calendario..!!.',
                        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
                        'beforeShowDay' => 'DisableDays',
                            )
                    );
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 24px;">
            <div class="row-fluid">
                <div class="col-md-3">

        <?php echo $form->textFieldGroup($model, 'cod_paquete', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5 Limpiar')))); ?>
                </div>
                <div class="col-md-3">

        <?php echo $form->textFieldGroup($model, 'peso_llegada', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5 Limpiar')))); ?>
                </div>

                <div class="col-md-3" style="margin-top: 24px;">

        <?php
        $this->widget('booster.widgets.TbButton', array(
            'context' => 'primary',
            'buttonType' => 'button',
            'label' => 'Agregar',
            'htmlOptions' => array(
                'onClick' => 'var paquete =$("#BitacoraTransito_cod_paquete").val();
                                  var peso =$("#BitacoraTransito_peso_llegada").val();
                                  var fechaLlegada =$("#BitacoraTransito_fecha_llegada").val();
                                  var sede = 1;
                                  AgregarPaquetes(paquete,peso, fechaLlegada, sede);'
            ),
            'icon' => 'ok-sign white',
            'block' => true,
        ));
        ?>
                </div>
            </div >
        <?php echo $form->HiddenField($model, 'fksede_llegada', array('class' => 'span5')); /* deberia ser con una sesion que capture el id de la oficina que esta registrando en ese momento */ ?> 
        </div>
            <?php echo $form->HiddenField($model, 'id_fkestatus', array('class' => 'span5')); ?>
        <?php echo $form->HiddenField($model, 'create_date', array('class' => 'span5')); ?>


        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'id' => 'EntradaPaquetes',
            'type' => 'striped bordered condensed',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'fk_despacho',
                array(
                    'name' => 'fk_tipo_despacho', 'header' => 'Tipo Despacho',
                    'value' => 'Despacho::getTipo($data->fkDespacho->tipo_despacho)',
                    'filter' => CHtml::listData(Maestro::model()->findAll('padre=:padre', array(':padre' => '5')), 'id_maestro', 'descripcion')
                ),
                'peso_llegada',
                //'fksede_llegada',
                'fecha_llegada',
                'id_fkestatus',
                /*
                  'fksede_salida',
                  'fecha_salida',
                  'modified_date',
                  'peso_salida',
                 */
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                    'htmlOptions' => array('style' => 'width: 5%'),
                    'header' => 'Acción',
                    'template' => '{view}{apertura}',
                    'buttons' => array(
                        'view' => array(
                            'label' => 'Ver Detalle de la saca',
                            'icon' => 'eye-open',
                        //  'visible'=> '$data->fkDespacho->tipo_despacho === 27',
                            'size' => 'medium',
                            'options' => array('style' => 'margin-left:17px;',),
                            'url' => '$this->grid->controller->createUrl("Envio/view", array("id"=>$data->fk_despacho))',
                            'options' => array(
                                'style' => 'margin-left:17px;',
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => "js:$(this).attr('href')",
                                    'success' => 'function(data) { $("#verPaquetes .modal-body p").html(data); $("#verPaquetes").modal(); }'
                                ),
                            ),
                        ),
                        'apertura' => array(
                            'label' => 'Apertura',
                            'icon' => 'inbox',
                            'visible' => '$data->fkDespacho->tipo_despacho === 27',
                            'size' => 'medium',
                            'options' => array('style' => 'margin-left:17px;',),
                            'url' => '$this->grid->controller->createUrl("Apertura/create", array("id"=>$data->fk_despacho))',
                            'options' => array(
                                'style' => 'margin-left:17px;',
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => "js:$(this).attr('href')",
                                    'success' => 'function(data) { $("#verPaquetes .modal-body p").html(data); $("#verPaquetes").modal(); }'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ));
        ?>

  <?php break; ?>

 <?php case 2: ?>



        <?php echo $form->HiddenField($model, 'fksede_salida', array('class' => 'span5')); /* deberia ser con una sesion que capture el id de la oficina que esta registrando en ese momento */ ?> 

        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'id' => 'GridViewSalida',
            'type' => 'striped bordered condensed',
            'dataProvider' => $model->search(),
//'filter'=>$model,
            'columns' => array(
                //'id_transito',
                //'create_date',
                /* 'id_fkestatus',
                  'fksede_llegada',
                  'fecha_llegada',
                 */
                'fk_despacho',
                //'fksede_salida',
                //'modified_date',
                'peso_llegada',
                array(
                    'class' => 'booster.widgets.TbEditableColumn',
                    'name' => 'peso_salida',
                    'htmlOptions' => array('style' => 'text-align:center', 'title' => 'Indeque el peso de salida de este paquete'),
                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                    'editable' => array(
                        'type' => 'text',
                        'emptytext' => 'indique peso',
                        'inputclass' => 'input-large',
                        'url' => $this->createUrl('BitacoraTransito/Actualizar'),
                        'placement' => 'right',
                        'validate' => 'function(value) {
                    if(!value) return "Disculpe, debe indicar el peso de salida"
                }'
                    )
                ),
                array(
                    'class' => 'booster.widgets.TbEditableColumn',
                    'name' => 'fecha_salida',
                    'htmlOptions' => array('style' => 'text-align:center', 'title' => 'Indeque la fecha de salida de este paquete'),
                    'headerHtmlOptions' => array('style' => 'width: 110px; text-align: center'),
                    'editable' => array(
                        'type' => 'date',
                        'emptytext' => 'indique fecha',
                        'viewformat' => 'dd/mm/yyyy',
                        'url' => $this->createUrl('BitacoraTransito/Actualizar'),
                        'placement' => 'right',
                    )
                ),
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                    'htmlOptions' => array('style' => 'width: 5%'),
                    'header' => 'Acción',
                    'template' => '{view}{salida}{notificar}',
                    'buttons' => array(
                            'view' => array(
                            'label' => 'Ver Detalle',
                            'icon' => 'eye-open',
                              'visible'=> '$data->id_fkestatus === 2',
                            'size' => 'medium',
                            'options' => array('style' => 'margin-left:17px;',),
                            'url' => '$this->grid->controller->createUrl("Envio/view", array("id"=>$data->fk_despacho))',
                            'options' => array(
                                'style' => 'margin-left:17px;',
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => "js:$(this).attr('href')",
                                    'success' => 'function(data) { $("#verPaquetes .modal-body p").html(data); $("#verPaquetes").modal(); }'
                                ),
                            ),
                        ),
                        'salida' => array(
                            'label' => 'Confirmar salida',
                            'options' => array('style' => 'margin-left:17px;'),
                            'icon' => 'share',
                            'visible' => '$data->id_fkestatus === 1',
                            'size' => 'medium',
                            'url' => '$data->fk_despacho',
                            'click' => 'js: function(s){ ConfirmarSalida($(this).attr("href")); return false; }',
                        ),
                        'notificar' => array(
                            'label' => 'Notificar motivo de inconsistencia de pesos',
                            'options' => array('style' => 'margin-left:17px;'),
                            'icon' => 'tags',
                            'visible' => '$data->id_fkestatus === 3',
                            'size' => 'medium',
                           // 'url' => '$data->fk_despacho',
                            //'click' => 'js: function(s){ ConfirmarSalida($(this).attr("href")); return false; }',
                        ),
                    ),
                ),
            ),
        ));
        ?>

  <?php break; ?>

<?php } ?>

<!-- View Popup  -->
<?php
$this->beginWidget('booster.widgets.TbModal', array('id' => 'verPaquetes',
    'htmlOptions' => array('style' => 'width: 955px; margin-left: 244px;
        ')
        )
);
?>

<!-- Popup Header -->
<!--<div class="modal-header">
    <h4>Datos del Promotor</h4>
</div>-->
<!-- Popup Content -->
<div class="modal-body" >
    <p>
        Employee Details
    </p>
</div>
<!-- Popup Footer -->
<div class="modal-footer">

    <!-- close button -->
<?php
$this->widget('booster.widgets.TbButton', array('label' => 'Cerrar', 'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),));
?>
    <!-- close button ends-->
</div>
    <?php $this->endWidget(); ?>
<!-- View Popup ends -->