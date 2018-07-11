<?php
session_start();
$title = "Domov";
include "html_hlavicka.php";
    
?>
    <main role="main" class="container">

      <div style="text-align:center">
        <h1>Vitaj na našej stránke</h1>
        <?php
        if(!isset($_SESSION['signed_in'])){
            echo '<p class="lead">Teraz sa môžeš prihásiť alebo registrovať.</p>';
        }
        else{
            ?>
            <p class="lead">Úspešne prihásený.<br> Môžeš preskúmať náš web.</p>
            <p class="lead">Viem že táto stránka nie je dokonalá, preto je dôležité aby mi napísali každú chybu ktorú nájdete. Zanechať ju môžte tu:</p>
            <button type="button" class="btn btn-warning" name="chyba" onclick="location.href='leave_message.php';" > <i class="fas fa-bug"></i>  Nahlásiť chybu</button>

        
        
        
            <?php
        }
        echo "<br>";
        /*
        echo "Cookies: ";
        echo "<br>";
        print_r($_COOKIE);    //vypise vsetky ulozene cookies
        echo "<br>";
        echo "<br>";
        echo "Session vars: ";
        echo "<br>";
        print_r($_SESSION);   //vypise vsetko zo session
        */
     /*
        echo "<br>";
        echo '<input type="submit" class="btn btn-success" name="info" value="info">';

        if(isset($_POST['info'])){
        try{
            require_once("ts/libraries/TeamSpeak3/TeamSpeak3.php");
            // connect to server, authenticate and grab info
            $ts3_connect = TeamSpeak3::factory("serverquery://test:iBBjRNmB@ts3.hicoria.com:10016/?server_port=22631&blocking=0");
            // variable
            $server_status = $ts3_connect->virtualserver_status;
            $server_name = $ts3_connect->virtualserver_name;
            $server_adress = $ts3_connect->getAdapterHost();
            $server_uptime = TeamSpeak3_Helper_Convert::seconds($ts3_connect->virtualserver_uptime);
            $server_actuallyusers = $ts3_connect->virtualserver_clientsonline - $ts3_connect->virtualserver_queryclientsonline;
            $server_maxusers= $ts3_connect->virtualserver_maxclients;
            $server_channels = $ts3_connect->virtualserver_channelsonline;
            $server_download = TeamSpeak3_Helper_Convert::bytes($ts3_connect->connection_filetransfer_bytes_received_total + $ts3_connect->connection_bytes_received_total);
            $server_upload = TeamSpeak3_Helper_Convert::bytes($ts3_connect->connection_filetransfer_bytes_sent_total + $ts3_connect->connection_bytes_sent_total);
            ?>
            
            <table class="table table-bordered" style="float:right">
            <tr>
            <td>Status serveru:</td><td class='server_online'><?php echo $server_status ?></td>
            </tr>
            <tr>
            <td>Meno serveru:</td><td class='server_name'><?php echo $server_name ?></td>
            </tr>
            <tr>
            <td>Adresa serveru:</td><td class='server_adress'><?php echo $server_adress ?>:22631</td>
            </tr>
            <tr>
            <td>Alt. adresa:</td><td class='server_adress'>adamkov_serverik</td>
            </tr>
            <tr>
            <td>Uptime:</td><td class='server_uptame'><?php echo $server_uptime ?></td>
            </tr>
            <tr>
            <td>Uživatelia:</td><td class='server_users'><?php echo $server_actuallyusers ?>/<?php echo $server_maxusers ?> slotov</td>
            </tr>
         
            </table>
            <?php
            }
            
            // check error
            
            catch(Exception $e){
            echo "<p class='server_error'> ERROR: </p>" , $e->getMessage(), "\n";
            }
        }
        */
        ?>
      </div>

    </main><!-- /.container -->
<?php
    include "html_pata.php";

    ?>
