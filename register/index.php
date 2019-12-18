<?php include('../server.php') ?>

<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
<meta charset="utf-8">

<style>
  body{
    background-image: url('https://media1.giphy.com/media/t4DcI9P3dNVoA/giphy.gif');
    background-size: cover;
    
    height: 100vh;
    padding:0;
    margin:0;
    background-position: center; 
}
  #cent {
  position:absolute;
  top:50%;
  left:50%;
  margin-top:-211px; /* this is half the height of your div*/  
  margin-left:-144px; /*this is half of width of your div*/
  background-color: white;
}
  
  .font-old {
  	font-family: 'IBM Plex Mono', monospace;
  }
</style>
<link rel="shortcut icon" href="https://media1.tenor.com/images/fca14e30a27aff8b3a0740744c6105ef/tenor.gif?itemid=13485574" type="image/x-icon" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<body onload="checkMusic();">
 
<div class="card text-white bg-dark font-old" style="width: 18rem;" id="cent">
  <div class="card-body">
    <h5 class="card-title">Registrate</h5>
	<?php include('../errors.php'); ?>
	<form method="post" action="index.php">
	  <div class="form-group">
		<label for="exampleInputEmail1">Nombre de usuario</label>
		<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="username" class="form-control" id="inlineFormInputGroup" placeholder="fandelamusica" name="username">
		</div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Contraseña</label>
		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="••••••••" name="password">
	  </div>
	  <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="escuch@dor.es" name="email">
    <small id="emailHelp" class="form-text text-muted">¡No te preocupes! Nunca te enviaremos correos.</small>
  </div>
	  <button type="submit" class="btn btn-primary" name="reg_user">¡Listo!</button>
	</form>
    <a href="../login" class="card-link"><button type="button" class="btn btn-outline-secondary">Iniciá ses.</button></a>
  </div>
</div>
  
  <script>
    var x = document.getElementById("newtext");
    x.innerHTML = nameofsong;
  </script>
  
</div>