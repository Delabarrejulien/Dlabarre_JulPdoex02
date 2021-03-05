<!-- Affichage d'un message d'erreur personnalisé -->
<?php 
if(!empty($msgCode) || $msgCode = trim(filter_input(INPUT_GET, 'msgCode', FILTER_SANITIZE_STRING))) {
    if(!array_key_exists($msgCode, $displayMsg)){
        $msgCode = 0;
    }
    echo '<div class="alert '.$displayMsg[$msgCode]['type'].'">'.$displayMsg[$msgCode]['msg'].'</div>';
} ?>
<!-- -------------------------------------------- -->
<br>
<br>

<form action="" method="GET">
   <input type="search" name="search" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Profil</th>
      <th scope="col">rendez-vous</th>
      <th scope="col">effacer</th>
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
       
        <td><a href="/controllers/profil-patientCtrl.php?id=<?=htmlentities($patient->id)?>"><i class="far fa-edit"></i></a></td>
        <td><a href="/controllers/all-appointments-by-patientCtrl.php?id=<?=htmlentities($patient->id)?>"><i class="far fa-edit"></i></a></td>
        <td><a href="/controllers/delete-patientCtrl.php?id=<?=htmlentities($patient->id)?>"><i class="fas fa-trash"></i></a></td>
        </tr>
    <?php } ?>

  </tbody>
</table>

<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>