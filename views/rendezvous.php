

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            
            <div class="container bcontent">
        <div class="card">
            <div class="row no-gutters">
            
                <div class="col-sm-12">
                    <div class="card-body">

             
                        <h5 class="card-title">Id patient : <?= $appointed->idPatient ?></h5>
                        <p class="card-text">Nom : <?= $appointed->lastname ?> <br>
                        Prénom : <?= $appointed->firstname ?> <br>
                        Date de naissance : <?= $appointed->birthdate ?> <br>
                        E-mail : <?= $appointed->mail ?> <br>
                        Téléphone : <?= $appointed->phone ?> <br></p>
                        Rendez-vous le  : <?= $appointed->dateHour ?> <br></p>


                        <a href="/controllers/update-rendezvousCtrl.php?id=<?= $appointed->idAppointment?>">Modifer</a>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
                
                
              

                    
                  