/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var http = location.protocol;
var slashes = http.concat("//");
var baseUrl = slashes.concat(window.location.hostname);
if (baseUrl.indexOf('.ipostel.gob.ve') == -1) {
    var pathArray = window.location.pathname.split('/');
    var ruta = '/' + pathArray[1]; // /tui
    baseUrl = $(location).attr('href').replace($(location).attr('pathname'), ruta);
}
function ConfirmarSalida(despacho){
 //   alert (despacho);return false;
   if (despacho == '' || despacho == 0){
        bootbox.alert("Disculpe debe agregar un peso de salida para este paquete");
        return false;
        
    }
    $.ajax({
        url: baseUrl + "/BitacoraTransito/BuscarCohicidenciaPeso",
        type: 'POST',
        data: 'despacho=' + despacho,
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data['idTransito']!= null && data['otro']== 1) {
          //     alert(data);return false;
                   var id = data['idTransito'];
                   var estatus = 2;
          $.ajax({
        url: baseUrl + "/BitacoraTransito/ConfirmarSalidaExitosa",
        type: 'POST',
        data: 'id=' + id + '&estatus='+estatus,
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data == 3) {
                bootbox.alert("La salida de este paquete ha sido registrda con éxito");
                 $('#GridViewSalida').yiiGridView('update', {//Actualización automatica griewView
                    data: $(this).serialize()
                });return false;
            }else if(data == 0){
                bootbox.alert("estatus NO actualizado");return false;
                
            }
        },
        error: function(data) {
            alert('error');
        }
    })     
            }else if (data['idTransito']!= null && data['otro']== 2){
                var id = data['idTransito'];
                var estatus = 3;
            //     alert(id);return false;
                
  $.ajax({
        url: baseUrl + "/BitacoraTransito/ConfirmarSalidaExitosa",
        type: 'POST',
        data: 'id=' + id + '&estatus='+estatus,
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data == 3) {
                bootbox.alert("Los pesos de entrada y de salida de este paquete no cohiciden, por favor notifique el motivo de este evento.");
                 $('#GridViewSalida').yiiGridView('update', {//Actualización automatica griewView
                    data: $(this).serialize()
                });
                return false;
            }else if(data == 0){
                bootbox.alert("estatus NO actualizado");return false;
                
            }
        },
        error: function(data) {
            alert('error');
        }
    })  
             //   bootbox.alert("EL PESO NOOOO COHINCIDE");return false;
            }
        },
        error: function(data) {
            alert('error');
        }
    })

}
function AgregarAprtura(cod_despacho, motivo, estatus,observ) {
   // alert(cod_despacho);return false;
      if (motivo == '') {
        bootbox.alert("Igrese el motivo por el cual esta realizando esta apertura");
        return false;
    } else if (estatus == '') {
        bootbox.alert("registrar estatus");
        return false;
    } else if (observ == '') {
        bootbox.alert("detalle el caso de la apertura en el campo de observación");
        return false;
    
}
    $.ajax({
        url: baseUrl + "/Apertura/InsertApertura",
        type: 'POST',
        data: 'cod_despacho=' + cod_despacho + '&motivo='+motivo + '&estatus='+estatus + '&observ='+observ,
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data == 1) {
                bootbox.alert("Guardado con éxito");return false;
            }
        },
        error: function(data) {
            alert('error');
        }
    })
}
function AgregarPaquetes(paquete, peso, fechaLlegada) {
//alert(paquete);return false;
    if (paquete == '') {
        bootbox.alert("Debe ingresar el codigo del paquete");
        return false;
    } else if (peso == '') {
        bootbox.alert("Igrese el peso correspondiente");
        return false;
    } else if (fechaLlegada == '') {
        bootbox.alert("registrar la fecha en que llego el paquete");
        return false;
    } else if (paquete != '') {
        // alert(paquete);return false;
        $.ajax({
            url: baseUrl + "/Envio/BuscarCodPaquete",
            type: 'POST',
            data: 'paquete=' + paquete,
            async: true,
            dataType: 'json',
            success: function (data) {
                if (data != null  && data != 0) { /*si la busqueda es exitosa en despacho busco en bitacora*/
        //   alert('dfd');return false;
                    var idEnvio = data;
         $.ajax({
             
                        url: baseUrl + "/Despacho/BuscarCodDespacho",
                        type: 'POST',
                        data: 'idEnvio=' + idEnvio,
                        async: true,
                        dataType: 'json',
                        success: function (data){
                            if(data != null){
                                var idDespacho = data;
                           
                    $.ajax({
                        url: baseUrl + "/BitacoraTransito/BuscarSiExistePaquete",
                        type: 'POST',
                        data: 'idDespacho=' + idDespacho,
                        async: true,
                        dataType: 'json',
                        success: function (data) {

                         /*   if (data == 2) { /*si la busqueda es exitosa buscamos que no se ya se encuentre registrado en bitacora*/
                               // bootbox.alert("Disculpe el paquete que intenta agregar se encuentra en revisión");
                               // return false;
                           // } else*/
                                if(data == 3){
                                  bootbox.alert("El código que ah ingresado ya se encuentra registrado como entrada en esta oficina");
                                return false;
                                
                            }else if (data['sede'] != null) {
                                var sede = data['sede'];
                                    $.ajax({
                                    url: baseUrl + "/BitacoraTransito/InsertEntradas",
                                    type: 'POST',
                                    data: 'idDespacho=' + idDespacho + '&peso=' + peso + '&fechaLlegada=' + fechaLlegada + '&sede='+sede,
                                    async: true,
                                    dataType: 'json',
                                    success: function (data) {
                                        if (data == 1) {                                    
                                              $('.Limpiar').val('');
                                            bootbox.alert("La entrada del paquete se ha registrado con éxito");
                                            $('#EntradaPaquetes').yiiGridView('update', {//Actualización automatica griewView
                                                data: $(this).serialize()
                                            });
                                            return false;
                                        }
                                    },
                                    error: function (data) {
                                        alert('error');
                                    }
                                })

             } 
             
                           /* else { /*si no esta resgitrado el codigo se procede a regitrarlo como entrada de paquete para la oficina en cuention*/
//                                $.ajax({
//                                    url: baseUrl + "/BitacoraTransito/InsertEntradas",
//                                    type: 'POST',
//                                    data: 'paquete=' + paquete + '&peso=' + peso + '&fechaLlegada=' + fechaLlegada,
//                                    async: true,
//                                    dataType: 'json',
//                                    success: function (data) {
//                                        if (data == 1) {                                    
//                                              $('.Limpiar').val('');
//                                            bootbox.alert("La entrada del paquete se ha registrado con éxito");
//                                            $('#EntradaPaquetes').yiiGridView('update', {//Actualización automatica griewView
//                                                data: $(this).serialize()
//                                            });
//                                            return false;
//                                        }
//                                    },
//                                    error: function (data) {
//                                        alert('error');
//                                    }
//                                })

                          //  }
                      },
                        error: function (data) {
                            alert('error');
                        }
                    })
                     }else{
                                    bootbox.alert("no existe");
                                return false;
                            }
                            
                        },
             
         })


                } else if (data == 0){
                    bootbox.alert("El código del paquete que ha ingresado no se encuentra registrado, por favor verifique");
                    return false;

                }
            },
            error: function (data) {
                alert('error');
            }
        })
    }


}

