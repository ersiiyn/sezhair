<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>INSCRIPTION</h2>
        </div>
        <div class="col-lg-10 mx-auto">
            <form class="needs-validation" method="POST" action="./php/traitement-insc.php">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nom" class="form-label">Nom *</label>
                        <input type="text" class="form-control" id="nom" name="nom"  required="">
                        <div class="invalid-feedback">Votre nom est requis.</div>
                    </div>
                    <div class="col-sm-6">
                        <label for="prenom" class="form-label">Prénom *</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="" value="" required="">
                        <div class="invalid-feedback">Votre prénom est requis.</div>
                    </div>
                    <div class="col-12">
                        <label for="pseudo" class="form-label">Nom d'utilisateur *</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="pseudo" id="pseudo" required="">
                            <div class="invalid-feedback">Votre nom d'utilisateur est requis.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Mot-de-passe *</label>
                        <div class="input-group has-validation">
                            <input type="password" class="form-control" id="mdp" name="mdp" required="" minlength="8" maxlength="15" required>
                            <div class="invalid-feedback">Mot-de-passe requis.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email *</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="toi@example.com" required="">
                            <div class="invalid-feedback">Votre email est requis.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="numero" class="form-label">Numéro de téléphone *</label>
                        <input type="tel" class="form-control" id="numero" name="numero" placeholder="07 66.." required="">
                        <div class="invalid-feedback">Votre numero est requis.</div>
                    </div>
                <hr class="my-4">
                <input type="submit" class="w-25 mx-auto btn btn-lg btn-dark mb-5" name="s'inscrire" value="S'inscrire">
            </form>
        </div>
    </main>
</div>