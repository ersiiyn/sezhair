<?php
	include('bdd.php');
	unset($_SESSION['prenom']);
	unset($_SESSION['nom']);
	unset($_SESSION['username']);
	unset($_SESSION['admin']);
	// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<style>
		body{
			background-color:#EEF5F9;
			padding-top:10%;
		}
		form{
			background-color:#fff;
			padding: 15px;
			border-radius:5px
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-5 mx-auto mt-5">
				<form method="POST" action="traitement.php" class="needs-validation">
					<h2 class="text-center mb-5">Sezhair<span class="text-warning"> Coiffure</span></h2>
					<div class="mb-3 row">
						<div class="col-10 m-auto">
							<input type="text" class="form-control" id="username" name="username" placeholder="Identifiant" required="">
						</div>
					</div>
					<div class="mb-3 row"> 
						<div class="col-10 mx-auto">
							<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required="">
						</div>
					</div>
					<div class="row">
						<?php
							if(isset($_SESSION['message'])){
								echo $_SESSION['message'];
								unset($_SESSION['message']);
							}
						?>
					</div>
					<div class="mt-5 row">
						<div class="col-12 text-center">
							<input type="submit" class="btn btn-lg btn-primary w-75" value="Connexion">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
	</script>
</body>

</html>