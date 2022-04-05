<?php

$cone = $_POST['db'];

include('conexion.php');//CONEXION A LA BD

$fecha1 = date('Ymd', strtotime($_POST['fecha1']));
$fecha2 = date('Ymd', strtotime($_POST['fecha2']));


switch ($_POST['db']) {

  case "prueba":
    
    $serverName = "192.168.16.5\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"AlamedaBK_24062021","UID"=>"sa","PWD"=>"3.1416.asd*","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

  break;

  case "planta":

    $serverName = "192.168.16.5\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"CERVALLE_CONSOLIDADA","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

  break;

  case "santa_elena":

    $serverName = "192.168.5.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"santa_elena","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

  case "alameda":

    $serverName = "192.168.2.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"alameda","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "independencia":

    $serverName = "192.168.3.250\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"CERVALLE3","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "santa_monica":

    $serverName = "192.168.4.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"santa_monica","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "cdjardin":

    $serverName = "192.168.6.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"cdjardin","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "caney":

    $serverName = "192.168.30.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"caney","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

  default:
    echo "No escogio";
}

if(isset($_POST['generar_reporte']))
{ 
     
     $file = '\\\192.168.16.5\Web\TERCEROS.txt'; 
     //$file = '\\\192.168.16.169\Carpeta-Empresa\cervalle\TERCEROS.TXT';
	
     $reporte=" SELECT *  FROM vistaterceroscguno where fecha_creacion BETWEEN '$fecha1' AND '$fecha2'";     
     $params = array();
     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
     $reporteCsv = sqlsrv_query( $con, $reporte, $params, $options );

     $row_count = sqlsrv_num_rows( $reporteCsv );
     
     $jump = "\r\n";
     $fp = fopen($file, 'w+') or die ("Error al Crear");

     $PLTERC_CODIGO = "             ";
     $PLTERC_SUCURSAL = "  ";
     $PLTERC_NIT = "               ";
     $PLTERC_NIT_DV = " ";
     $PLTERC_TIPO_TERC = " ";
     $PLTERC_IND_RUT = " ";
     //$PLTERC_NOMBRE = "                                                  ";
     $PLTERC_APELLIDO1 = "               ";
     $PLTERC_APELLIDO2 = "               ";
     $PLTERC_NOMBRE = "                    ";
     $PLTERC_NOMBRE_ESTABLEC = "                                                  ";
     $PLTERC_TIPO_IDENT = " ";
     $PLTERC_IND_CLI = " ";
     $PLTERC_IND_PRO = " ";
     $PLTERC_IND_EMPL = " ";
     $PLTERC_IND_ACCIO = " ";
     $PLTERC_IND_VAR = " ";
     $PLTERC_IND_INT = " ";
     $PLTERC_IND_PDV = " ";
     $PLTERC_ESTADO = " ";
     $PLTERC_PAIS = "   ";
     $PLTERC_DPTO = "  ";
     $PLTERC_CIUDAD = "   ";
     $PLTERC_DIRECCION_1 = "                                        ";
     $PLTERC_DIRECCION_2 = "                                        ";
     $PLTERC_DIRECCION_3 = "                                        ";
     $PLTERC_TELEFONO = "               ";
     $PLTERC_FAX = "               ";
     $PLTERC_COD_POSTAL = "          ";
     $PLTERC_EMAIL = "                                                  ";
     $PLTERC_BARRIO = "               ";
     $PLTERC_TELEFONO_2 = "               ";
     $PLTERC_CIIU = "      ";

     $PLTERC_CLASE_C = "      ";
     $PLTERC_CO_C = "   ";
     $PLTERC_ZONA_C = "      ";
     $PLTERC_CALIFICA_C = " ";
     $PLTERC_VEND_C = "    ";
     $PLTERC_CONTACTO_C = "                                        ";
     $PLTERC_CONTACTO_NAC_C = "    ";
     $PLTERC_GRAN_CONTRIB_C = " ";
     $PLTERC_IND_LIQ_IMPTO_C = " ";
     $PLTERC_IND_RETERENTA_C = " ";
     $PLTERC_COD_RETEIVA_C = "  ";
     $PLTERC_COD_RETEICA_C = "  ";
     $PLTERC_COD_RETEOTR_C = "  ";
     $PLTERC_LISTA_PRECIO_C = "   ";
     $PLTERC_LISTA_DSCTO_C = "  ";
     $PLTERC_DSCTOG1_C = "    ";
     $PLTERC_DSCTOG2_C = "    ";
     $PLTERC_ESTADO_V_C = " ";
     $PLTERC_OBSERVA_C = "                                        ";
     $PLTERC_CRITERIO1_C = "    ";
     $PLTERC_CRITERIO2_C = "    ";
     $PLTERC_CRITERIO3_C = "    ";
     $PLTERC_FORMA_PAGO_C = " ";
     $PLTERC_COND_PAGO_C = "  ";
     $PLTERC_IND_CHEPOS_C = " ";
     $PLTERC_DCTOPP_C = "  ";
     $PLTERC_CUPO_CR_C = "           ";
     $PLTERC_DIASG_C = "   ";
     $PLTERC_IND_BCUPO_C = " ";
     $PLTERC_IND_BMORA_C = " ";
     $PLTERC_IND_OC_C = " ";
     $PLTERC_IND_REMISION_C = " ";
     $PLTERC_ESTADO_C = " ";
     $PLTERC_FECHA_BLOQ = "        ";
     $PLTERC_CONTACTO_CRE_C = "                                        ";
     $PLTERC_CONTACTO_NAC_CRE_C = "    ";
     $PLTERC_OBSERVA_CRE_C = "                                        ";


    if ( $row_count == 0 ){

         echo '<script language = javascript>
                    alert("El Archivo se genero en BLANCO");
                    self.location = "terceros.php";
                </script>';
     }

     else{

     while($filaR = sqlsrv_fetch_array( $reporteCsv, SQLSRV_FETCH_ASSOC)){	

         $registro = substr( $filaR['codigo_tercero'].$PLTERC_CODIGO, 0, 13). 
                      substr( $filaR['cod_sucursal'].$PLTERC_SUCURSAL, 0, 2). 
                      substr( $filaR['nit_cedula'].$PLTERC_NIT, 0, 15).
                      substr( $filaR['digito_verificacion'].$PLTERC_NIT_DV, 0, 1).
                      substr( $PLTERC_TIPO_TERC.$filaR['tipo_tercero'], -1).
                      substr( $PLTERC_IND_RUT.$filaR['rut'], -1).
                      mb_substr( $filaR['apellido1_tercero'].$PLTERC_APELLIDO1, 1, 15, "UTF-8").
                      mb_substr( $filaR['apellido2_tercero'].$PLTERC_APELLIDO2, 0, 15, "UTF-8").
                      mb_substr( $filaR['nombre_tercero'].$PLTERC_NOMBRE, 0, 20, "UTF-8").
                      mb_substr( $filaR['nombre_establecimiento'].$PLTERC_NOMBRE_ESTABLEC, 0, 50, "UTF-8").
                      substr( $PLTERC_TIPO_IDENT.$filaR['tipo_identificacion'], -1).
                      substr( $PLTERC_IND_CLI.$filaR['indicador_cliente'], -1).
                      substr( $PLTERC_IND_PRO.$filaR['indicador_proveedor'], -1).
                      substr( $PLTERC_IND_EMPL.$filaR['indicador_empleado'], -1).
                      substr( $PLTERC_IND_ACCIO.$filaR['indicador_accionista'], -1).
                      substr( $PLTERC_IND_VAR.$filaR['indicador_varios'], -1).
                      substr( $PLTERC_IND_INT.$filaR['indicador_interno'], -1).
                      substr( $PLTERC_IND_PDV.$filaR['indicador_pdv'], -1).
                      substr( $filaR['estado_tercero'].$PLTERC_ESTADO, 0, 1).
                      substr( $PLTERC_PAIS."770", -3).
                      //substr( $PLTERC_PAIS.$filaR['cod_pais'], -3).
                      substr( $PLTERC_DPTO."76", -2).
                      //substr( $PLTERC_DPTO.$filaR['cod_dep'], -2).
                      substr( $PLTERC_CIUDAD."001", -3).
                      //substr( $PLTERC_CIUDAD.$filaR['cod_ciudad'], -3).
                      mb_substr( $filaR['direccion_1'].$PLTERC_DIRECCION_1, 0, 40, "UTF-8").
                      mb_substr( $filaR['direccion_2'].$PLTERC_DIRECCION_2, 0, 40, "UTF-8").
                      mb_substr( $filaR['direccion_3'].$PLTERC_DIRECCION_3, 0, 40, "UTF-8").
                      substr( $filaR['telefonoTercero'].$PLTERC_TELEFONO, 0, 15).
                      substr( $filaR['fax'].$PLTERC_FAX, 0, 15).
                      substr( $filaR['codigoPostal'].$PLTERC_COD_POSTAL, 0, 10).
                      mb_substr( $PLTERC_EMAIL.$filaR['email'], 0, 50, "UTF-8").
                      mb_substr( $filaR['barrio'].$PLTERC_BARRIO, 0, 15, "UTF-8").
                      substr( $filaR['telefono_2'].$PLTERC_TELEFONO_2, 0, 15).
                      //substr( $filaR['CIIU'].$PLTERC_CIIU, 0, 6).
                      substr( "999999".$PLTERC_CIIU, 0, 6).

                      //substr( $filaR['claseCliente'].$PLTERC_CLASE_C, 0, 6).
                      substr( "0101".$PLTERC_CLASE_C, 0, 6).
                      substr( $filaR['CentroOperacionPdv'].$PLTERC_CO_C, 0, 3).
                      //substr( $filaR['zonac'].$PLTERC_ZONA_C, 0, 6).
                      substr( "99".$PLTERC_ZONA_C, 0, 6).
                      substr( $filaR['calificacionCLiente'].$PLTERC_CALIFICA_C, 0, 1).
                      //substr( $filaR['codVendedor'].$PLTERC_VEND_C, 0, 4).
                      substr( "FC".$PLTERC_VEND_C, 0, 4).
                      substr( $filaR['nombreContacto'].$PLTERC_CONTACTO_C, 0, 40).
                      substr( $PLTERC_CONTACTO_NAC_C.$filaR['nacimientoContacto'], -4).
                      substr( $PLTERC_GRAN_CONTRIB_C.$filaR['granContribuyente'], -1).
                      substr( $PLTERC_IND_LIQ_IMPTO_C.$filaR['liquidacionImpuesto'], -1).
                      substr( $PLTERC_IND_RETERENTA_C.$filaR['liquidacionRetencion'], -1).
                      substr( $filaR['reteIva'].$PLTERC_COD_RETEIVA_C, 0, 2).
                      substr( $filaR['reteIca'].$PLTERC_COD_RETEICA_C, 0, 2).
                      substr( $filaR['reteotr'].$PLTERC_COD_RETEOTR_C, 0, 2).
                      substr( $filaR['listaPrecio'].$PLTERC_LISTA_PRECIO_C, 0, 3).
                      substr( $filaR['listaDescuento'].$PLTERC_LISTA_DSCTO_C, 0, 2).
                      substr( $PLTERC_DSCTOG1_C.$filaR['tasaDescuentoG1'], -4).
                      substr( $PLTERC_DSCTOG2_C.$filaR['tasadescuentoG2'], -4).
                      substr( $filaR['estadoCliente'].$PLTERC_ESTADO_V_C, 0, 1).
                      substr( $filaR['observacionDatos'].$PLTERC_OBSERVA_C, 0, 40).
                      substr( $filaR['codCriterio_1'].$PLTERC_CRITERIO1_C, 0, 4).
                      substr( $filaR['codCriterio_2'].$PLTERC_CRITERIO2_C, 0, 4).
                      substr( $filaR['codCriterio_3'].$PLTERC_CRITERIO3_C, 0, 4).
                      substr( $PLTERC_FORMA_PAGO_C.$filaR['tipoCartera'], -1).
                      //substr( $filaR['condicionPago'].$PLTERC_COND_PAGO_C, 0, 2).
                      substr( "01".$PLTERC_COND_PAGO_C, 0, 2).
                      substr( $PLTERC_IND_CHEPOS_C.$filaR['indicadorCheque'], -1).
                      substr( $filaR['codDescPago'].$PLTERC_DCTOPP_C, 0, 2).
                      substr( $PLTERC_CUPO_CR_C.$filaR['cupoCr'], -11).
                      substr( $PLTERC_DIASG_C.$filaR['diasGracia'], -3).
                      substr( $PLTERC_IND_BCUPO_C.$filaR['bloqueaCupo'], -1).
                      substr( $PLTERC_IND_BMORA_C.$filaR['bloqueoMora'], -1).
                      substr( $PLTERC_IND_OC_C.$filaR['ordenCompra'], -1).
                      substr( $PLTERC_IND_REMISION_C.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$PLTERC_ESTADO_C, 0, 1).
                      substr( $PLTERC_FECHA_BLOQ.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$PLTERC_CONTACTO_CRE_C, 0, 40).
                      substr( $PLTERC_CONTACTO_NAC_CRE_C.$filaR['contactoNacimiento'], -4).
                      substr( $filaR['observacionCartera'].$PLTERC_OBSERVA_CRE_C, 0, 40).$jump;

                                

         fwrite($fp, $registro); 

     }

     echo '<script language = javascript>
               alert("El Archivo se genero Correctamente.");
                self.location = "index.php";
           </script>';
   }

   fclose($fp);
  
}



?>
