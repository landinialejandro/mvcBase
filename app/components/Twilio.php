<?php// Crear una instancia de la clase twilioApi
$twilio = new twilioApi('TU_CLAVE_DE_API', 'TU_CLAVE_SECRETA');

// Obtener el último mensaje recibido para saber desde dónde comenzar a buscar nuevos mensajes
$ultimo_mensaje = $twilio->getLastMessage();

// Iniciar un bucle infinito para buscar nuevos mensajes periódicamente
while (true) {
  // Esperar un segundo antes de hacer la siguiente solicitud a la API de twilio
  sleep(1);

  // Obtener los mensajes nuevos desde el último mensaje recibido
  $mensajes_nuevos = $twilio->getMessages($ultimo_mensaje);

  // Procesar cada mensaje nuevo recibido
  foreach ($mensajes_nuevos as $mensaje) {
    // Obtener los detalles del mensaje y procesarlos
    $texto = $mensaje['text'];
    $numero = $mensaje['from'];

    // Procesar el mensaje recibido, por ejemplo, responder al mensaje
    enviar_respuesta($numero, 'Gracias por tu mensaje!');
  }

  // Actualizar el último mensaje recibido para la próxima solicitud de mensajes nuevos
  $ultimo_mensaje = end($mensajes_nuevos)['id'];
}

// Función para enviar una respuesta a un número de teléfono en twilio
function enviar_respuesta($numero, $mensaje) {
  // Crear una instancia de la clase twilioApi
  $twilio = new twilioApi('TU_CLAVE_DE_API', 'TU_CLAVE_SECRETA');

  // Enviar la respuesta al número de teléfono correspondiente
  $resultado = $twilio->sendSms($numero, $mensaje);

  // Verificar si el mensaje se envió correctamente
  if ($resultado['success']) {
    echo 'Mensaje enviado exitosamente!';
  } else {
    echo 'Error al enviar el mensaje: ' . $resultado['error'];
  }
}
