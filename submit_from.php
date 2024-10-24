<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $postulacion = array(
        "username" => $_POST["username"],
        "age" => $_POST["age"],
        "follower_time" => $_POST["follower_time"],
        "experience" => $_POST["experience"],
        "reason" => $_POST["reason"],
        "availability" => $_POST["availability"]
    );

    // Nombre del archivo donde se guardarán las postulaciones
    $file = 'postulaciones.json';

    // Lee el archivo JSON, si existe, y decodifica su contenido
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
    } else {
        // Si el archivo no existe, crea un array vacío
        $data = array();
    }

    // Añadir la nueva postulación al array
    $data[] = $postulacion;

    // Guarda los datos actualizados en el archivo JSON
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    echo "¡Postulación enviada correctamente!";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Postulación</title>
</head>
<body>
    <h1>Postúlate como Moderador</h1>
    <form action="submit_form.php" method="POST">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="follower_time">¿Desde cuándo eres seguidor?:</label>
        <input type="text" id="follower_time" name="follower_time" required><br><br>

        <label for="experience">Experiencia como moderador (si tienes):</label>
        <textarea id="experience" name="experience"></textarea><br><br>

        <label for="reason">¿Por qué quieres ser moderador?:</label>
        <textarea id="reason" name="reason" required></textarea><br><br>

        <label for="availability">Disponibilidad horaria:</label>
        <input type="text" id="availability" name="availability" required><br><br>

        <input type="submit" value="Enviar Postulación">
    </form>
</body>
</html>