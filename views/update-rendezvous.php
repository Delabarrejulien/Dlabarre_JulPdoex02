

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
                        <p class="card-text">Nom : <?= $appointed->lastname ?> <br>
                        Prénom : <?= $appointed->firstname ?> <br>
                        Date de naissance : <?= $appointed->birthdate ?> <br>
                        E-mail : <?= $appointed->mail ?> <br>
                        Téléphone : <?= $appointed->phone ?> <br></p>
                        Rendez-vous le  : <?= $appointed->dateHour ?> <br></p>

                        <form method="POST" class="border border-light p-5">
                        <p class = "h4 mb-4 text-center">changement de rendez-vous.</p>

                        <input type="datetime-local" id="dateHour" name="dateHour" class="form-control mb-4">

                      
                        <button type="submit">Valider</button>
                        </form>  
                    
                    </div>
                </div>
            </div>
        </div>
    </div> 
  
                
              

                    
                  