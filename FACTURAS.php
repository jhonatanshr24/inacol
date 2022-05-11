<?php

function generarfactura($datos,$file){     
          
     $jump = "\r\n";
     $fp = fopen($file, 'w+');

     $K1_CONSECUTIVO:'000000000'; //*Consecutivo 

     $EMP_MOV:'  '; //*Empresa del documento
     $CO_MOV:'  '; //*Centro de Operacion del Documento
     $TIPO_MOV:'  '; //*Tipo de Documento
     $NRO_MOV:'000000'; //*Numero del Documento
     $TERC_DOC:'             '; //*Tercero del Documento
     $SUC_DOC:'00'; //Sucursal del Tercero del Documento principal es 00
     $FECHA_MOV:'00000000'; //Fecha del Documento 8 digitos (AAAAMMDD)
     $LAPSO_MOV:'000000'; //Lapso del Documento 8 digitos (AAAAMMDD)
     $LOTE_DOC:'        '; //Referencia del Documento
     $DCTO_ALT_DOC:'        '; //Documento Alterno
     $NOMCLI_DOC:'                                        '; //Contado puede ir en blanco
     $NITCLI_DOC:'             '; //Identificacion Contado se usa si el Docto es contado o tipo=9
     $VALOR_DOC:'00000000000000000+'; //*Valor del Documento 15 entero 2 decimales y signo (+ o -)
     $IND_ANULADO:'0'; //*Indicador de Anulado 'X' para doctos anulados
     $FILLER_DOC:'                   '; //Interno va en espacios
     $ORIGEN_DOC:'   '; //Interno va en espacios

     $CUENTA_MOV:'        '; //*Cuenta Contable
     $TERC_MOV:'             '; //*Puede ir en espacio si maneja indicador de tercero=2 sino es *
     $SUC_MOV:'00'; //En 00 si el tercero es la principal
     $CO_MOVTO_MOV:'   '; //*Debe contener el centro de operacion a afectar
     $DC_MOV:' '; //*Naturaleza D=Debito C=Credito  
     $VALOR_MOV:'00000000000000000+'; //*Valor Transaccion 15 entero 2 decimales y signo (+ o -)
     $VALOR_ME_MOV:'00000000000000000+'; //maneja moneda extranjera llenar con el valor de la moneda
     $TASA_CONVER_MOV:'00000000000+'; //Tasa de Conversion opcional si maneja moneda extranjera
     $TASA_CAMBIO_MOV:'00000000000+'; //Tasa de cambio si maneja moneda extranjera
     $BASE_IVARET_MOV:'00000000000000000+'; //Si es de impto/rete va con valor base sino 0
     $TASA_IMPRET_MOV:'000000'; //Tasa de impuestos debe contener el valor base de lo contrario 0
     $TASA_BSEIMP_MOV:'000000';//Si la cta es de retenciones entonces debe contaner la base del IVA
     $CANTIDAD_MOV:'0000000000000+'; //Es * si la cuenta maneja estadisticas  en cantidad
     $DETALLE1_MOV:'                                        '; //Observacion de la transaccion
     $DETALLE2_MOV:'                                        '; //Observacion de la transaccion
     $CCOSTO_MOV:'        '; //Si la cuenta maneja CC es * Si no va en espacios 
     $CPTOFC_MOV:'        '; //Concepto de flujo de caja si la cuenta maneja  es de caja/banco
     $DESC_CPTOFC_MOV:'                                        '; //Descripcion flujo de caja
     $PROYECTO_MOV:'          '; //Proyecto si la cuenta maneja puede ir
     $DESC_PROYECTO_MOV:'                                        '; //Descripcion del proyecto
     $TIPO_BANCO_MOV:'  '; //Tipo de Docto conciliacion puede ser CG, CH, ND, NC
     $NRO_BANCO_MOV:'000000'; //Numero de Dcto de conciliacion
     $PREFIJO_PROV_MOV:'    '; //Prefijo del documento del proveedor
     $NRO_PROV_MOV:'            '; //Numero de Documento del proveedor
     $FILLER_MOV:'                              '; //Es espacios

     $TIPO_CRU_CRUCE:'  '; //Tipo de Docto Cruce es * si la cuenta es CXC CXP
     $NRO_CRU_CRUCE:'000000'; //Numero Docto Cruce
     $NRO_CUOTA_CRU_CRUC:'00'; //Numero de Cuota Docto Cruce
     $FECHA_VCTO_CRUCE:'00000000'; //Fecha de Vencimiento
     $VEND_CRUCE:'             '; //Codigo del Tercero/Vendedor
     $TERC_CP_CRUCE:'             '; //Tercero Cliente/Proveedor
     $SUC_CP_CRUCE:'00'; //Sucursal Cliente/Proveedor
     $IND_ANT_CRUCE:'0'; //Ind de Anticipo 0=NO 1=SI
     $REFER_ANT_CRUCE:'           '; //Referencia de Anticipos
     $DIASG_CRUCE:'000'; //Dias de Gracia
     $FECHA_DES_PP_CRUCE:'00000000'; //Fecha del descuenti
     $VLRDES_PP_CRUCE:'0000000000000+'; //Valor dscto pronto pago
     $VLRDES_PP_ME_CRUCE:'0000000000000+'; //Valor Moneda Dsto pronto pago
     $FECHA_DOC_CRUCE:'00000000'; //Fecha del documento cruce
     $IND_CHQ_POSF:' '; //En espacios
     $FILLER_CRUCE:'           '; //En espacios

     $NRODOC_CRU_DIF:'            '; //Documento del Diferido
     $NRO_CUOTA_CRU_DIF:'00'; //Nro de cuota del Diferido
     $FECHA_INICIAL_DIF:'00000000'; //Fecha Incial
     $FECHA_FINAL_DIF:'00000000'; //Fecha Final
     $CUENTA_CONTRA_DIF:'        '; //Cuenta contra del diferido
     $TERC_CONTRA_DIF:'             '; //Tercero Contra
     $SUC_CONTRA_DIF:'00'; //Sucursal Contra
     $CO_CONTRA_DIF:'   '; //Centro de Operacion Contra
     $CCOSTO_CONTRA_DIF:'        '; //Centro de Costo Contra
     $PROYECTO_CONTRA_DIF:'          '; //Proyecto Contra
     $DESC_PROYECTO_DIF:'                                      '; //Descripcion del protecto
     $FECHA_ANT_ULTAMO:'00000000'; //Fecha Anterior ultima amortizacion
     $FECHA_ULTAMO:'00000000'; //Fecha Ultima Amortizacion
     $FILLER_DIF:'                    '; //En espacio

     $CAJA:'   ';  //Codigo de Caja
     $CTABAN:'   '; //Codigo Cuenta Bancaria
     $NAT:' '; //Naturaleza Transaccion E=Entrada S=Salida
     $FECHA_REC_CONSIG:'00000000'; //Fecha Recaudo/Consignacion

     $IND_MODO:' '; //*Indicador del Modo 1=Efectivo 2=Cheque 3=Otros 5=Consignacion
     $IND_MVTO:' '; //*Indiciador del Movimiento 0=Caja 1=Bancos
     $TIPO_MVTO:' '; //Tipo de Movimiento 1=Efectivo 2=Cheques 3=Otros
     $MEDPAG:'   '; //Es * si es una entrada de caja "Medio de pago"
     $COD_BANCO:'    '; //Codigo de banco del cheque 
     $NRO_CHE:'000000'; //Numero del Cheque
     $COD_MOTIVO:'   '; //Codigo del motivo de Devolucion del cheque
     $NRO_CONSIGNACION:'000000'; //Numero de consignacion
     $NRO_REFER:'          '; //Referencia de la Consignacion
     $NRO_CTAOTR:'                    '; //Numero de Cuenta Otra
     $AUTORIZACION:'               '; //Autorizacion
     $NRO_CTACTE:'                    '; //Numeor de cuenta Ahorros/Corriente
     $FEC_CONSIG:'00000000'; //Fecha a consignar del cheque
     $FILLER_TES:'                    '; //En Espacios

     $NIT_TER:'                    '; //*Nit del Tercero no puede repetirse a no ser que sea sucursal
     $NIT_DV_TER:'0'; //*Digito de Verificacion
     $IDENT_TERCERO_TER:' ';  //*Tipo de Identificacion del Tercero A=Alfanumerico N=Numerico

     $K3_NOMBRE1_TER:'                                                  '; //*Nombre Comple del Tercero 
     $K4_NOMBRE2_TER:'                                                  '; //*Nombre comple del estableci
     $APELLIDO1_TER:'               '; //Apellidos del Tecero 
     $APELLIDO2_TER:'               '; //Apellidos del Tercero
     $NOMBRES_TER:'                    '; //Nombres del Tercero
     $TIPO_TERC_TER:'0'; //*Tipo de Tercero 0=Persona Natural 1=Juridica 9=No Aplica
     $TIPO_IDENT_TER:'0'; //*Codigo del Tipo de Identificacion
     $IND_CLI_TER:'0'; //0=No 1=Si  Indicador de Cliente
     $IND_PRO_TER:'0'; //0=No 1=Si  Indicador de proveedor
     $IND_EMPL_TER:'0'; //0=No 1=Si  Indicador de Empleado
     $IND_ACCIO_TER:'0'; //0=No 1=Si  Indicador de Accionista
     $IND_VAR_TER:'0'; //0=No 1=Si  Indicador de Varios
     $IND_INT_TER:'0'; //0=No 1=Si  Indicador de Interno
     $IND_TARJ_TER:'0'; //0=No 1=Si  Indicador de Tarjeta Habiente
     $ESTADO_TER:' '; //Estado del Tercero 'X'=Inactivo
     $FECHA_CRE_TER:'00000000'; //*Fecha de Creacion del Tercero
     $PAIS_TER:'000'; //*Pais codigo DANE
     $DPTO_TER:'00'; //*Departamento codigo DANE
     $CIUDAD_TER:'000'; //*Ciudad Codigo DANE
     $DIRECCION_1_TER:'                                        '; //*Direccion1 de correspondencia
     $DIRECCION_2_TER:'                                        '; //Direccion2
     $DIRECCION_3_TER:'                                        '; //Direccion3
     $TELEFONO_TER:'               '; //Telefono del Tercero
     $FAX_TER:'               '; //Fax del Tercero
     $COD_POSTAL_TER:'          '; //Codigo Postal
     $EMAIL_TER:'                                                  '; //Direccion Electronica del Tercero
     $IND_SUC_TER:'0'; //*Indicador de Sucursal del cliente 0=No 1=Si
     $BARRIO_TER:'               '; //Barrio del Tercero
     $TELEFONO_2_TER:'               '; //Telefono2 del Tercero
     $IND_SUC_P_TER:'0'; //Indicador de sucursal del proveedor 0=No 1=Si
     $CIIU_TER:'               '; // es * solo si es proveedor codigo CIIU del tercero
     $FILLER_TER:'                                                          '; //En Espacio

     $CLASE_C_TER:'      '; //Clase del cliente * si es cliente
     $CO_C_TER:'   '; //Centro de Operacion * Si es Cliente
     $ZONA_C_TER:'      '; //Cod Zona Subzona * si es cliente
     $VEND_C_TER:'    '; //Codigo del vendedor Asociado al cliente
     $CONTACTO_C_TER:'                                        '; //Nombre del contacto del cliente
     $CALIFICA_C_TER:' '; //Calificacion del Cliente (A,B,C,D)
     $FILLER_RETIVA_C_TER:'0'; //Interno ceros
     $FILLER_RETFTE_C_TER:'0'; //Interno ceros
     $IND_FILLER_C_TER:'000'; //Interno ceros
     $COND_PAGO_C_TER:'  '; //Codigo de la condicion de pago 
     $OBSERVA_C_TER:'                                        '; //Observacion del Cliente
     $DIASG_C_TER:'000'; //Dias de Gracia
     $CUPO_CR_C_TER:'00000000000'; //Cupo Credito
     $CRITERIO1_C_TER:'    '; //Cod de Criterio1 * si es cliente
     $CRITERIO2_C_TER:'    '; //Cod de Criterio1 * si es cliente
     $CRITERIO3_C_TER:'    ';//Cod de Criterio1 * si es cliente
     $IND_BCUPO_C_TER:'0'; //*si tiene cupo credito puede ser 0=No 1=Si
     $IND_BMORA_C_TER:'0'; //*si tiene dias de gracia puede ser 0=No 1=Si
     $ESTADO_C_TER:' '; //Estado del Tercero X=Inactivo
     $IND_OC_C_TER:'0'; //*Exige Orden de Compra 0=No 1=Si
     $IND_REMISION_C_TER:'0'; //*Exige Remision 0=No 1=Si 2=Fac Unificada
     $LISTA_PRECIO_C_TER:'   '; //*Codigo de lista de precio
     $LISTA_DSCTO_C_TER:'  '; //Codigo lista de descuento
     $IND_DSCTOG_C_TER:'0'; //*Ind Descto Global  0=No 1=Si
     $DSCTOG1_C_TER:'9999'; //*Tasa Desto Global Si maneja dscto global 9999
     $IND_EXCLUIDO_C_TER:'0'; //*Ind excluidos Imptos 0=No 1=Si
     $FORMA_PAGO_C_TER:'0'; //*Forma de Pago 0=Contado 1=Credito
     $IND_ANTICIPO_C_TER:'0'; //*Ind Anticipo 0=No 1=Si
     $IND_CHEPOS_C_TER:'0'; //*Cheque posfechados 0=No 1=Si
     $MONEDA_C_TER:'  '; //Cod Moneda
     $OBSERVA_VTA_C_TER:'                                        '; //Observacion de Venta
     $OBSERVA_CRE_C_TER:'                                        '; //Observacion
     $DCTOPP_C_TER:'  '; //Codigo de Descto Pronto Pago
     $IND_RETICA_C_TER:'0'; //Rete ICA 0=No 1=Si 2=Reg Simplificado
     $RUTA_VIS_C_TER:'0000'; //Cod Ruta de Visita
     $RUTA_TRA_C_TER:'0000'; //Codigo de Ruta de Transporte
     $BARRIO_C_TER:'               '; //Codigo Barrio Cliente
     $ESTADO_V_C_TER:' '; //Estado de la Cartera B=Bloqueado
     $CONTACTO_NAC_C_TER:'0000'; //MES/DIA nacimiento Contacto 
     $CONTACTO_CRE_C_TER:'                                        '; //Contacto del Cliente
     $CONT_NAC_CRE_C_TER:'0000'; //MES/DIA nacimiento Contacto 
     $DSCTOG2_C_TER:'9999'; //Desto Global
     $FECHA_BLOQ_C_TER:'00000000'; //Fecha de Bloqueo
     $PUNTO_ENVIO_C_TER:'    '; //Punto de Envio Cliente

     $CLASE_P_TER:'      '; //Clase del proveedor *si es cliente
     $CONTACTO_P_TER:'                                        '; //Contacto del proveedor
     $IND_REGIM_SIMP_P_TER:'0'; //*Regimen Simplificado 0=No 1=Si
     $IND_AUTORET_P_TER:'0'; //Interno Ceros
     $IND_RETIVA_P_TER:'0'; //Interno Ceros
     $IND_RETICA_P_TER:'0'; //Interno Ceros
     $COND_PAGO_P_TER:'  '; //Condicion de Pago
     $DIASG_P_TER:'000'; //Dias de Gracia
     $CUPO_CR_P_TER:'00000000000'; //Cupo Credito del Proveedor
     $MONEDA_P_TER:' '; //Cod Moneda
     $ESTADO_P_TER:' '; //Estado del Provedor X=Inactivo
     $OBSERVA_P_TER:'                                        '; //Observacion
     $IND_CONSIGNA_P_TER:'0'; //Interno Ceros
     $FILLER_RETICA_P:'  '; //Interno
     $DESA_FE_P:'  '; //Interno 
     $DEST_FE_P:'        '; //Interno
     $DSCTO_OTORG_P:'9999'; //Descuento otorgado
     $METODO_PAGO_P:'0'; //Metodo de Pago 0=Efectivo 1=Cheque 2=Pago Electronico 3=Otros
     $NRO_CTA_PAGO_P:'0'; //Numero de cta del Proveedor
     $FORMA_PAGO_P:'0'; //Interno ceros

     $CIUDAD_EXP_E_TER:'                    '; //Ciudad Expedicion
     $FECHA_ING_E_TER:'00000000'; //Fecha de Ingreso AAAAMMDD
     $FECHA_NAC_E_TER:'00000000'; //Fecha de Nacimiento AAAAMMDD
     $PAIS_E_TER:'000'; //*Codigo Pais Origen DANE
     $DPTO_E_TER:'00'; //*Codigo Departamento Origen DANE
     $CIUDAD_E_TER:'000';//*Codigo Ciudad Origen DANE
     $SEXO_E_TER:' '; //Sexo M=Masculino F=Femenino
     $EST_CIVIL_E_TER:' '; //Estado Civil 1=Soltero 2=Casado 3=Viudo 4=Divorciado 5=Union Libre
     $RUTA_E_TER:' '; //Ruta
     $RUTA_ORD_E_TER:'000'; //Orden de Transporte
     $CARGO_E_TER:'    '; //Cargo del empleado
     $FILLER_E_TER:'                                                  '; //Interno Espacios

     $GRAN_CONTRIB_C_TER:'0'; //*Ind gran contribuyente  0=No 1=Si
     $IND_RETERENTA_C_TER:'0'; //*Ind Retencion por Renta 0=No 1=Si 
     $COD_RETEIVA_C_TER:'  '; //Codigo de Retencion de IVA
     $COD_RETEICA_C_TER:'  '; //Codigo de Retencion de ICA
     $COD_RETEOTR_C_TER:'  '; //Codigo de Retencion de otras Ejemplo BNA
     $IND_LIQ_IMPTO_C_TER:'0'; //*Ind de liquidacion de Impuestos 0=No 1=Si

     $GRAN_CONTRIB_P_TER:'0'; //*Ind Gran contribuyente 0=No 1=Si
     $IND_RETERENTA_P_TER:'0'; //*Ind por retencion por Renta 0=No 1=Si
     $COD_RETEIVA_P_TER:'  '; //Cod retencion IVA
     $COD_RETEICA_P_TER:'  '; //Cod Retencion ICA
     $COD_RETEOTR_P_TER:' '; //Cod Retencion Otras
     $DETALLE1_DOC:'                                                            '; //Detalle Adicional
     $DETALLE2_DOC:'                                                           '; //Detalle Adicional
     $PROYECTO_CO_MOV:'   '; //Proyecto del Movimiento

     $VEN_COB_COM:'             '; //Solo aplica para Recibos de Caja
     $FEC_REC_CONSIG:'00000000'; //Solo aplica para recibos de Caja

    
    foreach ($datos as $filaR) {      

         $registro =  substr( $filaR['consecutivo'].$K1_CONSECUTIVO, 0, 9).

                      substr( $filaR['emp_mov'].$EMP_MOV, 0, 2). 
                      substr( $filaR['co_mov'].$CO_MOV, 0, 3).
                      substr( $filaR['tipo_mov'].$TIPO_MOV, 0, 2).
                      substr( $filaR['nro_mov'].$NRO_MOV, 0, 6).
                      substr( $filaR['ter_doc'].$TERC_DOC, 0, 13).
                      substr( $filaR['sucursal_ter_doc'].$SUC_DOC, 0, 2).
                      substr( $filaR['fecha_mov'].$FECHA_MOV, 0, 8).
                      substr( $filaR['lapso_mov'].$LAPSO_MOV, 0, 6).
                      substr( $filaR['lote_doc'].$LOTE_DOC, 0, 8).
                      substr( $filaR['docto_alt'].$DCTO_ALT_DOC, 0, 8).
                      substr( $filaR['nomcli_doc'].$NOMCLI_DOC, 0, 40).
                      substr( $filaR['nitcli_doc'].$NITCLI_DOC, 0, 13).
                      substr( $filaR['valor_doc'].$VALOR_DOC, 0, 18).
                      substr( $filaR['ind_anulado'].$IND_ANULADO, 0, 1).
                      substr( $filaR['filler_doc'].$FILLER_DOC,0, 19).

                      substr( $filaR['cuenta_mov'].$CUENTA_MOV, 0, 8).                      
                      substr( $filaR['terc_mov'].$TERC_MOV, 0, 13).
                      substr( $filaR['suc_mov'].$SUC_MOV, 0, 2).
                      substr( $filaR['co_mvto_mov'].$CO_MOVTO_MOV, 0, 3).
                      substr( $filaR['dc_mov'].$DC_MOV, 0, 1).
                      substr( $filaR['valor_mov'].$VALOR_MOV, 0, 18).
                      substr( $filaR['valor_me_mov'].$VALOR_ME_MOV, 0, 18).
                      substr( $filaR['tasa_conver_mov'].$TASA_CONVER_MOV, 0, 12).
                      substr( $filaR['tasa_cambio_mov'].$TASA_CAMBIO_MOV, 0, 12).
                      substr( $filaR['base_ivaret_mov'].$BASE_IVARET_MOV, 0, 18).
                      substr( $filaR['tasa_impret_mov'].$TASA_IMPRET_MOV, 0, 6).
                      substr( $filaR['tasa_bseimp_mov'].$TASA_BSEIMP_MOV, 0, 6).
                      substr( $filaR['cantidad_mov'].$CANTIDAD_MOV, 0, 14).
                      substr( $filaR['detalle1_mov'].$DETALLE1_MOV, 0, 40).
                      substr( $filaR['detalle2_mov'].$DETALLE2_MOV, 0, 40).
                      substr( $filaR['ccosto_mov'].$CCOSTO_MOV, 0, 8).
                      substr( $filaR['cptofc_mov'].$CPTOFC_MOV, 0, 8).
                      substr( $filaR['desc_cptofc_mov'].$DESC_CPTOFC_MOV, 0, 40).
                      substr( $filaR['proyecto_mov'].$PROYECTO_MOV, 0, 10).
                      substr( $filaR['desc_proyecto_mov'].$DESC_PROYECTO_MOV, 0, 40).
                      substr( $filaR['tipo_banco_mov'].$TIPO_BANCO_MOV, 0, 2).
                      substr( $filaR['nro_banco_mov'].$NRO_BANCO_MOV, 0, 6).
                      substr( $filaR['prefijo_prov_mov'].$PREFIJO_PROV_MOV, 0, 4).
                      substr( $filaR['nro_prov_mov'].$NRO_PROV_MOV, 0, 12).
                      substr( $filaR['filler_mov'].$FILLER_MOV, 0, 30).

                      substr( $filaR['tipo_cru_cruce'].$TIPO_CRU_CRUCE, 0, 2).
                      substr( $filaR['nro_cru_cruce'].$NRO_CRU_CRUCE, 0, 6).
                      substr( $filaR['nro_cuota_cru_cruce'].$NRO_CUOTA_CRU_CRUC, 0, 2).
                      substr( $filaR['fecha_vcto_cruce'].$FECHA_VCTO_CRUCE, 0, 8).
                      substr( $filaR['vend_cruce'].$VEND_CRUCE, 0, 13).
                      substr( $filaR['terc_cp_cruce'].$TERC_CP_CRUCE, 0, 13).
                      substr( $filaR['suc_cp_cruce'].$SUC_CP_CRUCE, 0, 2).
                      substr( $filaR['ind_ant_cruce'].$IND_ANT_CRUCE, 0, 1).
                      substr( $filaR['refer_ant_cruce'].$REFER_ANT_CRUCE, 0, 11).
                      substr( $filaR['diasg_cruce'].$DIASG_CRUCE, 0, 3).
                      substr( $filaR['fecha_des_pp_cruce'].$FECHA_DES_PP_CRUCE, 0, 8).
                      substr( $filaR['vlrdes_pp_cruce'].$VLRDES_PP_CRUCE, 0, 14).
                      substr( $filaR['vlrdes_pp_me_cruce'].$VLRDES_PP_ME_CRUCE, 0, 14).
                      substr( $filaR['fecha_doc_cruce'].$FECHA_DOC_CRUCE, 0, 8).                      
                      substr( $filaR['ind_chq_posf'].$IND_CHQ_POSF, 0, 1).
                      substr( $filaR['filler_cruce'].$FILLER_CRUCE, 0, 11).
                      
                      substr( $filaR['nrodoc_cru_dif'].$NRODOC_CRU_DIF, 0, 12).
                      substr( $filaR['nro_cuota_cru_dif'].$NRO_CUOTA_CRU_DIF, 0, 2).
                      substr( $filaR['fecha_inicial_dif'].$FECHA_INICIAL_DIF, 0, 8).
                      substr( $filaR['fecha_final_dif'].$FECHA_FINAL_DIF, 0, 8).
                      substr( $filaR['cuenta_contra_dif'].$CUENTA_CONTRA_DIF, 0, 8).
                      substr( $filaR['terc_contra_dif'].$TERC_CONTRA_DIF, 0, 13).
                      substr( $filaR['suc_contra_dif'].$SUC_CONTRA_DIF, 0, 2).
                      substr( $filaR['co_contra_dif'].$CO_CONTRA_DIF, 0, 3).
                      substr( $filaR['ccosto_contra_dif'].$CCOSTO_CONTRA_DIF, 0, 8).
                      substr( $filaR['proyecto_contra_dif'].$PROYECTO_CONTRA_DIF, 0, 10).
                      substr( $filaR['desc_proyecto_dif'].$DESC_PROYECTO_DIF, 0, 40).
                      substr( $filaR['fecha_ant_ultamo'].$FECHA_ANT_ULTAMO, 0, 8).
                      substr( $filaR['fecha_ultamo'].$FECHA_ULTAMO, 0, 8).
                      substr( $filaR['filler_dif'].$FILLER_DIF, 0, 20). //Hasta aqui llegue

                      substr( $CAJA.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$CTABAN, 0, 40).
                      substr( $NAT.$filaR['contactoNacimiento'], -4).
                      substr( $FECHA_REC_CONSIG.$filaR['ordenCompra'], -1).
                      substr( $IND_MODO.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$IND_MVTO, 0, 1).
                      substr( $TIPO_MVTO.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$MEDPAG, 0, 40).
                      substr( $COD_BANCO.$filaR['contactoNacimiento'], -4).
                      substr( $NRO_CHE.$filaR['ordenCompra'], -1).
                      substr( $COD_MOTIVO.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$NRO_CONSIGNACION, 0, 1).
                      substr( $NRO_REFER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$NRO_CTAOTR, 0, 40).
                      substr( $AUTORIZACION.$filaR['contactoNacimiento'], -4).
                      substr( $NRO_CTACTE.$filaR['ordenCompra'], -1).
                      substr( $FEC_CONSIG.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$FILLER_TES, 0, 1).
                      substr( $NIT_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$NIT_DV_TER, 0, 40).
                      substr( $IDENT_TERCERO_TER.$filaR['contactoNacimiento'], -4).

                      substr( $K3_NOMBRE1_TER.$filaR['ordenCompra'], -1).
                      substr( $K4_NOMBRE2_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$APELLIDO1_TER, 0, 1).
                      substr( $APELLIDO2_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$NOMBRES_TER, 0, 40).
                      substr( $TIPO_TERC_TER.$filaR['contactoNacimiento'], -4).
                      substr( $TIPO_IDENT_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_CLI_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$IND_PRO_TER, 0, 1).
                      substr( $IND_EMPL_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$IND_ACCIO_TER, 0, 40).
                      substr( $IND_VAR_TER.$filaR['contactoNacimiento'], -4).
                      substr( $IND_INT_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_TARJ_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$ESTADO_TER, 0, 1).
                      substr( $FECHA_CRE_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$PAIS_TER, 0, 40).
                      substr( $DPTO_TER.$filaR['contactoNacimiento'], -4).
                      substr( $CIUDAD_TER.$filaR['ordenCompra'], -1).
                      substr( $DIRECCION_1_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$DIRECCION_2_TER, 0, 1).
                      substr( $DIRECCION_3_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$TELEFONO_TER, 0, 40).
                      substr( $FAX_TER.$filaR['contactoNacimiento'], -4).
                      substr( $COD_POSTAL_TER.$filaR['ordenCompra'], -1).
                      substr( $EMAIL_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$IND_SUC_TER, 0, 1).
                      substr( $BARRIO_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$TELEFONO_2_TER, 0, 40).
                      substr( $IND_SUC_P_TER.$filaR['contactoNacimiento'], -4).
                      substr( $CIIU_TER.$filaR['ordenCompra'], -1).
                      substr( $FILLER_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$CLASE_C_TER, 0, 1).
                      substr( $CO_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$ZONA_C_TER, 0, 40).
                      substr( $VEND_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $CONTACTO_C_TER.$filaR['ordenCompra'], -1).
                      substr( $CALIFICA_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$FILLER_RETIVA_C_TER, 0, 1).
                      substr( $FILLER_RETFTE_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$IND_FILLER_C_TER, 0, 40).
                      substr( $COND_PAGO_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $OBSERVA_C_TER.$filaR['ordenCompra'], -1).
                      substr( $DIASG_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$CUPO_CR_C_TER, 0, 1).
                      substr( $CRITERIO1_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$CRITERIO2_C_TER, 0, 40).
                      substr( $CRITERIO3_C_TER.$filaR['contactoNacimiento'], -4).


                      substr( $IND_BCUPO_C_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_BMORA_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$ESTADO_C_TER, 0, 1).
                      substr( $IND_OC_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$IND_REMISION_C_TER, 0, 40).
                      substr( $LISTA_PRECIO_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $LISTA_DSCTO_C_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_DSCTOG_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$DSCTOG1_C_TER, 0, 1).
                      substr( $IND_EXCLUIDO_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$FORMA_PAGO_C_TER, 0, 40).
                      substr( $IND_ANTICIPO_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $IND_CHEPOS_C_TER.$filaR['ordenCompra'], -1).
                      substr( $MONEDA_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$OBSERVA_VTA_C_TER, 0, 1).
                      substr( $OBSERVA_CRE_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$DCTOPP_C_TER, 0, 40).
                      substr( $IND_RETICA_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $RUTA_VIS_C_TER.$filaR['ordenCompra'], -1).
                      substr( $RUTA_TRA_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$BARRIO_C_TER, 0, 1).
                      substr( $ESTADO_V_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$CONTACTO_NAC_C_TER, 0, 40).
                      substr( $CONTACTO_CRE_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $CONT_NAC_CRE_C_TER.$filaR['ordenCompra'], -1).
                      substr( $DSCTOG2_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$FECHA_BLOQ_C_TER, 0, 1).
                      substr( $PUNTO_ENVIO_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$CLASE_P_TER, 0, 40).
                      substr( $CONTACTO_P_TER.$filaR['contactoNacimiento'], -4).
                      substr( $IND_REGIM_SIMP_P_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_AUTORET_P_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$IND_RETIVA_P_TER, 0, 1).
                      substr( $IND_RETICA_P_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$COND_PAGO_P_TER, 0, 40).
                      substr( $DIASG_P_TER.$filaR['contactoNacimiento'], -4).
                      substr( $CUPO_CR_P_TER.$filaR['ordenCompra'], -1).
                      substr( $MONEDA_P_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$ESTADO_P_TER, 0, 1).
                      substr( $OBSERVA_P_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$IND_CONSIGNA_P_TER, 0, 40).
                      substr( $FILLER_RETICA_P.$filaR['contactoNacimiento'], -4).
                      substr( $DESA_FE_P.$filaR['ordenCompra'], -1).
                      substr( $DEST_FE_P.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$DSCTO_OTORG_P, 0, 1).
                      substr( $METODO_PAGO_P.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$NRO_CTA_PAGO_P, 0, 40).
                      substr( $FORMA_PAGO_P.$filaR['contactoNacimiento'], -4).

                      substr( $CIUDAD_EXP_E_TER.$filaR['ordenCompra'], -1).
                      substr( $FECHA_ING_E_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$FECHA_NAC_E_TER, 0, 1).
                      substr( $PAIS_E_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$DPTO_E_TER, 0, 40).
                      substr( $CIUDAD_E_TER.$filaR['contactoNacimiento'], -4).
                      substr( $SEXO_E_TER.$filaR['ordenCompra'], -1).
                      substr( $EST_CIVIL_E_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$RUTA_E_TER, 0, 1).
                      substr( $RUTA_ORD_E_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$CARGO_E_TER, 0, 40).
                      substr( $FILLER_E_TER.$filaR['contactoNacimiento'], -4).
                      substr( $GRAN_CONTRIB_C_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_RETERENTA_C_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$COD_RETEIVA_C_TER, 0, 1).
                      substr( $COD_RETEICA_C_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$COD_RETEOTR_C_TER, 0, 40).
                      substr( $IND_LIQ_IMPTO_C_TER.$filaR['contactoNacimiento'], -4).
                      substr( $GRAN_CONTRIB_P_TER.$filaR['ordenCompra'], -1).
                      substr( $IND_RETERENTA_P_TER.$filaR['remision'], -1).
                      substr( $filaR['estadoCartera'].$COD_RETEIVA_P_TER, 0, 1).
                      substr( $COD_RETEICA_P_TER.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$COD_RETEOTR_P_TER, 0, 40).
                      substr( $DETALLE1_DOC.$filaR['contactoNacimiento'], -4).
                      substr( $filaR['estadoCartera'].$DETALLE2_DOC, 0, 1).
                      substr( $PROYECTO_CO_MOV.$filaR['fechaBloqueo'], -8).
                      substr( $filaR['contactoCartera'].$VEN_COB_COM, 0, 40).
                      substr( $FEC_REC_CONSIG.$filaR['contactoNacimiento'], -4).$jump;                   

         fwrite($fp, $registro); 

     }

     
   

   fclose($fp);

   return $fp;
  
}


