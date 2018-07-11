<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i>  Domov</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

        

<?php
  if($_SESSION['admin'] === true){
    ?>
      <li class="divider-vertical"></li>
      <li class="nav-item dropdown">
            <button class="btn btn-link dropdown-toggle text-white" type="button" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span  style="font-size:18px"><i class="fas fa-user-tie"></i> Admin</span></button>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="https://github.com/cRaZy92/AdamkovaStranka/projects/1" target="blank">To-Do List</a>
                    <a class="dropdown-item  disabled" href="">Odkazy</a>
                    <a class="dropdown-item" href="db_users.php">All users</a>
                </div>
          </li>

          <li class="nav-item disabled">
            <a class="nav-link text-mute" href="#"><i class="fab fa-teamspeak"></i> TeamSpeak 3</a>
          </li>

          
          <?php
  }
?>
<!--
          <li class="divider-vertical"></li>

          <li class="nav-item">
            <a class="nav-link text-light" href="db_odkaz.php"><i class="far fa-envelope"></i> Zanechaj odkaz</a>
          </li>
-->
          <li class="divider-vertical"></li>

          <li class="nav-item">
            <a class="nav-link text-light" href="forum.php"><i class="fab fa-stack-exchange"></i> Fórum</a>
          </li>

        </ul>

        <div class="nav-item dropdown" id="user_menu">
        <button class="btn btn-link dropdown-toggle" type="button" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span  style="font-size:18px"><i class="fas fa-user"></i>  <?php echo $_SESSION['nick']; ?></span></button>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="profile.php"><i class="far fa-address-card"></i> Zobraziť profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Odhlásiť</a>
                </div>
        </div>
      </div>
</nav>