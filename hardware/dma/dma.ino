#include <WiFi.h>


#include <Adafruit_Sensor.h>
#include "DHT.h"
#include <MQUnifiedsensor.h>

const char* ssid     = "";
const char* password = "";
const char* host = ""; //site


// -------  DHT --------

const int DHTPIN   =              4;                                 // Sensor DHT11 Pode ser usado as
                                                                     // seguintes portas 3, 4, 5, 12, 13 ou 14
// Define Modelo do DHT
#define DHTTYPE    DHT11       // DHT 11

// Define Variáveis do DHT
DHT dht(DHTPIN, DHTTYPE);
float humidity;     float humidity_atual;
float temperature;  float temperature_atual;




// -------  MQ-135 --------

#define placa "ESP32"
#define Voltage_Resolution 5
#define pin 12 //Analog input 0 of your arduino
#define type "MQ135" //MQ135
#define ADC_Bit_Resolution 12 // For arduino UNO/MEGA/NANO
#define RatioMQ135CleanAir 3.6//RS / R0 = 3.6 ppm  
//#define calibration_button 13 //Pin to calibrate your sensor

//Declare Sensor
MQUnifiedsensor MQ135(placa, Voltage_Resolution, ADC_Bit_Resolution, pin, type);

//float sensor1 = 50;
//float sensor2 = 60;
//float mq = 70;



void setup()
{
  Serial.begin(9600); //Init serial port

  dht.begin();
  
  //Set math model to calculate the PPM concentration and the value of constants
    MQ135.setRegressionMethod(1); //_PPM =  a*ratio^b
    MQ135.setA(111.2); MQ135.setB(-2.801); // Configurate the ecuation values to get NH4 concentration
  
    /*
      Exponential regression:
    GAS      | a      | b
    CO       | 605.18 | -3.937  
    Alcohol  | 77.255 | -3.18 
    CO2      | 110.47 | -2.862
    Tolueno  | 44.947 | -3.445
    NH4      | 111.2  | -2.801
    Acetona  | 34.668 | -3.369
    */
    
     
    MQ135.init(); 
   
    
    Serial.print("Calibrating please wait.");
    float calcR0 = 0;
    for(int i = 1; i<=10; i ++)
    {
      MQ135.update(); // Update data, the arduino will be read the voltage on the analog pin
      calcR0 += MQ135.calibrate(RatioMQ135CleanAir);
      Serial.print(".");
    }
    Serial.println(calcR0);
    MQ135.setR0(calcR0/10);
    Serial.println("  done!.");

    
    if(isinf(calcR0)) {Serial.println("Warning: Conection issue founded, R0 is infite (Open circuit detected) please check your wiring and supply"); while(1);}
    if(calcR0 == 0){Serial.println("Warning: Conection issue founded, R0 is zero (Analog pin with short circuit to ground) please check your wiring and supply"); while(1);}
    /*****************************  MQ CAlibration ********************************************/ 
    //Serial.println(calcR0);
    MQ135.serialDebug(true);
    MQ135.update(); // Atualizar os dados, o arduino irá ler a tensão no pino analógico



    Serial.println();
    Serial.println();
    Serial.print("Conectando com ");
    Serial.println(ssid);

    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi conetado");
    Serial.println("Enddereço IP: ");
    Serial.println(WiFi.localIP());

    Serial.println(WiFi.macAddress());
}


void loop()
{
  


  MQ135.readSensor();
  MQ135.serialDebug(); // Irá imprimir a tabela na porta serial
  
  float mq = MQ135.readSensor(); 
  Serial.print("ppmNH3 = ");
  Serial.println(mq);
  
  delay(500); //Frequência de amostragem

  //=======================================
  //    Espaço reservado para a leitura dos sensores

  
  // Leitura do DHT ******************************************************************
  humidity =    dht.readHumidity();
  temperature = dht.readTemperature();

  // Atuaização do DHT LCD ***********************************************************
  if (isnan(humidity) || isnan(temperature)) {
    Serial.println("Falha ao ler DHT!!");
  }
  else if (humidity_atual != humidity || temperature_atual != temperature) {
      humidity_atual = humidity;  temperature_atual = temperature;
      Serial.print("Temp.");  
      Serial.print(temperature);
      Serial.print("°");
      Serial.println("C");

      Serial.print("Umid.");
      Serial.print(humidity);
      Serial.println("%");
      Serial.println("====================");
    }
    
  String end_mac = WiFi.macAddress();
  //======================================






    Serial.print("conectado com ");
    Serial.println(host);

    // Use WiFiClient class to create TCP connections
    WiFiClient client;
    
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) {
        Serial.println("Falha na Conexão");
        return;
    }

    // We now create a URI for the request
    String url = "/dmaci/index.php/monitoramento/store?";// endereço da pagina
           url += "end_mac=";
           url += end_mac;
           url += "&amonia=";
           url += mq;
           url += "&temperatura=";
           url += temperature;
           url += "&humidade=";
           url += humidity;

    Serial.print("Requisitando URL: ");
    Serial.println(url);

    // This will send the request to the server
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
                 
    unsigned long timeout = millis();
    while (client.available() == 0) {
        if (millis() - timeout > 5000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
        }
    }

    // Read all the lines of the reply from server and print them to Serial
    while(client.available()) {
        String line = client.readStringUntil('\r');
        //Serial.print(line);

        
        if(line.indexOf("salvo_com_sucesso") != -1) {
          Serial.println();
          Serial.println("Foi salvo com sucesso");
          
        }else if(line.indexOf("erro_ao_salvar") != -1) {
          Serial.println();
          Serial.println("Ops, ocorreu um erro");
          //digitalWrite(alarm, HIGH);
        }
        
    }

    Serial.println();
    Serial.println("Conexão fechada");

    delay(10000);

}
