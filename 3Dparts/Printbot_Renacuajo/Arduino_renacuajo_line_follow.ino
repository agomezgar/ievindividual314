/**  
 *
 *     ********************************************************
 *     ********************************************************
 *     ***                                                  ***
 *     ***              PRINTBOT RENACUAJO                  ***
 *     ***                                                  ***
 *     ******************************************************** 
 *     ********************************************************
 *
 *     Este programa permite que el Printbot Renacuajo siga 
 *     la pista negra del circuito. 
 *     
 *   ****************************************************
 *   * Fecha:04/03/2014                                 *
 *   * Autor de la version: Ana de Prado                *
 *   * Mail :  diy@bq.com                               *
 *   * Licencia: GNU General Public License v3 or later *
 *   ****************************************************
 */
/******************************************************************/
/******************************************************************/


/******************************************************************
 *                           Librerias                            *
 ******************************************************************/ 
#include <Servo.h>


/******************************************************************
 *                Definicion de las variables                     *
 ******************************************************************/

/*  Definicion de los pines de la placa que se van a usar         */

  #define pin_rotaServo_I     6   /*  Motor Izquierda             */  
  #define pin_rotaServo_D     9   /*  Motor Derecha               */  
  #define pin_sensorIR_I      2   /*  Sensor Infrarrojo Izquierda */ 
  #define pin_sensorIR_D      3   /*  Sensor Infrarrojo Derecha   */ 

/* Se crea un objeto de la clase Servo por cada uno de los servos */

  Servo RotaServo_I;
  Servo RotaServo_D;
  
/*  Definicion de otras variables                                 */  
  int valorIR_I;
  int valorIR_D;
  
  int estado;
  
  const int NEGRO = 0;
  const int BLANCO = 1;


/******************************************************************
 *                   Definicion de las funciones                  *
 ******************************************************************/

/**  Segmentar el código en funciones permite al programador crear 
 *   piezas modulares de código que realizan una tarea definida y
 *   vuelven a la zona del programa en la que fueron llamadas.
 *   El caso típico para crear un función es cuando uno necesita 
 *   realizar la misma acción múltiples veces dentro de un mismo
 *  programa.                                                    */

  void FijarMotores(int d, int i){
 
      RotaServo_D.write(d);
      delay(20);
      RotaServo_I.write(i);
      delay(20);
  }
  
  void Stop()     {
    
      FijarMotores(90, 90);
  }
  
  void GiraDerecha()  {
    
      FijarMotores(90, 0);
  }
  
  void GiraIzquierda(){
    
      FijarMotores(180, 90);
  }
  
  void Avanza()   {
    
      FijarMotores(180, 0);
  }


/******************************************************************
 *                             Setup                              *
 ******************************************************************/

/**  La función setup() se establece cuando se inicia un programa.
 *   Se emplea para iniciar variables, establecer el estado de los 
 *   pins, inicializar librerías, etc. Esta función se ejecutará 
 *   una única vez después de que se conecte la placa Arduino a la
 *   fuente de alimentación, o cuando se pulse el botón de reinicio
 *   de la placa.                                                 */

void setup() 
{ 
 
/**  A continuacion se configuran los pines segun el elemento
 *   que se le conecte                                            */
 
/*  Se unen los objetos de servo a su pin correspondiente         */
          
   RotaServo_I.attach(pin_rotaServo_I);
   RotaServo_D.attach(pin_rotaServo_D);
   
/*  Se configuran los pines de los sensores como entradas         */   

   pinMode(pin_sensorIR_I,INPUT); 
   pinMode(pin_sensorIR_D,INPUT);
  
/*  Se inicializa el estado a cero (Stop)                         */  
  
    estado = 0;
} 


/******************************************************************
 *                Bucle principal del programa                    *
 ******************************************************************/
 
/**  La función loop() hace que lo que haya en su interior se lea
 *   en un bucle infinito, por lo tanto se ejecuta consecutivamente,
 *   permitiéndole al programa variar y responder. Úsala para 
 *   controlar de forma activa la placa Arduino.                  */
 
void loop() 
{ 
  
   // Leemos el valor de los sensores
   valorIR_I = digitalRead(pin_sensorIR_I);
   valorIR_D = digitalRead(pin_sensorIR_D);
   
   /* ---------------------------------------------------------
    * | Sensor I | Sensor D | Estado |  Acciones              |
    * ---------------------------------------------------------
    * | blanco   | blanco   |    0   |    Stop                |
    * | blanco   | negro    |    1   |    Gira a la derecha   |
    * | negro    | blanco   |    2   |    Gira a la izquierda |
    * | negro    | negro    |    3   |    Avanza              |
    * ---------------------------------------------------------
   */
   
   // Actualizamos el estado  
   if     (valorIR_I == BLANCO && valorIR_D == BLANCO){ estado = 0; }
   else if(valorIR_I == BLANCO && valorIR_D == NEGRO) { estado = 1; }    
   else if(valorIR_I == NEGRO  && valorIR_D == BLANCO){ estado = 2; }   
   else if(valorIR_I == NEGRO  && valorIR_D == NEGRO) { estado = 3; } 
   
   // Actua segun el estado
   switch(estado) {
     
     case 0: Stop();          break;
     case 1: GiraDerecha();   break;
     case 2: GiraIzquierda(); break;
     case 3: Avanza();        break;
     
   }
    
    delay(10);

}

