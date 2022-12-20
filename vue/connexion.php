<div class="box-connexion">
    <div class="container-fluid box-container">   
        <div class="col-md-12 col-lg-10 mx-auto">
            <div class="row">
                <main class="form-signin w-100 m-auto">
                    <form class="needs-validation" method="POST" action="../controleur/traitement-co.php">
                        <!-- Titre connectez vous -->
                        <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Nom d'utilisateur" required="">
                            <label for="pseudo">Nom d'utilisateur</label>
                            <div class="invalid-feedback">Votre nom d'utilisateur est requis.</div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot-de-passe" required="">
                            <label for="mdp">Mot-de-passe</label>
                            <div class="invalid-feedback">Votre mot-de-passe est requis.</div>
                        </div>
                        <!-- Se souvenir -->
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Se souvenir de moi
                            </label>
                        </div>
                        <!-- Bouton envoyer -->
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" class="btn btn-lg w-100 mt-2 btn-dark" name="connexion" value="Connexion">
                            </div>
                        </div>
                    </form>
                    <!-- Lien mdp oublie ou creer un compte -->
                    <div class="row">
                        <div class="col-lg-12 mt-3 text-center">
                            <a href="index.php?page=7" class="ms-4">Créer un compte</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <?php
                            if(isset($_SESSION['message'])){
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                        ?>
                    </div>
                </main>
            </div>
        </div>
    </div> 
    <!-- Image -->
    <div class="image-connexion">
        <img class="razor" src="../public/assets/img/connexion/razor.png">
    </div>
</div>
