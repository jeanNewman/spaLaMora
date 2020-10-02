<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png">
   

    <title>Yape Payments.. La Mora Pasteleria</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <link href="css/plantilla.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cc4e3d0d63.js" crossorigin="anonymous"></script>

</head>

<body class="app">
    <div id="app">


        <div class="app-body">

            <!-- Contenido Principal -->
            <yapepago :datos = "{{ json_encode($datos) }}"></yapepago>
            <!-- /Fin del contenido principal -->
        </div>
    </div>
    <footer class="app-footer">
        <span><a href="http://www.lamorapasteleria.com/">La Mora Pasteleria</a> &copy; 2020</span>
        <span class="ml-auto">Desarrollado por <a href="#">Jean Newman</a></span>
    </footer>


    <script src="js/app.js"></script>
    <script src="js/plantilla.js"></script>
</body>

</html>