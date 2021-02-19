

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            
            <div class="container bcontent">
        <div class="card">
            <div class="row no-gutters">
            
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title">Id patient : <?= $profil->id ?></h5>
                        <p class="card-text">Nom : <?= $profil->lastname ?> <br>
                        Prénom : <?= $profil->firstname ?> <br>
                        Date de naissance : <?= $profil->birthdate ?> <br>
                        E-mail : <?= $profil->mail ?> <br>
                        Téléphone : <?= $profil->phone ?> <br></p>

                        <a href="/controllers/update-patientCtrl.php?id=<?= $profil->id?>">Modifer</a>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
                
                
              

                    
                  