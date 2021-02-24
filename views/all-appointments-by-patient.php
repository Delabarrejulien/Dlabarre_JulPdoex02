

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            
            <div class="container">
        <div class="card">
            <div class="row no-gutters">
            
                <div class="col-sm-12">
                    <div class="card-body">

             
                        <h5 class="card-title">Id patient : <?= $appointed->idPatient ?></h5>
                        <p class="card-text">
                        
                        Nom : <?= $appointed->lastname ?> <br>
                        Prénom : <?= $appointed->firstname ?> <br>
                        <?php 
                            foreach($allAppointed as $appointments) {
                        ?> 
                        Rendez-vous le  : <?= $appointments->dateHour ?> <br></p>
                        <?php } ?>

                    
                    </div>
                </div>
            </div>
        </div>
    </div> 
  
                
              

                    
                  