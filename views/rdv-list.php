<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date et heure</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">aficher</th>
      <th scope="col">supprimer</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    foreach($appointed as $appointment) {
        ?>
        <tr>
            <th scope="row"><?=htmlentities($appointment->idAppointment)?></th>
            <td><?=htmlentities($appointment->dateHour)?></td>
            <td><?=htmlentities($appointment->lastname)?></td>
            <td><?=htmlentities($appointment->firstname)?></td>
            <td><a href="/controllers/rendezvousCtrl.php?id=<?=htmlentities($appointment->idAppointment)?>"><i class="far fa-edit"></i></a></td>
            <td><a href="/controllers/deleteRdvCtrl.php?id=<?=htmlentities($appointment->idAppointment)?>"><i class="fas fa-trash"></i></a></td>
        </tr>

    <?php } ?>

  </tbody>
</table>
    
  </tbody>
</table>