function generar_rc($datos1,$file1){     
          
     $jump = "\r\n";
     $fp = fopen($file1, 'w+');

     $FIBATCH_K1_CONSECUTIVO = str_repeat( " ", 9); //*Consecutivo de Grabacion

     $FIBATCH_EMP = str_repeat( " ", 2); //*Empresa del documento
     $FIBATCH_CO = str_repeat( " ", 3); //*Centro de Operacion del documento
     $FIBATCH_TIPO = str_repeat( " ", 2); //*Tipo de Documento
     $FIBATCH_NRO = str_repeat( " ", 6); //*Numero de Documento
     $FIBATCH_FECHA = str_repeat( " ", 8); //*Fecha del Documento(AAAAMMDD)
     $FIBATCH_TERC_DOC = str_repeat( " ", 13); //*Tercero del Documento
     $FIBATCH_SUC_DOC = str_repeat( " ", 2); // Sucursal del tercero Documento
     $FIBATCH_IND_ANULADO = str_repeat( " ", 1); //*Indicador de Anulado
     $FIBATCH_VALOR_DOC = str_repeat( " ", 18); //*Valor del Documento 9999999999+ (+ o -)

     $FIBATCH_CUENTA = str_repeat( " ", 8); //*Cuenta Contable
     $FIBATCH_CO_MOV = str_repeat( " ", 3); //*Centro de Operacion
     $FIBATCH_TERC = str_repeat( " ", 13); //*Tercero del Movimiento
     $FIBATCH_SUC = str_repeat( " ", 2); //Sucursal del movimiento
     $FIBATCH_DETALLE1 = str_repeat( " ", 40); //Observacion de la transaccion
     $FIBATCH_DETALLE2 = str_repeat( " ", 40); //Observacion de la transaccion
     $FIBATCH_DC = str_repeat( " ", 1); //*Naturaleza de la transaccion D=Debito C=Credito
     $FIBATCH_VALOR = str_repeat( " ", 18); //*Valor de la Transaccion (15 Enteros, 2 Decimales, mas el signo (+ o -))
     $FIBATCH_TASA_IMPRET = str_repeat( " ", 6); //Tasa de Impuestos debe tener la tasa asociada sino se llena con cero (3 Enteros, 3 Decimales)
     $FIBATCH_TASA_BSEIMP = str_repeat( " ", 6); //Tasa  Base de Impuestos (Debe contener la tasa base del IVA)
     $FIBATCH_BASE_IVARET = str_repeat( " ", 18); //Valor de la base de Impuesto (+ o -)
     $FIBATCH_VALOR_ME = str_repeat( " ", 18); //Valor Moneda Extranjera (+ o -) 15 Enteros 2 Decimales
     $FIBATCH_TASA_CAMBIO = str_repeat( " ", 12); //Tasa de Cambio
     $FIBATCH_TASA_CONVER = str_repeat( " ", 12); //Tasa de Conversion
     $FIBATCH_CCOSTO = str_repeat( " ", 8); //Centro de Costos de la Transaccion si la cuenta maneja Centro de costos es obligatorio
     $FIBATCH_PROYECTO = str_repeat( " ", 10); //Si la cuenta maneja proyectos se llena pero no es obligatorio
     $FIBATCH_CPTOFC = str_repeat( " ", 8); //Concepto de Flujo de Caja
     $FIBATCH_TIPO_BANCO = str_repeat( " ", 2); //Tipo de documento  de conciliacion CG=consignacion CH=Cheque ND=NotaDebtio NC=NotaCredito
     $FIBATCH_NRO_BANCO = str_repeat( " ", 6); //Numero de documento de conciliacion


     $FIBATCH_TIPO_CRU_CRUCE = str_repeat( " ", 2); //Tipo de Docto Cruce 
     $FIBATCH_NRO_CRUCE = str_repeat( " ", 6); //Numero de Docto Cruce
     $FIBATCH_CUOTA_CRUCE = str_repeat( " ", 2); //Numero de Cuota cruce
     $FIBATCH_FECHA_VCTO_CRUCE = str_repeat( " ", 8); //Fecha de Vencimiento
     $FIBATCH_PREFIJO_PROV = str_repeat( " ", 4); //Prefijo del documento del proveedor
     $FIBATCH_NRO_PROV = str_repeat( " ", 12); //Numero de docto del proveedor
     $FIBATCH_VEND_CRUCE = str_repeat( " ", 13); //Codigo del tercero o vendedor
     $FIBATCH_FECHA_DES_PP_CRUCE = str_repeat( " ", 8); //Fecha del Descuento Pronto Pago
     $FIBATCH_VLRDES_PP_CRUCE = str_repeat( " ", 14); //Valor del descuento pronto pago
     $FIBATCH_CAJA = str_repeat( " ", 3); //Codigo de caja
     $FIBATCH_IND_MODO = str_repeat( " ", 1); //*Indicador de Modo 1=Efectivo 2=Cheques 3=Otros 5=Consignaciones
     $FIBATCH_MEDPAG = str_repeat( " ", 3); //Medio de recaudo
     $FIBATCH_COD_BANCO = str_repeat( " ", 4); //Codigo banco del cheque
     $FIBATCH_NRO_CHE = str_repeat( " ", 6); //Numero del cheque
     $FIBATCH_NRO_REFER = str_repeat( " ", 10); //Ref de la consignacion
     $FIBATCH_NRO_CTACTE = str_repeat( " ", 20); //Numero de cuenta corriente/Ahorros de la consignacion
     $FIBATCH_FECHA_REC_CONSIG = str_repeat( " ", 8); //Fecha de Recaudo
     $FIBATCH_CO_CPTOF = str_repeat( " ", 3); //CO del concepto del flujo de caja
     $FIBATCH_DETALLE1_DOC = str_repeat( " ", 60); //Detalle adicional
     $FIBATCH_DETALLE2_DOC = str_repeat( " ", 60);//Detalle adicional
     $FIBATCH_FILLER = str_repeat( " ", 140); //Interno (En espacios)

    
    foreach ($datos1 as $filaR) {      

     $registro =    substr( "004431".$FIBATCH_K1_CONSECUTIVO, 0, 9).

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
                    substr( " ".$FIBATCH_FILLER, 0, 140).$jump;         

     fwrite($fp, $registro); 

     }  

   fclose($fp);

   return $fp;
  
}



?>
