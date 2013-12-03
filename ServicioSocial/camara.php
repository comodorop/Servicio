<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Accediendo a la camara web desde HTML5</title>
</head>
 
<body>
        <div>
            <video id="live" width="320" height="240" autoplay></video>
        </div>
        <script>
        //Guardar el objeto video en una variable
        video = document.getElementById("live");
 
        //Acceder al dispositivo de camara web para mostrar el video
        navigator.webkitGetUserMedia("video",
                function(stream) {
                    video.src = webkitURL.createObjectURL(stream);//Obtenemos el video fuente de nuestra eitqueta video para mostrarlo
                },
                function(err) {
                    console.log("Unable to get video stream!");//obtenemos algun error posible al realizar esto
                }
        );
        </script>
    </body>
</html>