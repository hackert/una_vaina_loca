<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'despacho-form',
	'enableAjaxValidation'=>true,
)); 

$this->widget(
        'booster.widgets.TbLabel', array(
    'context' => 'warning',
    'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Los campos marcados con * son requeridos',
        )
); ?>
<br><br>

<?php echo $form->errorSummary($model); ?>

<?php

Yii::app()->clientScript->registerScript('Despachos', "

  
    $(document).ready(function(){
        $('#Despacho_codigo_envio').keypress(function(e) {  
            if (e.which == 13) {
                return false;
            }
        })
    });
    



   /* -----------  Validacion Pistoleo Codigos   ----------- */
         $('#Despacho_codigo_envio').keypress(function(e){
              if(e.which == 13) {
                 // enter pressed


                        var codigo_empaque = $('#Despacho_codigo_envio').val();

                         $.ajax({
                                    url: '" . CController::createUrl('Despacho/buscarEmpaque') . "',
                                    async: true,
                                    type: 'POST',
                                    data: 'Codigo_empaque='+codigo_empaque,
                                    dataType:'json',
                                    success: function(datos){
                                         
                                          if(datos != 'vacio'){
                                            /*  ++ El peso ingresado es menor a 500 grs  ++  */
                                                  //   alert('busco bien');
                                              var vehiculo = $('#Despacho_fk_transporte').children(':selected').text();       
                                              var tipo_emp = datos['codigo_empq'];
                                              var codigo_empaque = datos['codigo_envio'];
                                              var peso  =  datos['peso_total'];

                                              var Campos1 = '<input type=hidden name=ListId[] value=\"'+codigo_empaque+'\"/>';
                                              /* -------------------------------------  */

                                                 Fila = '<tr>'
                                                        +'<td>'+vehiculo+'</td>'
                                                        +'<td>'+tipo_emp+'</td>'
                                                        +'<td>'+codigo_empaque+'</td>' 
                                                        +'<td>'+peso+'</td>'
                                                        +'<td>'+Campos1+'</td>'                                                        
                                                        +'<td style=\'text-align:center;\'><img src=\'" . Yii::app()->baseUrl . "/images/borrar.png\' onclick=\'if(confirm(\"¿Se encuentra seguro de eliminar el Empaque ?\")){ $(this).parent().parent().remove();}\' style=\'cursor:pointer;\' title=\'Eliminar\'/></td>'
                                                        +'</tr>';
                                          
                                                        $('#ListarDespachos').append(Fila);

                                                        $('#Despacho_codigo_envio').val('');

                                            /*   ++  ++  ++  ++  ++  ++  ++  ++  ++ ++ ++  + */
                                          }else{

                                            bootbox.alert('Codigo del Empaquetado Invalido !');
                                          }
 

                                    }
                                });
                      return false;
               }
         });

    /*  --------------------------------------------------- */

    ");

?>
<?php
/*  -------------------------  
$this->widget('booster.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $envio->search(),
    'template' => "{items}",
    'selectableRows' => 2,
    'bulkActions' => array(
    'actionButtons' => array(
        array(
            'buttonType' => 'button',
            'context' => 'primary',
            'size' => 'small',
            'label' => 'Testing Primary Bulk Actions' ,
            'click' => 'js:function(values){console.log(values);}',
            'id' => 'id_envio'
            )
        ),
        // if grid doesn't have a checkbox column type, it will attach
        // one and this configuration will be part of it
        'checkBoxColumnConfig' => array(
            'name' => 'id_envio'
        ),
    ),
    'columns' => array('codigo_envio','cant_articulo','peso_total'),
));
*/ 

/*   ++++++++++++++++++++++    */
?>
<div  class="row">  
<div class="col-md-5">
        <?php
        
        echo $form->datepickerGroup(
                $model, 'fecha_despacho', array(
            'onchange' => 'Fecha()',
            'readonly' => true,
            'class' => 'SoloNumero Bloquear',
            'options' => array('language' => 'es', 'format' => 'dd/mm/yyyy','startView'=>0, 'minViewMode'=>0,  'todayBtn'=>'linked', 'weekStart'=> 0,'startDate'=>date("d/-2m/y") ,'endDate'=>date("d/m/Y")),
            'hint' => 'Por favor haga clic dentro del campo para desplegar el calendario..!!.',
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>

        
    </div>
</div>
<div  class="row">   

     <div class="col-md-5">
         <?php   echo $form->labelEx($model, 'fk_transporte'); ?>
         <?php
                    $criteria = new CDbCriteria;
                   // $criteria->condition = 'padre =3 and hijo in(1,2,3)';
                    $criteria->order = 'placa DESC';
                    echo $form->dropDownList($model, 'fk_transporte', CHtml::listData(Vehiculo::model()->findAll($criteria), 'id_vehiculo', 'placa'), 
                        array(
                        'style'=>'width:383px',    
                        'title' => 'Seleccione Tipo Despacho',
                        'class' => 'span13',
                        'prompt' => 'Cargando...'
                    ));
        ?>
    </div>


    <div class="col-md-5">
            <?php echo $form->textFieldGroup($model,'serial_precinto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>13)))); ?>
   
    </div>
</div>   

<br>
<div  class="row"> 
        
    <div class="col-md-5">  
      <?php echo $form->textFieldGroup($model,'codigo_envio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>13)))); ?>
    </div>

</div>    

<!-- *********************************  -->

<div class="row" align="center" >
    <table width="100%">
        <tr>
            <td width="4%"></td>
            <td width="59%">
                <table id="ListarDespachos" class="table table-bordered table-striped" style="text-align: center;">
                    <thead>
                    <th style="width:15%">Vehiculo</th>
                    <th style="width:20%">Tipo Empaquetado</th>
                    <th style="width:15%">Codigo Empaquetamiento</th>
                    <th style="width:10%">Peso Unitario</th>
                    <th style="width:10%">Destino</th>
                    <th style="width:8%">Acción</th>
                    </thead>
                    
                </table>
            </td>
        </tr>
    </table>
</div>
<!--   ***********************************  -->    
<?php
/*   ++++++++++++++++++++++    */

?>
<br><br>
<div class="form-actions">
    <!-- *********** -->
<?php
$this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' =>$model->isNewRecord ? 'Registrar' : 'Guardar',
    'icon' => 'ok-sign white',
    'size' => 'medium'
));
?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset',
        'context' => 'success',
        'label' => 'Limpiar',
        'size' => 'medium',
        'icon' => 'remove',
            //'id' => 'GuardarForm'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'danger',
        'label' => 'Cancelar',
        'size' => 'medium',
        'id' => 'CancelarForm',
        'icon' => 'ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('site/index') . '";'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
