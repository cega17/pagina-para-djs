<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recopila los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Dirección de correo electrónico a la que se enviará la solicitud
    $destinatario = 'tu_correo@gmail.com'; // Cambia esto por tu dirección de correo

    // Asunto del correo
    $asunto = 'Solicitud de Canción Personalizada';

    // Construye el cuerpo del correo
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo Electrónico: $email\n";
    $cuerpo .= "Mensaje:\n$mensaje";

    // Encabezados del correo
    $encabezados = "From: $email\r\n";
    $encabezados .= "Reply-To: $email\r\n";

    // Envía el correo
    if (mail($destinatario, $asunto, $cuerpo, $encabezados)) {
        echo '<p>¡Tu solicitud ha sido enviada con éxito!</p>';
    } else {
        echo '<p>Hubo un error al enviar la solicitud. Por favor, inténtalo nuevamente más tarde.</p>';
    }
}
?>
