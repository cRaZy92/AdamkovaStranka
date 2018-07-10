<?php
session_start();

if(isset($_SESSION['signed_in']))
{
    $title="Chyba!";
    include "html_hlavicka.php";
    include "body_start.php";
    echo 'Už si prihláseny! <a href="index.php">Klikni sem pre návrat.</a>'; 
}
else
{
    $title="Prihlásenie";
    include "html_hlavicka.php";
    
    if(isset($_POST['login'])){
        require "db_pripojenie.php";
            
            //prevzatie informacii z formulara
        $nick_email = htmlspecialchars($_POST['nick_email']);
        $password = htmlspecialchars($_POST['heslo']);

    //hladanie uzivatela v databaze podla nicku alebo emailu
    $vysledok = mysqli_query($db_spojenie, 
    "SELECT 
        user_id, nick, password, name, surname, gender, email, reg_date
    FROM
        users
    WHERE
        nick ='$nick_email'
    OR 
        email = '$nick_email'");

 if(!$vysledok)
    echo 'Skus znova. Chyba:' . mysql_error();
 else{
    if(mysqli_num_rows($vysledok) == 0)
        $login_error = 1;
    else{
        $user_login = mysqli_fetch_array($vysledok);
        $hashed_password = $user_login['password'];

        if(password_verify($password, $hashed_password) == true){//kontrola zhody hesla s heslom v databaze 
            
            if(isset($_POST['remember_me']) && $_POST['remember_me'] == 1){
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('nick_email', $nick_email, time() + (86400 * 30));
                    setcookie('password', $password, time() + (86400 * 30));
                    }
+
            $_SESSION['user_id'] = $user_login['user_id'];
            $_SESSION['nick'] = $user_login['nick'];
            
            $_SESSION['signed_in'] = true;  //uzivatel je prihlaseny
            $id = $_SESSION['user_id'];
            header('location: index.php');
        }
        else
            $login_error = 1;
    }
 }
    if($db_spojenie) mysqli_close($db_spojenie);
}
//formular pre prihlasenie
?>


<form class="form-signin text-center" action="login.php" method="post">
<?php
if(isset($_SESSION['n_user']))
{
    //hlasenie o uspesnej registracii
    echo '<div class="alert alert-success">
      <strong>Úspešne registrovaný!</strong> Môžeš sa prihlásiť.
          </div>';
}
?>
      <img class="mb-4" src="img/a_logo_inverted_edit.jpg" alt="logo" width="128" height="128">
      <h1 class="h3 mb-3 font-weight-normal">Prihlás sa</h1>
      <div class="input-group">
      <input type="text" name="nick_email" class="form-control" placeholder="Nick alebo email" required autofocus>
      
      </div>
      <input type="password" name="heslo" id="inputPassword" class="form-control" placeholder="Heslo" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember_me" value="1" id="remember_me"> Zapamätať si ma
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Prihlásiť</button>
      <br>
      
      <?php

      if(isset($login_error)){
        echo '<div class="alert alert-danger">
      <strong>Chyba!</strong> Nesprávne prihlasovacie údaje.</div>';
      }
      echo "</form>";
    
}
include "html_pata.php";

?>