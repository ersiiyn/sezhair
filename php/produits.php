<div class="container text-center mt-5">
    <div class="row align-items-start">
        <div class="col">
            <a href="#" class="link-dark">One of three columns</a>
        </div>
        <div class="col">
            <a href="#" class="link-dark">One of three columns</a>
        </div>
        <div class="col">
            <a href="#" class="link-dark">One of three columns</a>
        </div>
        <div class="col">
            <a href="#" class="link-dark">One of three columns</a>
        </div>
        <div class="col">
            <a href="#" class="link-dark">One of three columns</a>
        </div>
    </div>
</div>
<?php
    if(isset($_GET['souscat_produits'])){
        $cat =$_GET['souscat_produits'];
        // requete
        $querySCP = "SELECT * FROM  souscat_produits WHERE id= :id ";
        $reqSCP = $bdd->prepare($querySCP);
        $reqSCP->bindValue(':id', $cat, PDO::PARAM_STR);
        $reqSCP->execute();
        while($dataSCP = $reqSCP -> fetch()){
            // var_dump($dataSCP);
        }
    }
?>
<div class="container-fluid mt-5 border border-3 border-dark">
    <div class="col">
        <div class="row">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $dataSCP['nom']?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid mt-5 mb-5 border border-3 border-dark">
    <div class="card-group col-lg-3 col-sm-8 mx-auto">
        <div class="card">
            <img src="./img/produits/gel-rouge.jpg" class="card-img-top w-75 mx-auto" alt="...">
            <div class="card-body mx-auto">
                <h5 class="card-title">Bros rouge</h5>
                <p class="card-text fw-bold">5.60€</p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-link link-dark" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Aperçu rapide
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>