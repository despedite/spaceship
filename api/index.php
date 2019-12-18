<?php 
  session_start(); 
  include('../console.php');

  if (!isset($_SESSION['username'])) {
  	header("location: login/index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="https://media1.tenor.com/images/fca14e30a27aff8b3a0740744c6105ef/tenor.gif?itemid=13485574" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Documentación de la API · Spaceship</title>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono&display=swap" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>
  <body class="bg-dark">


<main role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <img class="mr-3" src="https://media1.tenor.com/images/fca14e30a27aff8b3a0740744c6105ef/tenor.gif?itemid=13485574" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Spaceship.fm</h6>
      <small><a href="../" class="hache">Volver</a></small>
    </div>
  </div>
  
    <div class="d-flex align-items-center p-3 my-3 bg-white rounded shadow-sm">
    <div class="lh-100">
      <h4 class="mb-0 lh-100">Documentación de la API de Spaceship</h4>
	  <hr>
      <b>Spaceship</b>, internamente Spaceship.fm, es una página y aplicación de música on-demand, asemejante a una radio. Los usuarios escuchan canciones seleccionadas al azar, y si se registraron o iniciaron sesión, pueden acceder a su perfil, agregar canciones a Favoritos, y volver a escuchar las canciones que les gustaron.<br>
	  Spaceship incluye una API de acceso publico, donde cualquier persona puede utilizar los datos en nuestra base de datos mediante <a href="https://es.wikipedia.org/wiki/JSON">el formato JSON</a>, acceder a los usuarios y la música que se encuentra en nuestros servidores. La siguiente documentación explica el proceso para utilizar la base de datos de Spaceship de forma externa.
	  <hr>
	  El acceso a la API se realiza mediante el link <b>http://erik.games/spaceship/api/v1/getData.php</b>. Navegar a ese link en el navegador dará un mensaje de error con el código 301: <i>Parámetros inválidos</i>. La API de Spaceship tiene varias formas de introducir parámetros:<br>
	  <h5>Formato</h5>
	  Hay dos tipos de formato compatibles con la API: formato <i>tabla</i>, y formato <i>JSON</i>. El formato de tabla sólo es útil para visualizar los datos en una página web, así que esta guía se va a enfocar en el formato .JSON (utilizado para programación). El formato es indicado de esta forma:
	  <code>
		http://erik.games/spaceship/api/v1/getData.php?f=json
	  </code>
	  <h5>Tabla</h5>
	  Indica la tabla de la cuál la API va a recibir información. Si bién en la base de datos hay más tablas (usuarios y favoritos, por ejemplo), por ahora sólo la tabla de música está disponible - la cual muestra toda la música que está disponible y reproducible al azar en el sitio web. Ejecutar el siquiente comando en un navegador mostrará tódas las canciones disponibles en Spaceship.
	  <code>
		http://erik.games/spaceship/api/v1/getData.php?f=json&t=musica
	  </code>
	  <h5>Búsqueda</h5>
	  Indica qué data estás buscando en la base de datos. Por ejemplo, si buscás "nombre", sólo vás a encontrar la data de los nombres de todas las canciones en Spaceship. Los datos disponibles son <i>nombre, artista, id, url y foto</i>.
	  <code>
		http://erik.games/spaceship/api/v1/getData.php?f=json&t=musica&c=nombre
	  </code>
	  <hr>
	  <h5>Ejemplo de uso</h5>
	  Para recibir los datos en Javascript, podés usar la URL de la API. Para guardar los datos de la API en una variable (en Javascript), podés usar XML.
	  <code>
		var dataEnJson = "http://erik.games/spaceship/api/v1/getData.php?f=json&t=musica";<br>
		var xhReq = new XMLHttpRequest();<br>
		xhReq.open("GET", dataEnJson, false);<br>
		xhReq.send(null);<br>
		const spaceship = JSON.parse(xhReq.responseText);<br>
		console.log(spaceship.data); //Imprime los datos de todas las canciones.
	  </code>
	  Si querés, por ejemplo, imprimir el nombre de una canción y su artista, podés randomizar el valor y imprimirlo de esta forma:
	  <code>
		const numeroAlAzar = parseInt(Math.random() * sppaceship.data.length);<br>
		var nombreAlAzar = spaceship.data[numeroAlAzar][2] + " - " + spaceship.data[numeroAlAzar][3];<br>
		console.log(nombreAlAzar);
	  </code>
    </div>
  </div>

</main>
</html>