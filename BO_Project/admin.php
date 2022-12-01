<?php
    include ('bdd.php'); //(chemin à adapter)
	if(!isset( $_SESSION['username'])){
		header('location: ./index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sezhair Gestion</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap-5.2.0/css/bootstrap.min.css">
	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->  
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="assets/images/favicon.png" />
	<style>
		.img-{
			width: 100px;
			height: 100px;
		}
	</style>
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">
		<!-- left navbar -->
		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="admin.php?page=1" class="sidebar-brand">
					Sezhair<span class="text-warning">Coiffure</span>
				</a>
				<div class="sidebar-toggler not-active">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="sidebar-body">
				<ul class="nav">
					<li class="nav-item nav-category">Accueil</li>
					<li class="nav-item">
						<a href="admin.php?page=1" class="nav-link">
							<i class="link-icon" data-feather="box"></i>
							<span class="link-title">Notre équipe</span>
						</a>
					</li>
					<li class="nav-item nav-category">Listes</li>
					<li class="nav-item">
						<a href="admin.php?page=2" class="nav-link">
							<i class="link-icon" data-feather="list"></i>
							<span class="link-title">Préstations</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="admin.php?page=3" class="nav-link">
							<i class="link-icon" data-feather="image"></i>
							<span class="link-title">Médias</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="admin.php?page=4" class="nav-link">
							<i class="link-icon" data-feather="message-square"></i>
							<span class="link-title">Contact</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
							<i class="link-icon" data-feather="shopping-cart"></i>
							<span class="link-title">Produits</span>
							<i class="link-arrow" data-feather="chevron-down"></i>
						</a>
						<div class="collapse" id="icons">
							<ul class="nav sub-menu">
								<li class="nav-item">
									<a href="" class="nav-link">Feather Icons</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">Flag Icons</a>
								</li>
								<li class="nav-item">
									<a href="" class="nav-link">Mdi Icons</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!-- fin left navbar -->
		<div class="page-wrapper">
					
			<!-- top navbar -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<?php
					$queryAdm = "SELECT * FROM administrateur";
					$reqAdm = $bdd->prepare($queryAdm);
					$reqAdm->execute();
					$dataAdm = $reqAdm -> fetch()
					// var_dump($dataAdm);
				?>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="https://via.placeholder.com/30x30" alt="userr">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0"><?php echo $dataAdm['username'];?></p>
										<p class="email text-muted mb-3"><?php echo $dataAdm['nom']. ' ' .$dataAdm['prenom'];?></p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="admin.php?page=14&id=<?php echo $dataAdm['id'];?>" class="nav-link">
												<i data-feather="edit"></i>
												<span>Edit Profile</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="index.php" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- fin top navbar -->
			<!--------------------------------------------------------------------------------------------------->
			<!--                                      page content                                             -->
			<div class="page-content">
			<div class="row">
				<?php
					if(isset($_SESSION['message'])){
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					}
				?>
			</div>
			<?php
				if(isset($_SESSION['admin']) && $_SESSION['admin']=='ADMIN'){
					if(isset($_GET['page'])){
						$page = $_GET['page'];
					}
					else{
						$page = 1;
					}
					}
					if($page == 1){
						include('pages/equipe.php');
					}
					elseif($page == 2){
						include('pages/prestations.php');
					}
					elseif($page == 3){
						include('pages/medias.php');
					}
					elseif($page == 4){
						include('pages/contact.php');
					}
					elseif($page == 5){
						include('pages/produits.php');
					}
					elseif($page == 6){
						include('traitements/modifier-equipe.php');
					}
					elseif($page == 7){
						include('traitements/modifier-prestations.php');
					}
					elseif($page == 8){
						include('traitements/supp-prestations.php');
					}
					elseif($page == 9){
						include('traitements/supp-medias.php');
					}
					elseif($page == 10){
						include('traitements/modifier-contact.php');
					}
					elseif($page == 11){
						include('traitements/ajout-med.php');
					}
					elseif($page == 12){
						include('traitements/ajout-prest.php');
					}
					elseif($page == 13){
						include('traitements/supp-contact.php');
					}
					elseif($page == 14){
						include('pages/profile.php');
					}
				else{
					$_SESSION['message']= '<div class="alert alert-danger text-center" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Vous n\'avez pas les droits pour accéder à cette zone</div>';
					// redirection vers le site (chemin à adapter)
				}
			?>
			</div>
			<!--                                    fin page content                                           -->
			<!--------------------------------------------------------------------------------------------------->

			<!-- footer -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2022</p>
			</footer>
			<!-- fin footer -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="assets/vendors/chartjs/Chart.min.js"></script>
	<script src="assets/vendors/jquery.flot/jquery.flot.js"></script>
	<script src="assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
	<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
	<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="assets/js/dashboard.js"></script>
	<script src="assets/js/datepicker.js"></script>
	<!-- end custom js for this page -->
	<!-- Function JS -->
	<script src="assets/js/function.js"></script>
	<!-- Bootstrap -->
	<script src="assets/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>    