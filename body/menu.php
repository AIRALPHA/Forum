
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Menu ☞</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php set_active('membre') ?>">
        <a class="nav-link" href="index.php?page=membre">Accueil ⛪<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php set_active('update') ?>">
        <a class="nav-link" href="index.php?page=update">Paramètres 🔧</a>
      </li>
       <li class="nav-item <?php set_active('liste_membre') ?>">
        <a class="nav-link" href="index.php?page=liste_membre">Membres 👦👧</a>
      </li>
       <li class="nav-item <?php set_active('amis') ?>">
        <a class="nav-link" href="index.php?page=amis">Amis ☃</a>
      </li>
       <li class="nav-item <?php set_active('invitations') ?>">
        <a class="nav-link" href="index.php?page=invitations"><?php echo (afficher_info_bulle() != 0) ? '<span class="font-weight-bold badge badge-pill badge-danger">'.afficher_info_bulle().'</span>' : ''; ?> Invitations 📩</a>
      </li>
       <li class="nav-item <?php set_active('conversations') ?>">
        <a class="nav-link" href="index.php?page=conversations"><?php echo (info_bulle_message() != 0) ? '<span class="font-weight-bold badge badge-pill badge-danger">'.info_bulle_message().'</span>' : '';?>Messages ✉</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="">
			  <?php
          echo (nombre_membre() > 1) ?
                    "Membres <span class='badge badge-light'>".nombre_membre()."</span>"
                    :
                    "Membre <span class='badge badge-light'>".nombre_membre()."</span>";
                    
                ?>
        </a>
      </li>
    </ul>
  </div>
</nav>