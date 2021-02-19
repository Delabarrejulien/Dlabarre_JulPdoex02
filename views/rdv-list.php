<table class="table">


  <thead>
    <tr>
      
      <th scope="col">dateHour</th>
      <th scope="col">idPatient</th>
      <th scope="col">modifier</th>
    </tr>


  </thead>
  <tbody>
  <?php foreach($appointed as $appointement) : ?>
  
    <tr>
      
      <td><?= $appointement->dateHour?></td>
      <td><?= $appointement->idPatient?></td>
      
      <td><a href="/controllers/ajout-rendezvousCtrl.php?id=<?= $patient->id?>">créer un autre rendez-vous</a></td>
      
    </tr>
    
    

    <?php endforeach ?>
  </tbody>
</table>