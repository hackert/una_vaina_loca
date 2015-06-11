
/* -----------------  Validacion 1   ---------------  */

function LimpiarCamposDiex(cedula,nombre,apellido, clase){
  
   if (cedula !=''){
        $('#'+cedula).val('');
   }
   if (nombre!=''){
        $('#'+nombre).val('');
   }
   if (apellido !=''){
        $('#'+apellido).val('');
   }
   if (clase !=''){
        $('.'+clase).val('');
   }
}

/*  ------------------------------------------------  */
/*  -----------  limpiar campo tipo listado (Input oculto)  -------  */
function limpiar_listado(id_input_oculto){

  if(id_input_oculto != ''){
     $('#'+id_input_oculto).select2("val", ''); 
     
}
}
/*  ------------------------------------------------- */

/*  ------------ Validar telefono  -----------------  */

function telfCheck(telfid){
    
         /* -***********    *************- */
            var datos    = String($('#'+telfid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];           
                if(arredato.length >= 1){
                    
                    for(var cont=0;cont < arredato.length ;cont++){
                        var codigo_telf = arredato[cont].substring(0,4); 
                        
                        /*  +++++++++++++++++++ */
                            if(arredato[cont].length <= 10){
                              bootbox.alert('Debe agregar la cantidad de números correctos para su número de telefono');
                               $('#'+telfid).select2("val", dato_final); 
                              return false;
                            }                                
                       /*  +++++++++++++++++++ */
                       
                       /*  +++++++++++++++++++ */
                            for(var num = 0; num < arredato[cont].length ; num++){ 
                                if(arredato[cont].charCodeAt(num) < 48 ||  arredato[cont].charCodeAt(num) > 57){
                                    bootbox.alert('Debe ingresar solo números');
                                    $('#'+telfid).select2("val", dato_final);
                                    return false;
                                }
                            } 
                       /*  +++++++++++++++++++ */
                            
                       
                       
                        /* +++++++++++++++++++  */
                          /*  if(codArea.indexOf(codigo_telf) == -1){
                              bootbox.alert('Código de área incorrecto');
                              $('#'+telfid).select2("val", dato_final); 
                              return false;
                            } */
                        dato_final[cont] = arredato[cont];
                        
                    }
                }else bootbox.alert('Debe ingresar al menos un valor');                 
            
        /* -****************************- */
    
    $('#'+telfid).select2("val", dato_final);     
}
/*  ------------------------------------------------   */




/* -------------  validacion Correo Electronico   ------------  */

function emailCheck(emailStr,emailid) {
    var checkTLD = 1;
    var knownDomsPat = /^(com|net|org|edu|int|mil|gov|gob|arpa|biz|aero|name|coop|info|pro|museum|COM|NET|ORG|EDU|INT|MIL|GOV|GOB|ARPA|BIZ|AERO|NAME|COOP|INFO|PRO|MUSEUM)$/;
    var emailPat = /^(.+)@(.+)$/;
    var specialChars = "\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
    var validChars = "\[^\\s" + specialChars + "\]";
    var quotedUser = "(\"[^\"]*\")";
    var ipDomainPat = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
    var atom = validChars + '+';
    var word = "(" + atom + "|" + quotedUser + ")";
    var userPat = new RegExp("^" + word + "(\\." + word + ")*$");
    var domainPat = new RegExp("^" + atom + "(\\." + atom + ")*$");
    var matchArray = emailStr.match(emailPat);
    if (matchArray == null) {
     
        bootbox.alert("El Formato del Correo Electronico es Incorrecto.\n \n\
                        El formato Correcto es: Usuario@Servidor.Dominio");
         /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
                 
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */

              
        return false;
    }
    var user = matchArray[1];
    var domain = matchArray[2];
    for (i = 0; i < user.length; i++) {
        if (user.charCodeAt(i) > 127) {
            bootbox.alert("El nombre de usuario contiene caracteres inv\u00e1lidos.");
         /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */
            return false;
        }
    }
    for (i = 0; i < domain.length; i++) {
        if (domain.charCodeAt(i) > 127) {
            bootbox.alert("El nombre de dominio contiene caracteres inv\u00e1lidos.");
         /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */     
            return false;
        }
    }
    if (user.match(userPat) == null) {
        alert("           El Formato del Correo Electronico es Incorrecto\n \n\
       El formato Correcto es Usuario@Servidor.Dominio");
           /* * -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */    
        return false;
    }
    var IPArray = domain.match(ipDomainPat);
    if (IPArray != null) {
        for (var i = 1; i <= 4; i++) {
            if (IPArray[i] > 255) {
                bootbox.alert("La direcci\u00f3n IP es inv\u00e1lida!");
         /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */
                return false;
            }
        }
        return true;
    }
    var atomPat = new RegExp("^" + atom + "$");
    var domArr = domain.split(".");
    var len = domArr.length;
    for (i = 0; i < len; i++) {
        if (domArr[i].search(atomPat) == -1) {
           alert("El nombre de dominio no parece ser v\u00e1lido.");
 
         /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */
            
            return false;
        }
    }
    if (checkTLD && domArr[domArr.length - 1].length != 2 &&
            domArr[domArr.length - 1].search(knownDomsPat) == -1) {
        alert("La direcci\u00f3n debe terminar en un dominio conocido\no c\u00f3digo de pa\u00eds de dos letras.");
               /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */
        return false;
    }
    if (len < 2) {
        alert("Esta direcci\u00f3n no tiene un nombre de host!");
         /* -***********    *************- */
            var datos    = String($('#'+emailid).select2("val"));
            var arredato = datos.split(',');
            var dato_final = [];
                if(arredato.length-1){
                    for(var cont=0;cont < arredato.length-1 ;cont++)
                         dato_final[cont] = arredato[cont];           
                }else dato_final ="";
               
                $('#'+emailid).select2("val", dato_final); 
        /* -****************************- */
        return false;
    } 
    return true;
    
}

/*  --------------------------------------------------------------- */

//RETORNA LA EDAD EN FUNCIÓN DE LA FECHA DE NACIMIENTO EN FORMATO DD/MM/YYYY
function calcula_edad(fecha){
    var fecha = new Date(fecha);
    var actual = new Date();
    var edad = parseInt((actual -fecha)/365/24/60/60/1000);
    return edad;
}
function loadContent(e){

    var tabId = e.target.getAttribute("href");

    var ctUrl = ''; 

    if(tabId == '#tab1') {
        ctUrl = 'url to get tab 1 content';
    } else if(tabId == '#tab2') {
        ctUrl = 'url to get tab 2 content';
    } else if(tabId == '#tab3') {
        ctUrl = 'url to get tab 3 content';
    }

    if(ctUrl != '') {
        $.ajax({
            url      : ctUrl,
            type     : 'POST',
            dataType : 'html',
            cache    : false,
            success  : function(html)
            {
                jQuery(tabId).html(html);
            },
            error:function(){
                    alert('Request failed');
            }
        });
    }

    preventDefault();
    return false;
}


//URL
var http = location.protocol;
var slashes = http.concat("//");
var baseUrl = slashes.concat(window.location.hostname);
if (baseUrl.indexOf('.mpcomunas.gob.ve') == -1) {
    var pathArray = window.location.pathname.split('/');
    var ruta = '/' + pathArray[1]; // /tui
    baseUrl = $(location).attr('href').replace($(location).attr('pathname'), ruta);
}

//REGISTRO DE OBSERVACION
//strObservacion: CAMPO DE TEXTO
//idOrganizacion: CODIGO DE IDENTIFICACION DE LA ORGANIZACION SOCIAL ASOCIADA (CC, COMUNA, ...)
//fkTipoObservacion: VALOR ESTABLECIDO EN MAESTRO REFERENTE A LA UBICACION/PROCESO DEL CUAL SE REALIZARA LA OBSERVACION
//fkTipoOrganizacion: VALOR ESTABLECIDO EN MAESTRO REFERENTE AL TIPO DE ORGANIZACION
//idEntidad: CODIGO DE IDENTIFICACION DEL REGISTRO AL CAUL SE LE REALIZA LA OBSERVACION
//fkTipoEntidad: VALOR ESTABLECIDO EN MAESTRO DE LA ENTIDAD A LA QUE SE HACE REFERENCIA (VOCERO, PROMOTOR, CC, ...)
function nuevaObservacion(strObservacion, idOrganizacion, fkTipoObservacion, fkTipoOrganizacion, idEntidad, fkTipoEntidad){
    //
    if(strObservacion == ''){ $('#error').html('* Indique la observación correspondiente'); return false; }
    var msj = '';
    //
    $.ajax({
        url: baseUrl+'/vocero/agregaObservacion',
        data: 'idOrganizacion='+idOrganizacion+'&strObservacion='+strObservacion+'&fkTipoObservacion='+fkTipoObservacion+'&fkTipoOrganizacion='+fkTipoOrganizacion+'&idEntidad='+idEntidad+'&fkTipoEntidad='+fkTipoEntidad,
        type: 'POST',
        async: false,
        dataType: 'json',
        beforeSend:function(datos){
            $('#btnObservacion').attr('style', 'display:none;');
        },
        success: function(datos){
            if(datos == null || datos == '' || datos == 'undefined'){
                $('#btnObservacion').attr('style', 'display:none;');
                msj = 'Problemas para realizar lo solicitado, inténtelo más tarde. Si el problema persiste comuníquese con el administrador del sistema.';
                alert(msj);
                $('#error').html(msj);
            }else{
                bootbox.alert('El registro se realizó con éxito.');
                $("#myModal").modal('hide');
            }
        },
        complete: function(datos){
            $('#observacion').val('');
            $('#btnObservacion').attr('style', '');
            $.fn.yiiGridView.update("ListarObservacion"); //ACTULIZA EL GridView
        },
    });
}

//CANTIDAD MAXIMA DE CARACTERES EN CAMPO DE TEXTO
function txtAreaLongCad(txtObservacion, txtFeedback, longitudMax){
    var max_caracteres = longitudMax;
    $('#'+txtFeedback).html(max_caracteres + ' caracteres restantes');
    $('#'+txtObservacion).keyup(function() {
        var text_length = $('#'+txtObservacion).val().length;
        var text_remaining = max_caracteres - text_length;
        $('#error').html('');
        $('#'+txtFeedback).html('Le quedan ' + text_remaining + ' caracteres');
    });
}

function listadoObservaciones(ten){
    var tenFinal = (ten == 'undefined')? '' : '/ten/'+ten;
    window.location.href = baseUrl+'/observacion/ListObervacion'+tenFinal;
}

function listadoObservacionPromotor(ten){
    var tenFinal = (ten == 'undefined')? '' : '/ten/'+ten;
    window.location.href = baseUrl+'/observacion/ListObervacionPro'+tenFinal;
}