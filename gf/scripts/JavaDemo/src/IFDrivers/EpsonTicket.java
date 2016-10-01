
// Este modulo contiene el código a disposicion por parte de IFDRIVERS
// en una base TAL CUAL. Todo receptor del Modulo se considera
// bajo licencia de los derechos de autor de IFDRIVERS para utilizar el
// codigo fuente siempre en modo que el o ella considere conveniente,
// incluida la copia, la compilacion, su modificacion o la redistribucion,
// con o sin modificaciones. Ninguna licencia o patentes de IFDRivers
// este implicita en la presente licencia.
//
// El usuario del codigo fuente debera entender que IFDRIVERS no puede
// Proporcionar apoyo tecnico para el modulo y no sera Responsable
// de las consecuencias del uso del programa.
//
// Todas las comunicaciones, incluida esta, no deben ser removidos
// del modulo sin el consentimiento previo por escrito de IFDRIVERS
// www: http://www.impresoras-fiscales.com.ar/
// email: soporte@impresoras-fiscales.com.ar

// Instrucciones para usar el driver y las funciones de alto nivel en Java:
//
// 1) Instale la libreria Tm2032Jv.dll. Para que Java pueda encuentrar
//    la libreria, esta debe estar instalada en un directorio que este incluido en 
//    la variable de entorno PATH. 
// 2) Agregue este archivo con la clase EpsonTicket a su proyecto.
// 3) Declare y cree la clase en su codigo. 
//    Todas las funciones de la clase EpsonTicket seran accesibles tambien 
//    desde esta clase: IF_OPEN, IF_CLOSE,etc. mas las funciones de alto nivel.
// 
// Por ejemplo:
//
// import IFDrivers.EpsonTicket;
//
// EpsonTicket m_objEpsonTicket = new EpsonTicket();
//
// int nError = m_objEpsonTicket.IF_OPEN("COM1",9600);
//
// ....etc
//
//IMPORTANTE: No debera renombrar ni el nombre del Package ni de la clase. De lo contrario,
//el driver dejara de funcionar.
//
package IFDrivers;

/**
 * 
 * @author Marcelo
 */
public class EpsonTicket
{
 /**
  * Abrir el puerto de comunicaciones
  * @param    strPort    Puerto de comunicaciones
  * @param    nSpeed   Velocidad del puerto
  * @return     0 si no hay error, -1 si se produjo un error
  */
  public native int IF_OPEN(String strPort, int nSpeed);

 /**
  *  Cerrar el puerto de comunicaciones
  * @return     0 si no hay error, -1 si se produjo un error
  */
  public native int IF_CLOSE();

 /**
  *  Leer un campo de la respuesta del controlador fiscal
  * @param    nField    Nro del campo de la respuesta fiscal a recuperar
  * @return     El valor del campo
  */
  public native String IF_READ(int nField);

 /**
  *  Enviar un comando a la impresora fiscal
  * @param    strCommand    Comando a enviar
  * @return     0 si no hay error, -1 si se produjo un error
  */
  public native int IF_WRITE(String strCommand);

 /**
  *  Leer el código de estado del mecanismo impresor
  * @param    nBit    Nro del bit a leer (1 a 16)
  * @return     1 si esta en On, 0 si esta en Off
  */
  public native int IF_ERROR1(int nBit);

 /**
  *  Leer el código de estado del controlador fiscal
  * @param    nBit    Nro del bit a leer (1 a 16)
  * @return     1 si esta en On, 0 si esta en Off
  */
  public native int IF_ERROR2(int nBit);

 /**
  *  Habilitar o deshabilitar la depuración de comandos
  * @param    nTrace   1 para habilitar, 0 para deshabilitar la depuracion
  */
  public native void IF_TRACE(int nTrace);
  
  public native void IF_SERIAL(String strSerial);

  static
  {
   System.loadLibrary("Tm2032Jv");
  }

