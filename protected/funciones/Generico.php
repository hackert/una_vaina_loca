<?php

class Generico {
    /*
     * FUNCION QUE PERMITE DAR FORMATO A LA FECHA QUE VIENE DE DATEPICKER
     */

    public function formatoFecha($fechaIn) {
//        var_dump($fechaIn);exit;
        $fecha = $fechaIn; //FECHA SIN FORMATO
        $fechaRemplazando = str_replace('/', '-', $fecha);
        $fechaFormato = explode('-', $fechaRemplazando);
        $dia = $fechaFormato[0];
        $mes = $fechaFormato[1];
        $año = $fechaFormato[2];

        $fechaFormato = date('Y-m-d', strtotime($año . "-" . $mes . "-" . $dia)); //DANDO FORMATO A LA FECHA DE LA CITA

        return $fechaFormato;
    }

    /*     * *
     * FUNCIÓN QUE CALCULA LA EDAD DE LA PERSONA 
     */

    public function calculaEdad($fecha) {
//       $fecha = 2014-04-22;
        list($Y, $m, $d) = explode("-", $fecha);
        return( date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y );
    }

    /*     * *
     * FUNCIÓN QUE PERMITE SABER EL AÑO DE NACIMIENTO DE LA PERSONA
     */
}
?>

