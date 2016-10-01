/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package javademo;

import java.applet.Applet;
import java.net.URL;

import IFDrivers.EpsonTicket;

/**
 *
 * @author Marcelo
 */
public class Main extends Applet {

    /**
     * @param args the command line arguments
     */
	public void init() {
		PruebaEpsonTicket_AltoNivel();
   	}
    public void imprime()
    {
        int nError;
        String puerto=getParameter("puerto");
    	String texto=getParameter("texto");
    	String urlRedirect=getParameter("link");
    	String serial=getParameter("serial");
        System.out.print("Imprimiendo ticket Factura \n");
        System.out.print("PUERTO: "+puerto+"\n");
        System.out.print("TEXTO: "+texto+"\n");

        EpsonTicket IPrinter = new EpsonTicket();
        if(serial!="")IPrinter.IF_SERIAL(serial);
//        IFDrivers.EpsonTick.IF_SERIAL("27-0163848-435"); 
        nError = IPrinter.IF_OPEN(puerto, 9600);

        if ( 0 != nError)
        {
            System.out.print("Error en la apertura del puerto COM!\n");
            return;
        }
        String s[]=texto.split(",");
        for (int i = 0; i <s.length; i++) {
        	if(serial!="")IPrinter.IF_SERIAL(serial);
        	 nError = IPrinter.IF_WRITE(s[i]);
        	 System.out.print("ERROR: "+nError+'\n');
        	 System.out.print(s[i]+'\n');
		}
        if(serial!="")IPrinter.IF_SERIAL(serial);
        IPrinter.IF_CLOSE();
        try {
			URL url = new URL(urlRedirect);
			this.getAppletContext().showDocument(url);
		} catch (Exception e) {
			System.err.println("URL mal formada!" );
		}

    }

    public static void PruebaEpsonTicket_BajoNivel()
    {
        int nError;

        System.out.print("Prueba Epson Ticket Funciones de Bajo Nivel\n");

        EpsonTicket IPrinter = new EpsonTicket();

        nError = IPrinter.IF_OPEN("COM2", 9600);

        if ( 0 != nError)
        {
            System.out.print("Error en la apertura del puerto COM!\n");
            return;
        }
        nError= IPrinter.IF_WRITE("@TIQUEABRE|C|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|ABRAZADERAS  ACER.IN|    100|      3.5712|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|BARDAHL ADIT. INYECT|    1.000|      4.84|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|CABALLA AL NATURAL C|    1.000|      3.03|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|GALL.FLIARES C/SALVA|    1.000|      2.66|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|REFRIG. FLUIDO LAVAC|    1.000|      9.68|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|NAIPES CASINO x 40  |    1.000|      3.39|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|PALITO BOMBON       |    1.000|      1.82|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|ELAION DIESEL 15W40 |    1.000|     10.29|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|TABLETAS FUYI       |    1.000|      1.21|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUEITEM|D1  15W40 x 5 LT    |    1.000|     27.83|  .21|M|1|0|0|");
        nError= IPrinter.IF_WRITE("@TIQUESUBTOTAL|P|Subtotal");
        nError= IPrinter.IF_WRITE("@TIQUECIERRA|T|");

        nError = IPrinter.IF_WRITE("@PONEENCABEZADO|5|EJEMPLO FACTURA A");
        nError = IPrinter.IF_WRITE("@FACTABRE|T|C|A|1|P|10|I|I|Mi Empresa SRL||CUIT|30692137449|N|MEXICO 564|Capital Federal||Remito 01-2345||C");

        nError = IPrinter.IF_WRITE("@FACTITEM|Mouse Genius XScrol|1.0|4.08|0.105|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Patchcord Cat.5E Gr|5.0|4.10|0.210|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Microfono NG-H300 N|1.0|4.12|0.210|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Mouse Genius Netscr|1.0|4.12|0.105|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Ventilador Cyber Co|2.0|4.12|0.210|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Lector 3.5 MultiCar|2.0|4.22|0.210|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Teclado Noganet Esp|2.0|4.30|0.105|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Antena SMA Kozumi W|2.0|4.33|0.210|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Teclado Ecovision W|1.0|4.39|0.105|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Limpiador para Pant|1.0|4.44|0.210|M|1|0||||0|0");
        nError = IPrinter.IF_WRITE("@FACTITEM|Auricular Genius Mo|1.0|4.46|0.210|M|1|0||||0|0");

        nError = IPrinter.IF_WRITE("@FACTPAGO|DESCUENTO 10%|9.46|D");
        nError = IPrinter.IF_WRITE("@FACTPAGO|PAGO|100.00|T");

        nError = IPrinter.IF_WRITE("@FACTCIERRA|T|A|FINAL");

        IPrinter.IF_CLOSE();

    }
    public static void PruebaEpsonTicket_AltoNivel()
    {
        int nError;

        System.out.print("Prueba Epson Ticket, Funciones de AltoNivel\n");

        EpsonTicket IPrinter = new EpsonTicket();

        nError = IPrinter.IF_OPEN("COM2", 9600);

        if ( 0 != nError)
        {
            System.out.print("Error en la apertura del puerto COM!\n");
            return;
        }

        nError = IPrinter.TIQUEABRE("C");
        nError = IPrinter.TIQUEITEM("ABRAZADERAS  ACER.IN",1.0,3.5712, 0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("BARDAHL ADIT. INYECT",1.000,4.84,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("CABALLA AL NATURAL C",1.000,3.03,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("GALL.FLIARES C/SALVA",1.000,2.66,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("REFRIG. FLUIDO LAVAC",1.000,9.68,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("NAIPES CASINO x 40",1.000,3.39,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("PALITO BOMBON",1.00,1.82,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("ELAION DIESEL 15W40",1.000,10.29,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("TABLETAS FUYI",1.000,1.21,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUEITEM("D1  15W40 x 5 LT",1.000,27.83,0.21,"M",1,0.0,0.0);
        nError = IPrinter.TIQUESUBTOTAL("P","Subtotal");
        nError = IPrinter.TIQUECIERRA("T");

        nError = IPrinter.PONEENCABEZADO(5, "EJEMPLO FACTURA A");

        nError = IPrinter.FACTABRE("T", "C", "A", "1", "P", "10", "I", "F", "Mi Empresa SRL", "", "CUIT",
                "30692137449", "N", "MEXICO 564", "Capital Federal", "", "Remito 01-2345", "", "C");

        nError = IPrinter.FACTITEM("Mouse Genius XScrol", 1.0, 4.08, 0.105, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Patchcord Cat.5E Gr", 5.0, 4.10, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Microfono NG-H300 N", 1.0, 4.12, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Mouse Genius Netscr", 1.0, 4.12, 0.105, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Ventilador Cyber Co", 2.0, 4.12, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Lector 3.5 MultiCar", 2.0, 4.22, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Teclado Noganet Esp", 2.0, 4.30, 0.105, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Antena SMA Kozumi W", 2.0, 4.33, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Teclado Ecovision W", 1.0, 4.39, 0.105, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Limpiador para Pant", 1.0, 4.44, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);
        nError = IPrinter.FACTITEM("Auricular Genius Mo", 1.0, 4.46, 0.210, "M", 1, 0.0, "", "", "", 0.0, 0.0);

        nError = IPrinter.FACTPAGO("DESCUENTO 10%", 9.46, "D");
        nError = IPrinter.FACTPAGO("PAGO", 100.0, "T");
        nError = IPrinter.FACTCIERRA("T", "A", "FINAL");

        IPrinter.IF_CLOSE();

    }

}
