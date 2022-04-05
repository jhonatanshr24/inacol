<?php
include('conexion.php');//CONEXION A LA BD

//$fecha1=$_POST['fecha1'];
//$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{

    $file = '\\\192.168.16.5\Web\ARCHIVO2.txt'; 
     $reporte=" SELECT *  FROM vistaterceroscguno where fecha_creacion BETWEEN '$fecha1' AND '$fecha2'";     
     $params = array();
     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
     $reporteCsv = sqlsrv_query( $con, $reporte, $params, $options );

     $row_count = sqlsrv_num_rows( $reporteCsv );
         

          $jump = "\r\n";
          $separator= "\t";
          $fp = fopen($file, 'a') or die ("Error al Crear");

/**
          $FIBATCH_K1_CONSECUTIVO = "         ";

          $FIBATCH_EMP = "  ";
          $FIBATCH_CO = "   ";
          $FIBATCH_TIPO = "  ";
          $FIBATCH_NRO = "      ";
          $FIBATCH_FECHA = "        ";
          $FIBATCH_TERC_DOC = "             ";
          $FIBATCH_SUC_DOC = "  ";
          $FIBATCH_IND_ANULADO = " ";
          $FIBATCH_VALOR_DOC = "                  ";

          $FIBATCH_CUENTA = "        ";
          $FIBATCH_CO_MOV = "   ";
          $FIBATCH_TERC = "             ";
          $FIBATCH_SUC = "  ";
          $FIBATCH_DETALLE1 = "                                        ";
          $FIBATCH_DETALLE2 = "                                        ";
          $FIBATCH_DC = " ";
          $FIBATCH_VALOR = "                  ";
          $FIBATCH_TASA_IMPRET = "       ";
          $FIBATCH_TASA_BSEIMP = "       ";
          $FIBATCH_BASE_IVARET = "                  ";
          $FIBATCH_VALOR_ME = "                  ";
          $FIBATCH_TASA_CAMBIO = "            ";
          $FIBATCH_TASA_CONVER = "            ";
          $FIBATCH_CCOSTO = "        ";
          $FIBATCH_PROYECTO = "          ";
          $FIBATCH_CPTOFC = "        ";
          $FIBATCH_TIPO_BANCO = "  ";
          $FIBATCH_NRO_BANCO = "      ";


          $FIBATCH_TIPO_CRU_CRUCE = "  ";
          $FIBATCH_NRO_CRUCE = "      ";
          $FIBATCH_CUOTA_CRUCE = "  ";
          $FIBATCH_FECHA_VCTO_CRUCE = "        ";
          $FIBATCH_PREFIJO_PROV = "    "    ;
          $FIBATCH_NRO_PROV = "            ";
          $FIBATCH_VEND_CRUCE = "             ";
          $FIBATCH_FECHA_DES_PP_CRUCE = "        ";
          $FIBATCH_VLRDES_PP_CRUCE = "               ";
          $FIBATCH_CAJA = "   ";
          $FIBATCH_IND_MODO = " ";
          $FIBATCH_MEDPAG = "   ";
          $FIBATCH_COD_BANCO = "    ";
          $FIBATCH_NRO_CHE = "      ";
          $FIBATCH_NRO_REFER = "         ";
          $FIBATCH_NRO_CTACTE = "                    ";
          $FIBATCH_FECHA_REC_CONSIG = "        ";
          $FIBATCH_CO_CPTOF = "   ";
          $FIBATCH_DETALLE1_DOC = "                                                            ";
          $FIBATCH_DETALLE2_DOC = "                                                            ";
          $FIBATCH_FILLER = "                                                                                                                                            ";***/

          $FIBATCH_K1_CONSECUTIVO = str_repeat( " ", 9);

          $FIBATCH_EMP = str_repeat( " ", 2);
          $FIBATCH_CO = str_repeat( " ", 3);
          $FIBATCH_TIPO = str_repeat( " ", 2);
          $FIBATCH_NRO = str_repeat( " ", 6);
          $FIBATCH_FECHA = str_repeat( " ", 8);
          $FIBATCH_TERC_DOC = str_repeat( " ", 13);
          $FIBATCH_SUC_DOC = str_repeat( " ", 2);
          $FIBATCH_IND_ANULADO = str_repeat( " ", 1);
          $FIBATCH_VALOR_DOC = str_repeat( " ", 18);

          $FIBATCH_CUENTA = str_repeat( " ", 8);
          $FIBATCH_CO_MOV = str_repeat( " ", 3);
          $FIBATCH_TERC = str_repeat( " ", 13);
          $FIBATCH_SUC = str_repeat( " ", 2);
          $FIBATCH_DETALLE1 = str_repeat( " ", 40);
          $FIBATCH_DETALLE2 = str_repeat( " ", 40);
          $FIBATCH_DC = str_repeat( " ", 1);
          $FIBATCH_VALOR = str_repeat( " ", 18);
          $FIBATCH_TASA_IMPRET = str_repeat( " ", 6);
          $FIBATCH_TASA_BSEIMP = str_repeat( " ", 6);
          $FIBATCH_BASE_IVARET = str_repeat( " ", 18);
          $FIBATCH_VALOR_ME = str_repeat( " ", 18);
          $FIBATCH_TASA_CAMBIO = str_repeat( " ", 12);
          $FIBATCH_TASA_CONVER = str_repeat( " ", 12);
          $FIBATCH_CCOSTO = str_repeat( " ", 8);
          $FIBATCH_PROYECTO = str_repeat( " ", 10);
          $FIBATCH_CPTOFC = str_repeat( " ", 8);
          $FIBATCH_TIPO_BANCO = str_repeat( " ", 2);
          $FIBATCH_NRO_BANCO = str_repeat( " ", 6);


          $FIBATCH_TIPO_CRU_CRUCE = str_repeat( " ", 2);
          $FIBATCH_NRO_CRUCE = str_repeat( " ", 6);
          $FIBATCH_CUOTA_CRUCE = str_repeat( " ", 2);
          $FIBATCH_FECHA_VCTO_CRUCE = str_repeat( " ", 8);
          $FIBATCH_PREFIJO_PROV = str_repeat( " ", 4);
          $FIBATCH_NRO_PROV = str_repeat( " ", 12);
          $FIBATCH_VEND_CRUCE = str_repeat( " ", 13);
          $FIBATCH_FECHA_DES_PP_CRUCE = str_repeat( " ", 8);
          $FIBATCH_VLRDES_PP_CRUCE = str_repeat( " ", 14);
          $FIBATCH_CAJA = str_repeat( " ", 3);
          $FIBATCH_IND_MODO = str_repeat( " ", 1);
          $FIBATCH_MEDPAG = str_repeat( " ", 3);
          $FIBATCH_COD_BANCO = str_repeat( " ", 4);
          $FIBATCH_NRO_CHE = str_repeat( " ", 6);
          $FIBATCH_NRO_REFER = str_repeat( " ", 10);
          $FIBATCH_NRO_CTACTE = str_repeat( " ", 20);
          $FIBATCH_FECHA_REC_CONSIG = str_repeat( " ", 8);
          $FIBATCH_CO_CPTOF = str_repeat( " ", 3);
          $FIBATCH_DETALLE1_DOC = str_repeat( " ", 60);
          $FIBATCH_DETALLE2_DOC = str_repeat( " ", 60);
          $FIBATCH_FILLER = str_repeat( " ", 140);
        
     while($filaR = sqlsrv_fetch_array( $reporteCsv, SQLSRV_FETCH_ASSOC)){		
           
           $registro =  substr( "004431".$FIBATCH_K1_CONSECUTIVO, 0, 9).
     
                       substr( "03".$FIBATCH_EMP, 0, 2).
                       substr( "001".$FIBATCH_CO, 0, 3).
                       substr( "RC".$FIBATCH_TIPO, 0, 2).
                       substr( "123456".$FIBATCH_NRO, 0, 6).
                       substr( "20220224".$FIBATCH_FECHA, 0, 8).
                       substr( "1143854440".$FIBATCH_TERC_DOC, 0, 13).
                       substr( "00".$FIBATCH_SUC_DOC, 0, 2).
                       substr( "0".$FIBATCH_IND_ANULADO, 0, 1).
                       substr( "+15000000.00".$FIBATCH_VALOR_DOC, 0, 18).

                       substr( "16010000".$FIBATCH_CUENTA, 0, 8).
                       substr( "00".$FIBATCH_CO_MOV, 0, 3).
                       substr( "999999999".$FIBATCH_TERC, 0, 13).
                       substr( "00".$FIBATCH_SUC, 0, 2).
                       substr( "Cliente pago bien".$FIBATCH_DETALLE1, 0, 40).
                       substr( "Cliente pago antes de lo pactado".$FIBATCH_DETALLE2, 0, 40).
                       substr( "D".$FIBATCH_DC, 0, 1).
                       substr( "+1500000.00".$FIBATCH_VALOR, 0, 18).
                       substr( "000.000".$FIBATCH_TASA_IMPRET, 0, 7).
                       substr( "000.000".$FIBATCH_TASA_BSEIMP, 0, 7).
                       substr( "+1300000.00".$FIBATCH_BASE_IVARET, 0, 18).
                       substr( "+1325000.00".$FIBATCH_VALOR_ME, 0, 18). 
                       substr( "+3240.00".$FIBATCH_TASA_CAMBIO, 0, 12).
                       substr( "+55555.666666".$FIBATCH_TASA_CONVER, 0, 12).
                       substr( " ".$FIBATCH_CCOSTO, 0, 8).
                       substr( " ".$FIBATCH_PROYECTO, 0, 10).
                       substr( " ".$FIBATCH_CPTOFC, 0, 8).
                       substr( " ".$FIBATCH_TIPO_BANCO, 0, 2).
                       substr( "00".$FIBATCH_NRO_BANCO, 0, 6).

                       substr( "00".$FIBATCH_TIPO_CRU_CRUCE, 0, 2).
                       substr( "123456".$FIBATCH_NRO_CRUCE, 0, 6).
                       substr( "00".$FIBATCH_CUOTA_CRUCE, 0, 2).
                       substr( " ".$FIBATCH_FECHA_VCTO_CRUCE, 0, 8).
                       substr( " ".$FIBATCH_PREFIJO_PROV, 0, 4).
                       substr( " ".$FIBATCH_NRO_PROV, 0, 12).
                       substr( " ".$FIBATCH_VEND_CRUCE, 0, 13).
                       substr( " ".$FIBATCH_FECHA_DES_PP_CRUCE, 0, 8).
                       substr( " ".$FIBATCH_VLRDES_PP_CRUCE, 0, 14).
                       substr( "00".$FIBATCH_CAJA, 0, 3).
                       substr( "1".$FIBATCH_IND_MODO, 0, 1).
                       substr( " ".$FIBATCH_MEDPAG, 0, 3).
                       substr( " ".$FIBATCH_COD_BANCO, 0, 4).
                       substr( " ".$FIBATCH_NRO_CHE, 0, 6).
                       substr( " ".$FIBATCH_NRO_REFER, 0, 10).
                       substr( " ".$FIBATCH_NRO_CTACTE, 0, 20).
                       substr( " ".$FIBATCH_FECHA_REC_CONSIG, 0, 8).
                       substr( " ".$FIBATCH_CO_CPTOF, 0, 3).
                       substr( " ".$FIBATCH_DETALLE1_DOC, 0, 60).
                       substr( " ".$FIBATCH_DETALLE2_DOC, 0, 60).
                       substr( " ".$FIBATCH_FILLER, 0, 140)      
                      
                     ;

          fwrite($fp, $registro);

     }          
     fclose($fp);
  
}



?>