 //***************************************************************
 // 1. Comandos de diagnóstico
 /**
  * Consulta de estado
  * @param	byVar1	Código de operación {NPCAD}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int ESTADO(String byVar1)
  {
   String strBuff = "@ESTADO" + "|" + byVar1;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 2. Comandos de control fiscal
 /**
  * Cierre de jornada fiscal
  * @param	byVar1	Tipo de reporte {XY}
  * @param	byVar2	Imprimir
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int CIERRE(String byVar1, String byVar2)
  {
   String strBuff = "@CIERRE" + "|" + byVar1 + "|" + byVar2;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Efectúa un CierreZ
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int CIERREZ()
  {
   String strBuff = "@CIERREZ";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Efectua un CierreX
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int CIERREX()
  {
   String strBuff = "@CIERREX";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Reporte de auditoría por fechas
  * @param	strVar1	Fecha inicial (AAMMDD) (max 6 bytes)
  * @param	strVar2	Fecha final (AAMMDD) (max 6 bytes)
  * @param	byVar3	tipo {TDtd}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int AUDITORIAF(String strVar1, String strVar2, String byVar3)
  {
   String strBuff = "@AUDITORIAF" + "|" + strVar1 + "|" + strVar2 + "|" + byVar3;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Reporte de auditoría por fechas
  * @param	nVar1	Nro Z inicial (nn)
  * @param	nVar2	Nro Z final (nn)
  * @param	byVar3	tipo
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int AUDITORIAZ(Integer nVar1, Integer nVar2, String byVar3)
  {
   String strBuff = "@AUDITORIAZ" + "|" + nVar1.toString() + "|" + nVar2.toString() + "|" + 
                      byVar3;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 3. Comandos para generar comprobantes fiscales
 /**
  * Abrir comprobante fiscal
  * @param	byVar1	Formato para almacenar los datos {CG}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUEABRE(String byVar1)
  {
   String strBuff = "@TIQUEABRE" + "|" + byVar1;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Imprimir texto fiscal
  * @param	strVar1	Texto fiscal a imprimir (max 26 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUETEXTO(String strVar1)
  {
   String strBuff = "@TIQUETEXTO" + "|" + strVar1;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Imprimir Item
  * @param	strVar1	Descripción del Item (max 20 bytes)
  * @param	dblVar2	Cantidad (nnnnn.nnn)
  * @param	dblVar3	Monto del item (nnnnnnn.nn)
  * @param	dblVar4	Tasa del IVA (0.105, 0.21) (.nnnn)
  * @param	byVar5	Calificador de la operación {MmRr}
  * @param	nVar6	Nro de bultos (nnnnn)
  * @param	dblVar7	Tasa de ajuste variable (.nnnnnnnn)
  * @param	dblVar8	Impuestos internos fijos (nnnnnnnnn.nnnnnnnn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUEITEM(String strVar1, Double dblVar2, Double dblVar3, Double dblVar4, 
                        String byVar5, Integer nVar6, Double dblVar7, Double dblVar8)
  {
   String strBuff = "@TIQUEITEM" + "|" + strVar1 + "|" + dblVar2.toString() + "|" + 
                      dblVar3.toString() + "|" + dblVar4.toString() + "|" + 
                       byVar5 + "|" + nVar6.toString() + "|" + dblVar7.toString() + "|" + 
                        dblVar8.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Imprimir Item
  * @param	strVar1	Descripción del Item (max 20 bytes)
  * @param	dblVar2	Cantidad (nnnnn.nnn)
  * @param	dblVar3	Monto del item (nnnnnnn.nnnn)
  * @param	dblVar4	Tasa del IVA (0.105, 0.21) (.nnnn)
  * @param	byVar5	Calificador de la operación {MmRr}
  * @param	nVar6	Nro de bultos (nnnnn)
  * @param	dblVar7	Tasa de ajuste variable (.nnnnnnnn)
  * @param	dblVar8	Impuestos internos fijos (nnnnnnnnn.nnnnnnnn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUEITEM2(String strVar1, Double dblVar2, Double dblVar3, Double dblVar4, 
                         String byVar5, Integer nVar6, Double dblVar7, 
                          Double dblVar8)
  {
   String strBuff = "@TIQUEITEM2" + "|" + strVar1 + "|" + dblVar2.toString() + "|" + 
                      dblVar3.toString() + "|" + dblVar4.toString() + "|" + 
                       byVar5 + "|" + nVar6.toString() + "|" + dblVar7.toString() + "|" + 
                        dblVar8.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Subtotal
  * @param	byVar1	Imprimir
  * @param	strVar2	Texto a imprimir en el subtotal (max 25 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUESUBTOTAL(String byVar1, String strVar2)
  {
   String strBuff = "@TIQUESUBTOTAL" + "|" + byVar1 + "|" + strVar2;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Devolucion de envases, Bonificaciones y Recargos
  * @param	strVar1	Texto con descripcion del pago (max 25 bytes)
  * @param	dblVar2	monto (nnnnnnn.nn)
  * @param	byVar3	Calificador del item de línea {TtDR}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUEPAGO(String strVar1, Double dblVar2, String byVar3)
  {
   String strBuff = "@TIQUEPAGO" + "|" + strVar1 + "|" + dblVar2.toString() + "|" + 
                      byVar3;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Cerrar comprobante fiscal
  * @param	byVar1	Tipo de corte {TP}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUECIERRA(String byVar1)
  {
   String strBuff = "@TIQUECIERRA" + "|" + byVar1;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Cancela una ticket
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int TIQUECANCEL()
  {
   String strBuff = "@TIQUECANCEL";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 4. Comandos para generar comprobantes no fiscales
 /**
  * Abrir comprobante no-fiscal
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int NOFISABRE()
  {
   String strBuff = "@NOFISABRE";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Imprimir texto no-fiscal
  * @param	strVar1	Texto no fiscal (max 40 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int NOFISITEM(String strVar1)
  {
   String strBuff = "@NOFISITEM" + "|" + strVar1;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Cerrar comprobante no-fiscal
  * @param	byVar1	Tipo de corte {TP}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int NOFISCIERRA(String byVar1)
  {
   String strBuff = "@NOFISCIERRA" + "|" + byVar1;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 5. Comandos para generar DNFH
 /**
  * Datos del voucher de tarjeta de crédito
  * @param	strVar1	Nombre de tarjeta de crédito (max 20 bytes)
  * @param	strVar2	nro de la tarjeta de crédito (max 20 bytes)
  * @param	strVar3	Nombre del usuario de la tarjeta de crédito (max 23 bytes)
  * @param	strVar4	Fecha de vencimiento de la tarjeta de crédito (AAMMDD) (max 6 bytes)
  * @param	strVar5	número de establecimiento (max 20 bytes)
  * @param	strVar6	número de cupon (max 20 bytes)
  * @param	strVar7	número interno del comprobante que se esta emitiendo (max 20 bytes)
  * @param	strVar8	codigo de autorizacion de la transaccion (max 20 bytes)
  * @param	strVar9	tipo de operación (max 20 bytes)
  * @param	dblVar10	Importe que a pagar. (nnnnnnnnn.nn)
  * @param	strVar11	cantidad de cuotas (max 20 bytes)
  * @param	strVar12	en que moneda se ha realizado la transaccion (max 20 bytes)
  * @param	strVar13	número de terminal (max 20 bytes)
  * @param	strVar14	número de lote (max 20 bytes)
  * @param	strVar15	número de terminal electronica (max 20 bytes)
  * @param	strVar16	número de sucursal (max 20 bytes)
  * @param	strVar17	número o nombre del operador. (max 20 bytes)
  * @param	strVar18	número de documento fiscal al que se hace referencia (max 20 bytes)
  * @param	byVar19	Si se envia P se deja una línea para la firma del cliente
  * @param	byVar20	Si se envia P se deja una línea para la aclaracion de la firma
  * @param	byVar21	Si se envia P se deja una línea para el nro de telefono
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int DNFHTARJETADECREDITO(String strVar1, String strVar2, String strVar3, 
                                   String strVar4, String strVar5, String strVar6, 
                                    String strVar7, String strVar8, String strVar9, 
                                     Double dblVar10, String strVar11, 
                                      String strVar12, String strVar13, String strVar14, 
                                       String strVar15, String strVar16, 
                                        String strVar17, String strVar18, 
                                         String byVar19, String byVar20, 
                                          String byVar21)
  {
   String strBuff = "@DNFHTARJETADECREDITO" + "|" + strVar1 + "|" + strVar2 + "|" + 
                      strVar3 + "|" + strVar4 + "|" + strVar5 + "|" + strVar6 + "|" + 
                       strVar7 + "|" + strVar8 + "|" + strVar9 + "|" + 
                        dblVar10.toString() + "|" + strVar11 + "|" + strVar12 + "|" + 
                         strVar13 + "|" + strVar14 + "|" + strVar15 + "|" + 
                          strVar16 + "|" + strVar17 + "|" + strVar18 + "|" + 
                           byVar19 + "|" + byVar20 + "|" + byVar21;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Documento no fiscal homologado farmacias
  * @param	strVar1	Nombre de la Obra Social y/o el nro de Obra Social. (max 20 bytes)
  * @param	strVar2	Linea para identificar el coseguro (max 20 bytes)
  * @param	strVar3	Linea para identificar el coseguro (max 20 bytes)
  * @param	strVar4	Linea para identificar el coseguro (max 20 bytes)
  * @param	strVar5	Nro de afiliado (max 20 bytes)
  * @param	strVar6	Nombre del afiliado (max 20 bytes)
  * @param	strVar7	Fecha de vencimiento del carnet de la obra social. El formato es AAMMDD (max 6 bytes)
  * @param	strVar8	Domicilio Fiscal del Vendedor línea 1 (max 20 bytes)
  * @param	strVar9	Domicilio Fiscal del Vendedor línea 2 (max 20 bytes)
  * @param	strVar10	número o nombre del establecimiento (max 20 bytes)
  * @param	strVar11	número interno del comprobante que se esta emitiendo. (max 20 bytes)
  * @param	strVar12	línea 1 para especificar algun dato a la obra social (max 20 bytes)
  * @param	strVar13	línea 2 para especificar algun dato a la obra social (max 20 bytes)
  * @param	byVar14	Si se envia 'P' se deja un espacio para que el cliente ponga su domicilio
  * @param	byVar15	Si se envia 'P' se deja un espacio para que el cliente ponga su nro de documento
  * @param	byVar16	Si se envia 'P' se deja un espacio para que el cliente ponga su firma
  * @param	byVar17	Si se envia 'P' se deja un espacio para que el cliente aclare su firma
  * @param	byVar18	Si se envia 'P' se deja un espacio para que el cliente ponga su telefono
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int DNFHOBRASOCIAL(String strVar1, String strVar2, String strVar3, String strVar4, 
                             String strVar5, String strVar6, String strVar7, 
                              String strVar8, String strVar9, String strVar10, 
                               String strVar11, String strVar12, String strVar13, 
                                String byVar14, String byVar15, 
                                 String byVar16, String byVar17, String byVar18)
  {
   String strBuff = "@DNFHOBRASOCIAL" + "|" + strVar1 + "|" + strVar2 + "|" + strVar3 + "|" + 
                      strVar4 + "|" + strVar5 + "|" + strVar6 + "|" + 
                       strVar7 + "|" + strVar8 + "|" + strVar9 + "|" + strVar10 + "|" + 
                        strVar11 + "|" + strVar12 + "|" + strVar13 + "|" + 
                         byVar14 + "|" + byVar15 + "|" + byVar16 + "|" + 
                          byVar17 + "|" + byVar18;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Seleccionar las preferencias del usuario
  * @param	byVar1	Se debe enviar 'P' {P}
  * @param	byVar2	Modo1 {DP}
  * @param	byVar3	Modo2 {S}
  * @param	byVar4	Modo3 {OU}
  * @param	strVar5	Solo si en el campo 04 se envio 'U' establece la cantidad de líneas que mide el papel (max 2 bytes)
  * @param	strVar6	Solo si en el campo 04 se envio 'U' establece la cantidad de columnas (max 2 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int PONEPREFERENCIA(String byVar1, String byVar2, String byVar3, String byVar4, 
                              String strVar5, String strVar6)
  {
   String strBuff = "@PONEPREFERENCIA" + "|" + byVar1 + "|" + byVar2 + "|" + byVar3 + "|" + 
                      byVar4 + "|" + strVar5 + "|" + strVar6;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Leer las preferencias del usuario
  * @param	byVar1	Se debe enviar P {P}
  * @param	byVar2	Modo {DP}
  * @param	byVar3	Solo si en el campo 02 se envio 'P' se debe enviar 'S' para leer las dimensiones del papel
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int LEEPREFERENCIA(String byVar1, String byVar2, String byVar3)
  {
   String strBuff = "@LEEPREFERENCIA" + "|" + byVar1 + "|" + byVar2 + "|" + byVar3;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Preparar estacion principal
  * @param	byVar1	Se envia 'D' para indicar que se enviara un comando de manejo de documentos
  * @param	byVar2	Se envia 'P para indicar que se enviar'a un comando de impresion
  * @param	byVar3	Se envia 'P' para indicar que debera preparar la impresion la estacion definida en el campo 04
  * @param	byVar4	Se debe enviar 'U' {U}
  * @param	byVar5	Se debe enviar 'O' {O}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int ESTACIONPPAL(String byVar1, String byVar2, String byVar3, String byVar4, 
                           String byVar5)
  {
   String strBuff = "@ESTACIONPPAL" + "|" + byVar1 + "|" + byVar2 + "|" + byVar3 + "|" + 
                      byVar4 + "|" + byVar5;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Documento NO fiscal por hoja suelta
  * @param	byVar1	Campo 1
  * @param	byVar2	Campo 2
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int NOFISDOC(String byVar1, String byVar2)
  {
   String strBuff = "@NOFISDOC" + "|" + byVar1 + "|" + byVar2;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 6. Comandos de control de la impresora
 /**
  * Cortar papel
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int CORTAPAPEL()
  {
   String strBuff = "@CORTAPAPEL";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Avanzar papel de tickets
  * @param	nVar1	Nro de líneas a avanzar (nn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int AVANZATIQUE(Integer nVar1)
  {
   String strBuff = "@AVANZATIQUE" + "|" + nVar1.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Avanzar papel cinta de auditoría
  * @param	nVar1	Nro de líneas a avanzar (nn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int AVANZAAUDIT(Integer nVar1)
  {
   String strBuff = "@AVANZAAUDIT" + "|" + nVar1.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Avanzar papeles de tickets y cinta de auditoría
  * @param	nVar1	Nro de líneas a avanzar (nn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int AVANZAAMBOS(Integer nVar1)
  {
   String strBuff = "@AVANZAAMBOS" + "|" + nVar1.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Avanzar hoja suelta o factura
  * @param	nVar1	Nro de líneas a avanzar (nn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int AVANZAHOJA(Integer nVar1)
  {
   String strBuff = "@AVANZAHOJA" + "|" + nVar1.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 7. Comandos generales
 /**
  * Ingresar fecha y hora
  * @param	strVar1	Fecha (AAMMDD) (max 2 bytes)
  * @param	strVar2	Hora (HHMMSS) (max 2 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int PONEFECHORA(String strVar1, String strVar2)
  {
   String strBuff = "@PONEFECHORA" + "|" + strVar1 + "|" + strVar2;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Consultar fecha y hora
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int PIDEFECHORA()
  {
   String strBuff = "@PIDEFECHORA";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Programar texto de encabezamiento y cola
  * @param	nVar1	Nro de línea de datos fijos (nnnnn)
  * @param	strVar2	Texto fiscal de datos fijos (max 40 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int PONEENCABEZADO(Integer nVar1, String strVar2)
  {
   String strBuff = "@PONEENCABEZADO" + "|" + nVar1.toString() + "|" + strVar2;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Consultar texto de encabezamiento y cola
  * @param	nVar1	Nro de línea de datos fijos (nnnnn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int PIDEENCABEZADO(Integer nVar1)
  {
   String strBuff = "@PIDEENCABEZADO" + "|" + nVar1.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Abrir gaveta de dinero 1
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int ABRECAJON1()
  {
   String strBuff = "@ABRECAJON1";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Abrir gaveta de dinero 2
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int ABRECAJON2()
  {
   String strBuff = "@ABRECAJON2";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 8. Emisión de Tickets Factura y NC
 /**
  * Abrir comprobante fiscal Ticket-Factura
  * @param	byVar1	Tipo de documento fiscal que se va a realizar {FMT}
  * @param	byVar2	Tipo de salida impresa para factura fiscal o recibo - factura {CS}
  * @param	byVar3	Letra del documento fiscal (A,B o C) {ABC}
  * @param	byVar4	Cantidad de copias que se deben IMPRIMIR (1 a 5)
  * @param	byVar5	Tipo de formulario que se utiliza para la factura emitidas en hoja suelta o formulario continuo {AFP}
  * @param	strVar6	Tamaño de los caracteres que se van a utilizar en toda la factura emitida en hoja suelta o formulario continuo) (max 2 bytes)
  * @param	byVar7	Responsabilidad frente al IVA del EMISOR en el modo entrenamiento {IRNEM}
  * @param	byVar8	Responsabilidad frente al IVA del COMPRADOR {IRNEMFS}
  * @param	strVar9	Nombre comercial del comprador línea 1 (max 40 bytes)
  * @param	strVar10	Nombre comercial del comprador línea 2 (max 40 bytes)
  * @param	strVar11	Tipo de documento del comprador (CUIT, CUIL,DNI) (max 6 bytes)
  * @param	strVar12	CUIT o documento del comprador (max 11 bytes)
  * @param	byVar13	Linea OPCIONAL bien de USO
  * @param	strVar14	Domicilio del comprador, línea 1 (max 40 bytes)
  * @param	strVar15	Domicilio del comprador, línea 2 (max 40 bytes)
  * @param	strVar16	Domicilio del comprador, línea 3 (max 40 bytes)
  * @param	strVar17	Línea 1 de texto variable (max 40 bytes)
  * @param	strVar18	Línea 2 de texto variable (max 40 bytes)
  * @param	byVar19	Formato para almacenar los datos (C o G) {CG}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTABRE(String byVar1, String byVar2, String byVar3, String byVar4, 
                       String byVar5, String strVar6, String byVar7, String byVar8, 
                        String strVar9, String strVar10, String strVar11, 
                         String strVar12, String byVar13, String strVar14, 
                          String strVar15, String strVar16, String strVar17, String strVar18, 
                           String byVar19)
  {
   String strBuff = "@FACTABRE" + "|" + byVar1 + "|" + byVar2 + "|" + byVar3 + "|" + 
                      byVar4 + "|" + byVar5 + "|" + strVar6 + "|" + byVar7 + "|" + 
                       byVar8 + "|" + strVar9 + "|" + strVar10 + "|" + 
                        strVar11 + "|" + strVar12 + "|" + byVar13 + "|" + strVar14 + "|" + 
                         strVar15 + "|" + strVar16 + "|" + strVar17 + "|" + 
                          strVar18 + "|" + byVar19;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Imprimir Item
  * @param	strVar1	Descripción del producto (max 20 bytes)
  * @param	dblVar2	Cantidad de unidades (nnnnn.nnn)
  * @param	dblVar3	Monto del item  (nnnnnnn.nn)
  * @param	dblVar4	Tasa del iva  (.nnnn)
  * @param	byVar5	Calificador de la operación {MmRr}
  * @param	nVar6	Nro de bultos (nnnnn)
  * @param	dblVar7	Tasa de ajuste variable (.nnnnnnnn)
  * @param	strVar8	Linea 1 descripcion complementaria del item (max 30 bytes)
  * @param	strVar9	Linea 2 descripcion complementaria del item (max 30 bytes)
  * @param	strVar10	Linea 3 descripcion complementaria del item (max 30 bytes)
  * @param	dblVar11	Acrecentamiento (.nnnn)
  * @param	dblVar12	Impuestos internos fijos (nnnnnnnnn.nnnnnnnn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTITEM(String strVar1, Double dblVar2, Double dblVar3, Double dblVar4, 
                       String byVar5, Integer nVar6, Double dblVar7, String strVar8, 
                        String strVar9, String strVar10, Double dblVar11, 
                         Double dblVar12)
  {
   String strBuff = "@FACTITEM" + "|" + strVar1 + "|" + dblVar2.toString() + "|" + 
                      dblVar3.toString() + "|" + dblVar4.toString() + "|" + 
                       byVar5 + "|" + nVar6.toString() + "|" + dblVar7.toString() + "|" + 
                        strVar8 + "|" + strVar9 + "|" + strVar10 + "|" + 
                         dblVar11.toString() + "|" + dblVar12.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Imprimir Item
  * @param	strVar1	Descripción del producto (max 20 bytes)
  * @param	dblVar2	Cantidad de unidades (nnnnn.nnn)
  * @param	dblVar3	Monto del item  (nnnnnnn.nnnn)
  * @param	dblVar4	Tasa del iva  (.nnnn)
  * @param	byVar5	Calificador de la operación {MmRr}
  * @param	nVar6	Nro de bultos (nnnnn)
  * @param	dblVar7	Tasa de ajuste variable (.nnnnnnnn)
  * @param	strVar8	Linea 1 descripcion complementaria del item (max 30 bytes)
  * @param	strVar9	Linea 2 descripcion complementaria del item (max 30 bytes)
  * @param	strVar10	Linea 3 descripcion complementaria del item (max 30 bytes)
  * @param	dblVar11	Acrecentamiento (.nnnn)
  * @param	dblVar12	Impuestos internos fijos (nnnnnnnnn.nnnnnnnn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTITEM2(String strVar1, Double dblVar2, Double dblVar3, Double dblVar4, 
                        String byVar5, Integer nVar6, Double dblVar7, String strVar8, 
                         String strVar9, String strVar10, Double dblVar11, 
                          Double dblVar12)
  {
   String strBuff = "@FACTITEM2" + "|" + strVar1 + "|" + dblVar2.toString() + "|" + 
                      dblVar3.toString() + "|" + dblVar4.toString() + "|" + 
                       byVar5 + "|" + nVar6.toString() + "|" + dblVar7.toString() + "|" + 
                        strVar8 + "|" + strVar9 + "|" + strVar10 + "|" + 
                         dblVar11.toString() + "|" + dblVar12.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Subtotal
  * @param	byVar1	Imprimir
  * @param	strVar2	Texto a imprimir en el subtotal (max 29 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTSUBTOTAL(String byVar1, String strVar2)
  {
   String strBuff = "@FACTSUBTOTAL" + "|" + byVar1 + "|" + strVar2;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Devolucion de envases, Bonificaciones y Recargos
  * @param	strVar1	Texto con descripcion del pago (max 25 bytes)
  * @param	dblVar2	monto (nnnnnnnnnn.nn)
  * @param	byVar3	Calificador del item de línea {CTtDR}
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTPAGO(String strVar1, Double dblVar2, String byVar3)
  {
   String strBuff = "@FACTPAGO" + "|" + strVar1 + "|" + dblVar2.toString() + "|" + 
                      byVar3;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Percepciones Tique Factura
  * @param	strVar1	Descripción de la percepción (max 25 bytes)
  * @param	byVar2	Indica si es una percepción sobre el IVA u otra percepción {OT}
  * @param	dblVar3	Monto de la percepción  (nnnnnnnn.nn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTPERCEP(String strVar1, String byVar2, Double dblVar3)
  {
   String strBuff = "@FACTPERCEP" + "|" + strVar1 + "|" + byVar2 + "|" + dblVar3.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Cerrar comprobante fiscal
  * @param	byVar1	Tipo de documento {FTM}
  * @param	byVar2	Letra del documento fiscal {ABC}
  * @param	strVar3	Descripción que se imprime en la línea TOTAL (max 20 bytes)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTCIERRA(String byVar1, String byVar2, String strVar3)
  {
   String strBuff = "@FACTCIERRA" + "|" + byVar1 + "|" + byVar2 + "|" + strVar3;
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Cancela una factura
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int FACTCANCEL()
  {
   String strBuff = "@FACTCANCEL";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 //***************************************************************
 // 9. Otros comandos
 /**
  * Efectúa una pausa
  * @param	nVar1	timeout (en milisegundos) (nnnn)
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int PAUSA(Integer nVar1)
  {
   String strBuff = "@PAUSA" + "|" + nVar1.toString();
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

 /**
  * Cancela cualquier comprobante fiscal abierto
  * @return 0 si no hay error y != 0 si hay un error
  */
  public int SINCRO()
  {
   String strBuff = "@SINCRO";
   
   int nError = IF_WRITE(strBuff);
   
   return (nError);
  }

}
