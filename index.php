<?php
session_start();
$titulok = "Domov";
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
            echo '<p class="lead">Úspešne prihásený.<br> Môžeš preskúmať náš web.</p>';
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
        ?>
      </div>

    </main><!-- /.container -->
<?php
    include "html_pata.php";

    ?>
