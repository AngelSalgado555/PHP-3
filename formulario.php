<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formulario </title>
</head>
<body>
    <form action="landing.php" method="POST"> 
        <label for="name"> Nombre: </label>
        <input type="text" name="name" placeholder="Nombre...">
        <br>

        <label for="pass"> Contraseña: </label>
        <input type="password" name="pass" placeholder="Contraseña...">
        <br>
        
        <label for="terminos"> Aceptar terminos: </label>
        <input type="checkbox" name="terminos">
        <br>

        <label for="subjects"> Asignaturas: </label>
        <select name="subjects" id="list">
            <option value="DWES"> Desarrollo Web en Entorno Servidor </option>
            <option value="DWEC"> Desarrollo Web en Entorno Cliente </option>
            <option value="DIW"> Diseño Aplicaciones Webs </option>
        </select>
        <br>

        <input type="radio" id="man" name="gender" value="man">
        <label for="man"> Hombre </label>
        <br>

        <input type="radio" id="women" name="gender" value="woman">
        <label for="women"> Mujer </label>
        <br>

        <input type="radio" id="other" name="gender" value="other">
        <label for="other"> Otro </label>
        <br>
        
        <input type="submit" value="Enviar">

    </form>
</body>
</html>