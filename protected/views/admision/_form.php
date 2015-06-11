<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'admision-form',
	'enableAjaxValidation'=>false,
)); 

 $baseUrl = Yii::app()->baseUrl;
 $numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.numeric.js');
?>
<script>
    var secuencia = 1;
    var cant = 0;
</script>
<?php

Yii::app()->clientScript->registerScript('Paquetes', "

    $(document).ready(function(){
         $('#Admision_peso_admision').numeric();
         $('#Admision_dimension_admision').numeric();
         $('#Admision_precio_admision').val(0.00);
         $('#Admision_peso_admision').val(0);


   /* -----------  Validacion de Precio   ----------------- */
         $('#Admision_peso_admision').focusout(function(){
                 var Paquete_peso = $('#Admision_peso_admision').val();
                 var Paquete_tipo_envio = $('#Admision_tipo_envio').val();
                
                if(parseInt(Paquete_peso) > 0)
                 if(parseInt(Paquete_peso) > 30000){
                     bootbox.alert('Debe Ingresar Peso del Articulo Menor o igual a los 30000 GRS');
                     $('#Admision_peso_admision').val('');
                     return false;
                 }else{
                       /*  --- Calculo El Precio   ---- */

                        if(Paquete_tipo_envio != '')
                          $.ajax({
                                    url: '" . CController::createUrl('Admision/BuscarPrecio') . "',
                                    async: true,
                                    type: 'POST',
                                    data: 'Paquete_peso='+Paquete_peso+'&Paquete_tipo_envio='+Paquete_tipo_envio,
                                    dataType:'json',
                                    success: function(datos){
                                         
                                          if(datos != 'vacio'){
                                            /*  ++ El peso ingresado es menor a 500 grs  ++  */
                                                     
                                              var total = parseFloat(datos['precio_total']);
                                              var unitario = parseFloat(datos['precio_unitario']);
                                              var iva = parseFloat(datos['iva']);
                                             /* alert(total); */
                                             $('#Admision_precio_admision').val(total); 
                                             $('#Admision_precio_unitario').val(unitario); 
                                             $('#Admision_iva').val(iva);       
                                            /*   ++  ++  ++  ++  ++  ++  ++  ++  ++ ++ ++  + */
                                          }
 

                                    }
                                });
                       /*  ---------------------------- */

                 }
         });


         $('#Admision_tipo_envio').focusout(function(){
                 var Paquete_peso = $('#Admision_peso_admision').val();
                 var Paquete_tipo_envio = $('#Admision_tipo_envio').val();
                
                if(parseInt(Paquete_peso) > 0)
                 if(parseInt(Paquete_peso) > 30000){
                     bootbox.alert('Debe Ingresar Peso del Articulo Menor o igual a los 30000 GRS');
                     $('#Admision_peso_admision').val('');
                     return false;
                 }else{
                       /*  --- Calculo El Precio   ---- */

                        if(Paquete_tipo_envio != '')
                          $.ajax({
                                    url: '" . CController::createUrl('Admision/BuscarPrecio') . "',
                                    async: true,
                                    type: 'POST',
                                    data: 'Paquete_peso='+Paquete_peso+'&Paquete_tipo_envio='+Paquete_tipo_envio,
                                    dataType:'json',
                                    success: function(datos){
                                         
                                          if(datos != 'vacio'){
                                            /*  ++ El peso ingresado es menor a 500 grs  ++  */
                                                     
                                             var total = parseFloat(datos['precio_total']);
                                              var unitario = parseFloat(datos['precio_unitario']);
                                              var iva = parseFloat(datos['iva']);
                                             /* alert(total); */
                                             $('#Admision_precio_admision').val(total); 
                                             $('#Admision_precio_unitario').val(unitario); 
                                             $('#Admision_iva').val(iva);       
                                            /*   ++  ++  ++  ++  ++  ++  ++  ++  ++ ++ ++  + */
                                          }
 

                                    }
                                });
                       /*  ---------------------------- */

                 }
         });

   /* ------------------------------------------------------- */

   /* +++++++++++++  Carga dinamica Articulos   ++++++++++++  */
          $('#AddArticulo').click(function(){

            if($('#Admision_peso_admision').val()=='0'){   
                bootbox.alert('Debe Ingresar Peso del Articulo');
                return false;
            }else if($('#Admision_empaque').val()==''){   
                bootbox.alert('Debe Seleccionar Tipo Empaque');
                return false;
            }else if($('#Admision_tipo_envio').val()==''){   
                bootbox.alert('Debe Seleccionar Tipo Envio');
                return false;
            }else if($('#Admision_articulo').val()==''){   
                bootbox.alert('Debe Seleccionar Un Articulo');
                return false;
            }else{
                      /*  ////// Agrego Tabla DInamica  /////  */
                           var Peso = $('#Admision_peso_admision').val();
                           var Tempaque = $('#Admision_empaque').val();  
                           var Articulo = $('#Admision_articulo').val();
                           var Tenvio = $('#Admision_tipo_envio').val();
                           var Precio = $('#Admision_precio_admision').val();
                           var Fentrega = $('#Admision_fecha_entrega').val();
                           var iva = $('#Admision_iva').val();
                           var precio_unitario = $('#Admision_precio_unitario').val();
                           var dimension = $('#Admision_dimension_admision').val();
                           var pagor = $('#Admision_pago_recepcion').val();

                            var Campos1 = '<input type=hidden name=ListPeso[] value=\"'+Peso+'\" class=\"\" />';
                            var Campos2 = '<input type=hidden name=ListTempaque[] value=\"'+Tempaque+'\" class=\"\" />';
                            var Campos3 = '<input type=hidden name=ListArticulo[] value=\"'+Articulo+'\" class=\"cant'+cant+'\" />';
                            var Campos4 = '<input type=hidden name=ListTenvio[] value=\"'+Tenvio+'\"/>';
                            var Campos5 = '<input type=hidden name=ListPrecio[] value=\"'+Precio+'\"/>';
                            var Campos6 = '<input type=hidden name=ListPrecio_unitario[] value=\"'+ precio_unitario+'\"/>';
                            var Campos7 = '<input type=hidden name=ListFentrega[] value=\"'+Fentrega+'\"/>';
                            var Campos8 = '<input type=hidden name=ListDimension[] value=\"'+dimension+'\"/>';
                            var Campos9 = '<input type=hidden name=ListPago[] value=\"'+pagor+'\"/>';
                        

                      
                            Fila = '<tr>'
                                    +'<td>'+$('#Admision_tipo_envio').children(':selected').text()+'</td>'
                                    +'<td>'+$('#Admision_articulo').children(':selected').text()+'</td>'
                                    +'<td>'+$('#Admision_peso_admision').val()+'</td>' 
                                    +'<td>'+precio_unitario+'</td>'
                                    +'<td>'+iva+'</td>'
                                    +'<td>'+$('#Admision_precio_admision').val()+'</td>'
                                    
                                    +'<input type=checkbox id=es_principal'+secuencia+' name=es_principal[] >'
                                    +Campos1
                                    +Campos2
                                    +Campos3
                                    +Campos4
                                    +Campos5
                                    +Campos6
                                    +Campos7
                                    +Campos8
                                    +Campos9
                                    +'<td style=\'text-align:center;\'><img src=\'" . Yii::app()->baseUrl . "/images/borrar.png\' onclick=\'if(confirm(\"¿Se encuentra seguro de eliminar el registro?\")){ $(this).parent().parent().remove();}\' style=\'cursor:pointer;\' title=\'Eliminar\'/></td>'
                                    +'</tr>';
                      
                                    cant++;
                                    secuencia++;

                                    $('#ListarArticulos').append(Fila);
                      /*  /////////////////////////////////// */
                       bootbox.alert('Admision de Paquete Agregado Corectamente!!');
                 }  



             
          });

   /*  +++++++++++++++++++++++++++++++++++++++++++++++++++++ */
  


    }); ");

?>
  
<div  class="row">
    <div class="col-md-5">
        <?php /* echo $form->textFieldGroup($model,'peso_admision',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); */ ?>
          <?php echo $form->textFieldGroup($model,'peso_admision',
                                        array(
                                        'wrapperHtmlOptions' => array(
                                        'class' => 'col-sm-5',
                                        ),
                                        'append' => 'GRS'
                                        )
    ); ?> 

    </div>
    <div class="col-md-5">
         <?php /* echo $form->textFieldGroup($model,'dimension_admision',array('widgetOptions'=>array('mask' => '9.999,99','htmlOptions'=>array('class'=>'span5')),

)); */          echo $form->labelEx($model, 'dimension_admision'); 
                $this->widget('CMaskedTextField', array(
                'model' => $model,
                'attribute' => 'dimension_admision',
                'mask' => '999(A) X 999(L) x 999(A)',
                'htmlOptions' => array('size' => 16,'class'=>'span5 form-control','style'=>'width:383px')
                ));
           
         ?>

    </div>
</div>  

<div  class="row">
    <div class="col-md-5">
         <?php   echo $form->labelEx($model, 'empaque'); ?>
         <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =2 and hijo in(1,2)';
                    $criteria->order = 'hijo ASC';
                    echo $form->dropDownList($model, 'empaque', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'style'=>'width:383px',  
                        'title' => 'Seleccione Tipo Empaque',
                        'class' => 'span13',                        
                        'prompt' => 'Cargando...'
                    ));
        ?>
      <?php // echo $form->textFieldGroup($model,'empaque',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-md-5">
      <?php // echo $form->textFieldGroup($model,'articulo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
         <?php   echo $form->labelEx($model, 'articulo'); ?>
         <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =4 and hijo not in(0)';
                    $criteria->order = 'descripcion ASC';
                    echo $form->dropDownList($model, 'articulo', CHtml::listData(Maestro::model()->findAll($criteria), 'id_maestro', 'descripcion'), 
                        array(
                        'style'=>'width:383px',  
                        'title' => 'Seleccione Articulo',
                        'class' => 'span8',
                        'prompt' => 'Cargando...'
                    ));
        ?>
   </div>
