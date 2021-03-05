<!-- Affichage d'un message d'erreur personnalisé -->
<?php 
if(!empty($msgCode) || $msgCode = trim(filter_input(INPUT_GET, 'msgCode', FILTER_SANITIZE_STRING))) {
    if(!array_key_exists($msgCode, $displayMsg)){
        $msgCode = 0;
    }
    echo '<div class="alert '.$displayMsg[$msgCode]['type'].'">'.$displayMsg[$msgCode]['msg'].'</div>';
} ?>
<!-- -------------------------------------------- -->

        <h1>Formulaire</h1>
        <form action="" method="POST">
            <fieldset>

                 <legend>Inscriptions patient</legend>
                <br>
                <br>
                <?= isset($error1)? $error1: '';?>
                
                <div class="form-group">
                <label for="exampleInputEmail1">Last name</label>
                    <input type="text" class="form-control" title="en toutes lettres" name='name' id="name" 
                        placeholder="Nom" pattern="[a-zA-ZÀ-ÿ\s]{2,20}" required >
                
                </div>
                
                <br> 

                  <?= isset($error1)? $error1: '';?>
               
                <div class="form-group">
                <label for="exampleInputEmail1">First name</label>
                    <input type="text" class="form-control" title="en toutes lettres" name='surname' id="surname" size="20"
                        placeholder="Prénom" pattern="[a-zA-ZÀ-ÿ\s]{2,20}" required >
                </div> 

                 <br> 
                <?= isset($error1)? $error1: '';?> 
                <div class="form-group">
                <label for="exampleInputEmail1">Birthday</label>
                    <input type="date" class="form-control" name='birthday' id="birthday" >
                </div>
                
                <br>
                <?= isset($error1)? $error1: '';?>
                
                <label for="exampleInputEmail1">phone</label>
                <input type="tel" class="form-control" name='phone' id="phone" placeholder="Téléphone"
                pattern="(01|02|03|04|05|06|07|08|09)[ .-]?[0-9]{2}[ .-]?[0-9]{2}[ .-]?[0-9]{2}[ .-]?[0-9]{2}" required    >
                
                <br>
                <?= isset($error1)? $error1: '';?>

                <div class="form-group">
                <label for="exampleInputEmail1">email</label>
                <input type="email" class="form-control" name='email' id="email" placeholder="E-mail"  >
                </div>

                <?= isset($error1)? $error1: '';?>
                <br>
                <br>
        
                <input type="submit" value="Valider" />

            </fieldset>
        </form>
    </div>




