<?php 
  session_start(); 
  include('../console.php');

  if (!isset($_SESSION['username'])) {
  	header("location: ../login/index.php");
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
    <title>Tus favoritos · Spaceship</title>
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
      <small><a href="../" class="hache">Volver</a> · <a href="../index.php?logout='1'" class="card-link hache">Cerrar sesión</a></small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Favoritos</h6>
	<?php
	try {
	$db = mysqli_connect('localhost', 'root', '', 'spaceship');
	
	$username = $_SESSION['username'];
	$user_check_query = "SELECT * FROM favoritos WHERE username='$username'";
	$result = mysqli_query($db, $user_check_query);
	
	$row_cnt = mysqli_num_rows($result);
	
	if (mysqli_num_rows($result) == 0) {  ?>
		<div class="media text-muted pt-3">
			<svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
			<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				<strong class="d-block text-gray-dark">No añadiste ninguna canción a favoritos 😔</strong>
				¡Intentá presionar el ❤️ cuando estás escuchando una canción para añadirla a tus Favoritos y escucharla una y otra vez!
			</p>
		</div>
	<?php } else {
		// our query returned at least one result. loop over results and do stuff.
		while($row = mysqli_fetch_assoc($result)){ ?>
			<div class="media text-muted pt-3">
			  <img class="bd-placeholder-img mr-2 rounded" width="64" height="64" src="<?php echo $row['img']; ?>">
			  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				<strong class="d-block text-gray-dark" style="font-size: 140%;"><?php echo $row['name']; ?></strong><br>
				<a href="../index.php?song=<?php echo $row['link'] ?>&name=<?php echo $row['name'] ?>">Escuchar</a> •
				<a href="remove.php?username=<?php echo $username ?>&name=<?php echo $row['name'] ?>">Eliminar</a>
			  </p>
			</div>    <?php
		}
	
	}
	}
	catch(Exception $e){
		echo "NO FUNCIONO JAJA LEGO LEGOLAS $e ".$e;
	}?>
    
  </div>
  
    <div class="d-flex align-items-center p-3 my-3 bg-white rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 lh-100">¿Sos desarrollador web?</h6>
      <small>¡Descubrí cómo integrar Spaceship a tu proyecto con la <a href="../api"><b>API de Spaceship</b></a>!</small>
    </div>
  </div>

</main>
</html>
