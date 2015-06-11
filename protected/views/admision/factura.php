<?php

$pdf = Yii::createComponent('application.vendors.mpdf.mpdf');
$cabecera = '<img src="' . Yii::app()->request->baseUrl . '/images/cintillo_200_admirable.jpg"/>';
$cont = count($data);

$html = "<div style='text-align:center; width:100%; margin-left:0%; margin-top:4%'>
<h4><strong><FONT COLOR='#000080'>Listado Detallado ". $titulo."</FONT></strong></h4><br/>
</div>";
$html.= "<div style='text-align:left;'>
<h7><strong><FONT COLOR='#3A87AD'>" . $cont ." ". $titulo2." encontrados</FONT></strong></h7><br/>
</div>";

$html.= '<table style="text-transform: uppercase; border-top:solid 1px #000;border-left:solid 1px #000; border-right:none; border-bottom:none;" cellpadding="0" cellspacing="0" width="100%">
        <tr>';
$html.='<td style="border-right:solid 1px #000; border-bottom:solid 1px #000; text-align:center;">N&deg;</td>';
$campos = explode(",", $camposSelect);

foreach ($campos as $camposTitulo) {
    $html.= '<td style="border-right:solid 1px #000; border-bottom:solid 1px #000;"><strong>' . strtoupper(str_replace("_", " ", $camposTitulo)) . '</strong></td>';
}
$html.= '</tr>';

$i = 1;
foreach ($data as $datos) {
    $html .= '<tr>';

    $html .= ' <td style="border-right:solid 1px #000; border-bottom:solid 1px #000;">' . $i . '</td> ';
    foreach ($campos as $camposTitulodato) {
        if (($camposTitulodato == 'fecha_constitucion') || ($camposTitulodato == 'fecha_ultima_eleccion') || ($camposTitulodato == 'fecha_ultima_eleccion_vencimiento') || ($camposTitulodato == 'fecha_registro_ultima_eleccion')|| ($camposTitulodato == 'fecha_resgistro_solicitud') || ($camposTitulodato == 'fecha_asig_promotor')) {
            if ($datos[$camposTitulodato]==''){
                $html .= ' <td style="border-right:solid 1px #000; border-bottom:solid 1px #000;"> </td>';
            }else{

            $html .= ' <td style="border-right:solid 1px #000; border-bottom:solid 1px #000;">' . date("d-m-Y", strtotime($datos[$camposTitulodato])) . '</td>';
            }
        } else {
            $html .= ' <td style="border-right:solid 1px #000; border-bottom:solid 1px #000;">' . $datos[$camposTitulodato] . '</td>';
        }
    }
    $html .= ' </tr>';
    $i++;
}

/*  ---------------------   - */


$html .='</table>';
$mpdf = new mPDF('c', 'LETTER', '', '', 10, 10, 10, 15, 15, 5);
$mpdf->mirrorMargins = 1;
$mpdf->SetMargins(5, 50, 30);
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetFooter('Sistema Integrador);
$mpdf->WriteHTML($html);
$mpdf->Output('Factura'.$titulo2.'.pdf', 'D');
exit;
/* ------------------------- - */
?>
