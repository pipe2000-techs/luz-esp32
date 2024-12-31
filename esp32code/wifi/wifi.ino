
//si usas esp32
#include <HTTPClient.h>
#include <WiFi.h>
#include <ArduinoJson.h>

const char* ssid = "Repetidor 1";
const char* password =  "17319403";
const char* token =  "7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ";
int relay = 15;

void setup() {
  delay(10);
  Serial.begin(19200);

  //conetac al wifi
    WiFi.begin(ssid, password);

    Serial.print("Conectando...");
    while (WiFi.status() != WL_CONNECTED) { //Check for the connection
      delay(500);
      Serial.print(".");
    }

    Serial.print("Conectado con éxito, mi IP es: ");
    Serial.println(WiFi.localIP());
  /////

  //pin del rele como salida
  pinMode(relay, OUTPUT); // Configurar relay como salida o OUTP
  pinMode(2, OUTPUT); // 

}

void loop() {

  if(WiFi.status()== WL_CONNECTED){   //Check WiFi connection status

    HTTPClient http;
    http.begin(String("https://esp32.jgcasociados.com.co/mvc/controller/ConEsp32?dataluz&token=") + token);        //Indicamos el destino
    http.addHeader("Content-Type", "plain-text"); //Preparamos el header text/plain si solo vamos a enviar texto plano sin un paradigma llave:valor.

    int codigo_respuesta = http.GET();   //Enviamos el post pasándole, los datos que queremos enviar. (esta función nos devuelve un código que guardamos en un int)

    if(codigo_respuesta>0){
      Serial.println("Código HTTP ► " + String(codigo_respuesta));   //Print return code

      if(codigo_respuesta == 200){
        String cuerpo_respuesta = http.getString();
        Serial.println("El servidor respondió ▼ ");

        //convierte la respuesta del sevidor en in json 
          // Crear un buffer dinámico para el deserializador
          const size_t capacidad = JSON_OBJECT_SIZE(3) + 30; // Tamaño estimado
          DynamicJsonDocument doc(capacidad);

          // Intentar deserializar el JSON
          DeserializationError error = deserializeJson(doc, cuerpo_respuesta);

          if (error) {
            Serial.print("Error al parsear JSON: ");
            Serial.println(error.c_str());
            return;
          }
        //////////////////////

        const char* res = doc["res"];
        Serial.println(res);

        Serial.println("Estado luz▼ ");
        const char* estadoLus = doc["estadoluz"];
        Serial.println(estadoLus);

        //valida si se encinde o se apaga el rele
        if(estadoLus ==  String("1")){
          digitalWrite(relay, HIGH); // envia señal alta al relay
          digitalWrite(2, HIGH);
        }else{
          digitalWrite(relay, LOW);  // envia señal baja al relay
          digitalWrite(2, LOW);
        }


      }

    }else{

     Serial.print("Error enviando POST, código: ");
     Serial.println(codigo_respuesta);

    }

    http.end();  //libero recursos

  }else{

     Serial.println("Error en la conexión WIFI");

  }

   delay(1000);
}