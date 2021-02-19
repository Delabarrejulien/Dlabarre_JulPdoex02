<form method="POST" class="border border-light p-5">

<p class = "h4 mb-4 text-center">Prise de rendez-vous.</p>



<select class="form-select" aria-label="Default select example" name="idPatients">
  <option selected>Choisir un patient.</option>
  <?php
  foreach($allPatients as $patient){?>

    <option value="<?=$patient->id?>"> <?=$patient->lastname?> <?=$patient->firstname?></option>
 <?php }
  ?>
  
</select>
<br>

<input type="datetime-local" id="dateHour" name="dateHour" class="form-control mb-4">


<button type="submit">Valider</button>

</form>