</div>  

<div  class="row">   
    <div class="col-md-5">
          
       <?php   echo $form->labelEx($model, 'tipo_envio'); ?>
         <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =3 and hijo in(1,2,3)';
                    $criteria->order = 'descripcion DESC';
                    echo $form->dropDownList($model, 'tipo_envio', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'style'=>'width:383px',    
                        'title' => 'Seleccione Tipo Envio',
                        'class' => 'span13',
                        'prompt' => 'Cargando...'
                    ));
        ?>
    </div>
    <div class="col-md-5">
       <?php echo $form->textFieldGroup($model,'precio_admision',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => true)))); ?>
       <?php echo $form->hiddenField($model, 'precio_unitario', array('class' => 'span7', 'value' => '')); ?>  
       <?php echo $form->hiddenField($model, 'iva', array('class' => 'span7', 'value' => '')); ?>  
    </div>
</div>     

<div  class="row">
    <div class="col-md-5">
        <?php
        
        echo $form->datepickerGroup(
                $model, 'fecha_entrega', array(
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
    <div class="col-md-5">
       <?php echo $form->checkBoxGroup($model,'pago_recepcion'); ?>

        <div>
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
            <td colspan="2" width="59%">
                <table id="ListarArticulos" align="center" class="table table-bordered table-striped" style="text-align: center;">
                    <thead>
                    <th style="width:15%">Tipo Envio</th>
                    <th style="width:33%">Articulo</th>
                    <th style="width:10%">Peso</th>
                    <th style="width:12%">Precio Unitario</th>
                    <th style="width:7%">Iva</th>
                    <th style="width:15%">Precio Total</th>                    
                    <th style="width:8%">Accion</th>
                    </thead>                    
                </table>
            </td>
        </tr>
    </table>
</div>
<!--   ***********************************  -->

<?php $this->endWidget(); ?>
