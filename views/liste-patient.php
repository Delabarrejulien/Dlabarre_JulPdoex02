<!-- Affichage d'un message d'erreur personnalisé -->
<?php 
if(!empty($msgCode) || $msgCode = trim(filter_input(INPUT_GET, 'msgCode', FILTER_SANITIZE_STRING))) {
    if(!array_key_exists($msgCode, $displayMsg)){
        $msgCode = 0;
    }
    echo '<div class="alert '.$displayMsg[$msgCode]['type'].'">'.$displayMsg[$msgCode]['msg'].'</div>';
} ?>
<!-- -------------------------------------------- -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">phone</th>
      <th scope="col">Email</th>
      <th scope="col">Profil</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $i=0;
    foreach($allPatients as $patient) {
        $i++;
        ?>
        <tr>
        <th scope="row"><?=$i?></th>
        <td><?=htmlentities($patient->firstname)?></td>
        <td><?=htmlentities($patient->lastname)?></td>
        <td><?=htmlentities($patient->birthdate)?></td>
        <td><?=htmlentities($patient->phone)?></td>
        <td><?=htmlentities($patient->mail)?></td>
        <td><a href="/controllers/profil-patientCtrl.php?id=<?=htmlentities($patient->id)?>"><i class="far fa-edit"></i></a></td>
        </tr>
    <?php } ?>

  </tbody>
</table>