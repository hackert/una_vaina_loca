<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'envio-form',
	'enableAjaxValidation'=>true,
)); 

?> 

<?php
Yii::app()->clientScript->registerScript('Envio', "
      $('.IsNumeric').ready(function(){
         $('#yw0').prop('readonly', true);
         $('#Envio_cant_articulo').val(0); 
         $('#Envio_peso_total').val(0);
      });

/*  ---------------------- */

  $('#Envio_tipo_envio').focusout(function(){

     if($('#Envio_tipo_envio').val() == 1){
          //   valija
         $('#Envio_num_saca').prop('readonly', false);
     }else{
          // individual
         $('#Envio_num_saca').val('');
         $('#Envio_num_saca').prop('readonly', true);
     }


   });



/*  +++++++++++++++++++++++++ */

/*  ------------------------ */

    
//Buscar el Articulo para añadirlo
$('#AddArticulo').click(function(){
    if($('#Envio_codigo_envio').val()==''){
     alert('debe ingresar un codigo de Articulo');
     return false;   
    }

    if($('#Envio_tipo_envio').val() == 1){
        if($('#Envio_num_saca').val()==''){
           alert('debe ingresar Numero de Saca');  
           return false;
        }else{

              /*  ---------- Saca  ------------- */
               $.ajax({
                        url: '" . CController::createUrl('Envio/buscarOrdenes') . "',
                        async: true,
                        type: 'POST',
                        data: 'Envio_codigo_envio='+ $('#Envio_codigo_envio').val(),
                        dataType:'json',
                        success: function(datos){
                             
                              if(datos != 'vacio'){
                                /*  ++ Articulo Registrado y Encontrado  ++  */
                                         
                                  var Articulo = datos['articulo'];
                                  var Destino = datos['estado'];
                                  var Peso_unitario = parseFloat(datos['peso_admision']);
                                  var id_paquete = datos['id_paquete'];

                                  var Campos1 = '<input type=hidden name=ListArticulo[] value=\"'+Articulo+'\" >';
                                  var Campos2 = '<input type=hidden name=ListDestino[] value=\"'+Destino+'\"  >';
                                  var Campos3 = '<input type=hidden name=ListPrecio_unitario[] value=\"'+Peso_unitario+'\"  >';
                                  var Campos4 = '<input type=hidden name=ListId[] value=\"'+id_paquete+'\"  >';
                                                                    

                             
                                       
                                /*   ++  ++  ++  ++  ++  ++  ++  ++  ++ ++ ++  + */

                                Fila = '<tr>'
                                    +'<td>'+datos['cod_paquete']+'</td>'
                                    +'<td>'+datos['articulo']+'</td>'
                                    +'<td>'+'</td>' 
                                    +'<td>'+datos['peso_admision']+'</td>'
                                    +Campos1
                                    +Campos2
                                    +Campos3  
                                    +Campos4
                                    +'<td style=\'text-align:center;\'><img src=\'" . Yii::app()->baseUrl . "/images/borrar.png\' onclick=\'if(confirm(\"¿Se encuentra seguro de eliminar el registro?\")){      $(\"#Envio_cant_articulo\").val(parseInt($(\"#Envio_cant_articulo\").val()) - 1);   $(this).parent().parent().remove();}\' style=\'cursor:pointer;\' title=\'Eliminar\'/></td>'
                                    +'</tr>';
                      
                                    $('#ListarArticulos').append(Fila);
                                  
                                    $('#yw0').prop('readonly', false);
                                    $('#Envio_num_saca').prop('readonly', true);

                                    bootbox.alert('Agrego Articulo');

                                    /*  ++++++++++++++  */
                                       var total_p =  parseInt($('#Envio_peso_total').val()) + parseInt(datos['peso_admision']);
                                       $('#Envio_peso_total').val(total_p);

                                       var total_cant =  parseInt($('#Envio_cant_articulo').val()) + 1;
                                       $('#Envio_cant_articulo').val(total_cant);

                                    /*  ++++++++++++++  */


                              }else{
                                bootbox.alert('El Codigo Ingresado no se encuentra Registrado');
                              }


                        }
               });

              /*  --------------------------- */

             
        }
    }else{
            
             /*  ----------- individual -------------- */
               $.ajax({
                        url: '" . CController::createUrl('Envio/buscarOrdenes') . "',
                        async: true,
                        type: 'POST',
                        data: 'Envio_codigo_envio='+ $('#Envio_codigo_envio').val(),
                        dataType:'json',
                        success: function(datos){
                             
                              if(datos != 'vacio'){
                                /*  ++ Articulo Registrado y Encontrado  ++  */
                                         
                                  var Articulo = datos['articulo'];
                                  var Destino = datos['estado'];
                                  var Peso_unitario = parseFloat(datos['peso_admision']);
                                  var id_paquete = datos['id_paquete'];                                                                

                                  var Campos1 = '<input type=hidden name=ListArticulo[] value=\"'+Articulo+'\" >';
                                  var Campos2 = '<input type=hidden name=ListDestino[] value=\"'+Destino+'\"  >';
                                  var Campos3 = '<input type=hidden name=ListPrecio_unitario[] value=\"'+Peso_unitario+'\"  >';
                                  var Campos4 = '<input type=hidden name=ListId[] value=\"'+id_paquete+'\"  >';
                                  
                                       
                                /*   ++  ++  ++  ++  ++  ++  ++  ++  ++ ++ ++  + */

                                Fila = '<tr>'
                                    +'<td>'+datos['cod_paquete']+'</td>'
                                    +'<td>'+datos['articulo']+'</td>'
                                    +'<td>'+'</td>' 
                                    +'<td>'+datos['peso_admision']
                                    +Campos1
                                    +Campos2
                                    +Campos3
                                    +Campos4
                                    +'</td>'
                                    +'<td style=\'text-align:center;\'><img src=\'" . Yii::app()->baseUrl . "/images/borrar.png\' onclick=\'if(confirm(\"¿Se encuentra seguro de eliminar el registro?\")){ $(this).parent().parent().remove(); $(\"#AddArticulo\").prop(\"readonly\", false);$(\"#yw0\").prop(\"readonly\", true);$(\"#Envio_cant_articulo\").val(0); $(\"#Envio_peso_total\").val(0);}\' style=\'cursor:pointer;\' title=\'Eliminar\'/></td>'
                                    +'</tr>';
                      
                                    $('#ListarArticulos').append(Fila);

                                    $('#AddArticulo').prop('readonly', true);
                                    $('#yw0').prop('readonly', false);
                                    bootbox.alert('Agrego Articulo');

                                    /*  ++++++++++++++  */
                                       var total_p =  parseInt($('#Envio_peso_total').val()) + parseInt(datos['peso_admision']);
                                       $('#Envio_peso_total').val(total_p);

                                       var total_cant =  parseInt($('#Envio_cant_articulo').val()) + 1;
                                       $('#Envio_cant_articulo').val(total_cant);

                                    /*  ++++++++++++++  */

                              }else{
                                 bootbox.alert('El Codigo Ingresado no se encuentra Registrado');
                             
                              }


                        }
               });

              /*  --------------------------- */
      
    } 

}) ");

?>


<?php

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
 <div class="row-fluid">
    <div class="col-md-6">
          <?php   echo $form->labelEx($model, 'tipo_envio'); ?>
         <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =5 and hijo in(1,2,3)';
                    $criteria->order = 'descripcion ASC';
                    echo $form->dropDownList($model, 'tipo_envio', CHtml::listData(Maestro::model()->findAll($criteria), 'id_maestro', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Tipo Envio',
                        'class' => 'span13',
                        'prompt' => 'Cargando...'
                    ));
        ?>
	  <?php // echo $form->textFieldGroup($model,'tipo_envio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-md-6">
      <?php echo $form->textFieldGroup($model,'cant_articulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => true)))); ?>
    </div>
 </div>

<div class="row-fluid">
    <div class="col-md-6">
	 <?php echo $form->textFieldGroup($model,'peso_total',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => true)))); ?>
    </div>
    <div class="col-md-6">
		  <?php
        
        echo $form->datepickerGroup(
            $model, 'fecha_admision', array(
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

<div class="row-fluid">
    <div class="col-md-6">
    	   <?php // echo $form->textFieldGroup($model,'codigo_envio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
         <?php   echo $form->labelEx($model, 'codigo_envio'); ?>
         <?php 
              
                    $criteria = new CDbCriteria;
                    $criteria->condition = ' id_admision NOT IN (select id_admision from track.envio_paquete)'; 

                    $criteria->order = 'cod_paquete ASC';
                    echo $form->dropDownList($model, 'codigo_envio', CHtml::listData(Admision::model()->findAll($criteria), 'cod_paquete', 'cod_paquete'), 
                        array(
                        'title' => 'Seleccione Codigo',
                        'class' => 'span13',
                        'ajax' => array(),
                        'prompt' => 'Cargando...'
                    ));
        
                    ?>
	</div>
  <div class="col-md-6">
    <?php echo $form->textFieldGroup($model,'num_saca',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
    </div>
  </div>
  <div class="row-fluid">
   <div class="col-md-6">
   <div >

        <?php
        $this->widget('booster.widgets.TbButton', array(
            'label' => 'Agregar',
            'context' => 'primary',
            'size' => 'small',
            'icon' => 'plus-sign',
            'htmlOptions' => array('id' => 'AddArticulo')
        ));
        ?>

    </div>

</div>
</div>

<!-- *********************************  -->

<div class="row" align="center" >
    <table width="100%">
        <tr>
            <td width="4%"></td>
            <td width="59%">
                <table id="ListarArticulos" class="table table-bordered table-striped" style="text-align: center;">
                    <thead>
                    <th style="width:15%">Codigo</th>
                    <th style="width:20%">Articulo</th>
                    <th style="width:15%">Destino</th>
                    <th style="width:10%">Peso Unitario</th>
                    <th style="width:8%">Accion</th>
                    </thead>
                    <?php
                    /*if ($data) {
                        foreach ($data as $valor):
                            $esPrincipal = ($valor->es_principal == 1) ? 'PRINCIPAL' : 'SUPLENTE';
                            echo '<tr>'; */
                            /* echo '<td style="text-align: justify;">' . $valor->fkBanco->descripcion . '</td>';
                            echo '<td style="text-align: center;">' . $valor->fkTipoCuenta->descripcion . '</td>';
                            echo '<td style="text-align: center;">' . $valor->nro_cuenta . '</td>';
                            echo '<td style="text-align: center;">' . $esPrincipal . '</td>';
                            echo '<td style="text-align:left;"></td>';  */
                          /*  echo '</tr>';
                        endforeach;
                    }  */
                    ?>
                </table>
            </td>
        </tr>
    </table>
</div>
<!--   ***********************************  -->

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
