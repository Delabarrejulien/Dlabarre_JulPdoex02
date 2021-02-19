
<table class="table">


  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">firstname</th>
      <th scope="col">lastname</th>
      <th scope="col">affichage</th>
    </tr>


  </thead>
  <tbody>
  <?php foreach($listPatients as $patient) : ?>
  
    <tr>
      <td><?= $patient->id?></td>
      <td><?= $patient->firstname?></td>
      <td><?= $patient->lastname?></td>
      <td><a href="/controllers/profil-patientCtrl.php?id=<?= $patient->id?>">afficher</a></td>
      
    </tr>
    
    

    <?php endforeach ?>
  </tbody>
</table>

  
   
    

  


 

