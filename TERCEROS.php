<?php

function generartercero($datos,$file){     
          
     $jump = "\r\n";
     $fp = fopen($file, 'w+');

     $PLTERC_CODIGO = "             "; //Codigo del Tercero
     $PLTERC_SUCURSAL = "  "; //Codigo de la Sucursal si es la principal debe ir 00
     $PLTERC_NIT = "               "; //Nit del Tercero
     $PLTERC_NIT_DV = " "; //Digito de Verificacion
     $PLTERC_TIPO_TERC = " "; //Tipo de Tercero 0=Natural; 1=Juridica; 9= No aplica
     $PLTERC_IND_RUT = " "; //Indicador si posee RUT 1=si: 0=no
     $PLTERC_APELLIDO1 = "               "; //Apellido 1 del tercero
     $PLTERC_APELLIDO2 = "               "; //Apellido 2 del tercero
     $PLTERC_NOMBRE = "                    "; //Nombres del Tercero
     $PLTERC_NOMBRE_ESTABLEC = "                                                  "; //Nombre de Establecimiento si la sucursal es la principal
     $PLTERC_TIPO_IDENT = " "; //Codigo Tipo de Identificacion
     $PLTERC_IND_CLI = " "; //Indicador del Cliente 0=No; 1= Si;
     $PLTERC_IND_PRO = " "; //Indicador del Proveedor 0=No; 1= Si;
     $PLTERC_IND_EMPL = " "; //Indicador del Empleado 0=No; 1= Si;
     $PLTERC_IND_ACCIO = " "; //Indicador del Accionista 0=No; 1= Si;
     $PLTERC_IND_VAR = " "; //Indicador de Varios 0=No; 1= Si;
     $PLTERC_IND_INT = " "; //Indicador de Interno 0=No; 1= Si;
     $PLTERC_IND_PDV = " "; //Indicador de Cliente PDV 0=No; 1= Si;
     $PLTERC_ESTADO = " "; //Estado del Tercero (Espacio = Activo X= Inactivo)
     $PLTERC_PAIS = "   "; //Codigo DANE del Pais
     $PLTERC_DPTO = "  "; //Codigo DANE del DPTO
     $PLTERC_CIUDAD = "   "; //Codigo DANE de la Ciudad
     $PLTERC_DIRECCION_1 = "                                        "; //Direccion1 de Correspondencia
     $PLTERC_DIRECCION_2 = "                                        "; //Direccion2 de Correspondencia
     $PLTERC_DIRECCION_3 = "                                        "; //Direccion3 de Correspondencia
     $PLTERC_TELEFONO = "               "; //Telefono del Tercero
     $PLTERC_FAX = "               "; //Fax del Tercero
     $PLTERC_COD_POSTAL = "          ";//Codigo postal del Tercero
     $PLTERC_EMAIL = "                                                  "; //Email del Tercero
     $PLTERC_BARRIO = "               "; //Barrio del Tercero
     $PLTERC_TELEFONO_2 = "               "; //Telefono-2 del Tercero
     $PLTERC_CIIU = "      "; //Codigo CIIU del Tercero, solo obligatorio para personas Juridicas

     $PLTERC_CLASE_C = "      "; //Codigo Clase del Cliente 6 Digitos
     $PLTERC_CO_C = "   "; //Centro de Operacion
     $PLTERC_ZONA_C = "      "; //Codigo Zona
     $PLTERC_CALIFICA_C = " "; //Calificacion del Cliente (A,B,C,D)
     $PLTERC_VEND_C = "    "; //Codigo del Vendedor
     $PLTERC_CONTACTO_C = "                                        "; //Nombre del contacto que compra
     $PLTERC_CONTACTO_NAC_C = "    "; //Mes/Dia Nacimiento de Contacto que compra
     $PLTERC_GRAN_CONTRIB_C = " "; //Indicador de gran Contribuyente 0=No 1=Si
     $PLTERC_IND_LIQ_IMPTO_C = " "; //Indicador de liquidacion de Impuesto 0=No 1=Si
     $PLTERC_IND_RETERENTA_C = " "; //Indicador de Liquidacion de Rentencion por renta 0=No 1=Si
     $PLTERC_COD_RETEIVA_C = "  "; //Codigo Rete Iva
     $PLTERC_COD_RETEICA_C = "  ";//Codigo Rete Ica
     $PLTERC_COD_RETEOTR_C = "  "; //Codigo rete-OTR
     $PLTERC_LISTA_PRECIO_C = "   "; //Codigo lista de Precio
     $PLTERC_LISTA_DSCTO_C = "  "; //Codigo Lista de Descto
     $PLTERC_DSCTOG1_C = "    "; //Tasa descuento global: 2 enteros 2 decimales sin punto
     $PLTERC_DSCTOG2_C = "    "; //Tasa descuento global-2: 2 enteros 2 decimales sin punto
     $PLTERC_ESTADO_V_C = " "; //Estado de Cliente (Espacio = Activo X= Inactivo)
     $PLTERC_OBSERVA_C = "                                        "; //Observacion datos de la venta
     $PLTERC_CRITERIO1_C = "    "; //Codigo de criterio1 es obligatorio si el campo esta catalogado
     $PLTERC_CRITERIO2_C = "    "; //Codigo de criterio2 es obligatorio si el campo esta catalogado
     $PLTERC_CRITERIO3_C = "    "; //Codigo de criterio3 es obligatorio si el campo esta catalogado
     $PLTERC_FORMA_PAGO_C = " "; //Tipo de cartera del cliente 0=Contado 1=Creditos
     $PLTERC_COND_PAGO_C = "  "; //Codigo de la condicion de pago, solo si es credito
     $PLTERC_IND_CHEPOS_C = " "; //Indicador si exige o no cheque postfechado 0=No 1=Si
     $PLTERC_DCTOPP_C = "  "; //Codigo de Descto pronto pago
     $PLTERC_CUPO_CR_C = "           "; //Cupo del Credito si maneja cartera a credito
     $PLTERC_DIASG_C = "   "; //Dias de Gracia solo cartera a credito
     $PLTERC_IND_BCUPO_C = " "; //Bloqueo por Cupo 0=No 1=Si
     $PLTERC_IND_BMORA_C = " "; //Bloqueo por Mora 0=No 1=Si
     $PLTERC_IND_OC_C = " "; //Indicador de exigencia de orden de compra 0=No 1=Si
     $PLTERC_IND_REMISION_C = " "; //Indicador Exige Remision 0=No 1=Si
     $PLTERC_ESTADO_C = " "; //estado de Cartera del Cliente A=Activo B=Bloqueado solo con cartera a credito
     $PLTERC_FECHA_BLOQ = "        "; //Fecha de Bloqueo
     $PLTERC_CONTACTO_CRE_C = "                                        "; //Contacto de cartera del cliente
     $PLTERC_CONTACTO_NAC_CRE_C = "    "; //Mes/Dia nacimiento del contacto de cartera del cliente
     $PLTERC_OBSERVA_CRE_C = "                                        "; //Observaciones datos de cartera del cliente

    
    foreach ($datos as $filaR) {      

         $registro =  substr( $filaR['codigo_tercero'].$PLTERC_CODIGO, 0, 13). 
                      substr( $filaR['cod_sucursal'].$PLTERC_SUCURSAL, 0, 2). 
                      substr( $filaR['nit_cedula'].$PLTERC_NIT, 0, 15).
                      substr( $filaR['digito_verificacion'].$PLTERC_NIT_DV, 0, 1).
                      substr( $PLTERC_TIPO_TERC.$filaR['tipo_tercero'], -1).
                      substr( $PLTERC_IND_RUT.$filaR['rut'], -1).
                      substr( $filaR['apellido1_tercero'].$PLTERC_APELLIDO1, 1, 15).
                      substr( $filaR['apellido2_tercero'].$PLTERC_APELLIDO2, 0, 15).
                      substr( $filaR['nombre_tercero'].$PLTERC_NOMBRE, 0, 20).
                      substr( $filaR['nombre_establecimiento'].$PLTERC_NOMBRE_ESTABLEC, 0, 50).
                      substr( $PLTERC_TIPO_IDENT.$filaR['tipo_identificacion'], -1).
                      substr( $PLTERC_IND_CLI.$filaR['indicador_cliente'], -1).
                      substr( $PLTERC_IND_PRO.$filaR['indicador_proveedor'], -1).
                      substr( $PLTERC_IND_EMPL.$filaR['indicador_empleado'], -1).
                      substr( $PLTERC_IND_ACCIO.$filaR['indicador_accionista'], -1).
                      substr( $PLTERC_IND_VAR.$filaR['indicador_varios'], -1).
                      substr( $PLTERC_IND_INT.$filaR['indicador_interno'], -1).
                      substr( $PLTERC_IND_PDV.$filaR['indicador_pdv'], -1).
                      substr( $filaR['estado_tercero'].$PLTERC_ESTADO, 0, 1).
                      substr( $PLTERC_PAIS.$filaR['cod_pais'], -3).
                      substr( $PLTERC_DPTO.$filaR['cod_dep'], -2).
                      substr( $PLTERC_CIUDAD.$filaR['cod_ciudad'], -3).
                      substr( $filaR['direccion_1'].$PLTERC_DIRECCION_1, 0, 40).
                      substr( $filaR['direccion_2'].$PLTERC_DIRECCION_2, 0, 40).
                      substr( $filaR['direccion_3'].$PLTERC_DIRECCION_3, 0, 40).
                      substr( $filaR['telefonoTercero'].$PLTERC_TELEFONO, 0, 15).
                      substr( $filaR['fax'].$PLTERC_FAX, 0, 15).
                      substr( $filaR['codigoPostal'].$PLTERC_COD_POSTAL, 0, 10).
                      substr( $PLTERC_EMAIL.$filaR['email'], 0, 50).
                      substr( $filaR['barrio'].$PLTERC_BARRIO, 0, 15).
                      substr( $filaR['telefono_2'].$PLTERC_TELEFONO_2, 0, 15).
                      substr( $filaR['CIIU'].$PLTERC_CIIU, 0, 6).

                      substr( $filaR['claseCliente'].$PLTERC_CLASE_C, 0, 6).
                      substr( $filaR['CentroOperacionPdv'].$PLTERC_CO_C, 0, 3).
                      substr( $filaR['zonac'].$PLTERC_ZONA_C, 0, 6).
                      substr( $filaR['calificacionCLiente'].$PLTERC_CALIFICA_C, 0, 1).
                      substr( $filaR['codVendedor'].$PLTERC_VEND_C, 0, 4).
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
                      substr( $filaR['condicionPago'].$PLTERC_COND_PAGO_C, 0, 2).
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

     
   

   fclose($fp);

   return $fp;
  
}



?>
