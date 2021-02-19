

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            
            <div class="container bcontent">
        <div class="card">
            <div class="row no-gutters">
            
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title">Id patient : <?= $patient->id ?></h5>
                        <p class="card-text">Nom : <?= $patient->lastname ?> <br>
                        Prénom : <?= $patient->firstname ?> <br>
                        Date de naissance : <?= $patient->birthdate ?> <br>
                        E-mail : <?= $patient->mail ?> <br>
                        Téléphone : <?= $patient->phone ?> <br></p>
                        Rendez-vous le  : <?= $patient->dateHour ?> <br></p>

                        <a href="/controllers/rendezvousCtrl.php?id=<?= $patient->id?>">Modifer</a>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
                
                
              

                    
                  