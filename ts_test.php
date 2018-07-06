<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){

    $titulok="TeamSpeak"; 
    include "html_hlavicka.php";

require "db_pripojenie.php";
echo '<div class="container">';
echo "<br>";

// load framework files
require_once("ts/libraries/TeamSpeak3/TeamSpeak3.php");

// connect to local server, authenticate and spawn an object for the virtual server on port 9987
$ts3_VirtualServer = TeamSpeak3::factory("serverquery://test:iBBjRNmB@ts3.hicoria.com:10016/?server_port=22631&blocking=0");

// kick the client with ID 123 from the server
//$ts3_VirtualServer->clientKick(123, TeamSpeak3::KICK_SERVER, "evil kick XD");

// spawn an object for the client by unique identifier and do the kick
//$ts3_VirtualServer->clientGetByUid("iPW7Y8X8kL2mKJMb9LquJEqxPPk=")->kick(TeamSpeak3::KICK_SERVER, "ez");

// spawn an object for the client by current nickname and do the kick
//$ts3_VirtualServer->clientGetByName("No_One1")->kick(TeamSpeak3::KICK_SERVER, "evil kick XD");
if(isset($_POST['kick'])){
    $ts3_VirtualServer->clientGetByUid("iPW7Y8X8kL2mKJMb9LquJEqxPPk=")->kick(TeamSpeak3::KICK_SERVER, "ez");
    echo "Kicked!";
}

if(isset($_POST['tree'])){
    echo $ts3_VirtualServer->getViewer(new TeamSpeak3_Viewer_Html("images/viewericons/", "images/countryflags/", "data:image"));
    
}
if(isset($_POST['info'])){
    try{
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
        
        // show server as online
        
        echo "<table>";
        echo "<tr>";
        echo "<td>Status serveru:</td><td class='server_online'>$server_status</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Meno serveru:</td><td class='server_name'>$server_name</td>" ;
        echo "</tr>";
        echo "<tr>";
        echo "<td>Adresa serveru:</td><td class='server_adress'>$server_adress:22631</td>" ;
        echo "</tr>";
        echo "<tr>";
        echo "<td>Alt. adresa:</td><td class='server_adress'>adamkov_serverik</td>" ;
        echo "</tr>";
        echo "<tr>";
        echo "<td>Uptime:</td><td class='server_uptame'>$server_uptime</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Uživatelia:</td><td class='server_users'>$server_actuallyusers/$server_maxusers slotov</td>";
        echo "</tr>";
       /*
        echo "<tr>";
        echo "<td>Channels:</td><td class='server_channels'>$server_channels</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Download:</td><td class='server_download'>$server_download</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Upload:</td><td class='server_upload'>$server_upload</td>";
        echo "</tr>";
        */
        echo "</table>";
        }
        
        // check error
        
        catch(Exception $e){
        echo "<p class='server_error'> ERROR: </p>" , $e->getMessage(), "\n";
        }

}
if(isset($_POST['ban'])){
    $ts3_VirtualServer->clientGetByUid("iPW7Y8X8kL2mKJMb9LquJEqxPPk=")->ban(TeamSpeak3::KICK_SERVER, "ez");
}
?>
<form action="ts_test.php" method="POST">
<input type="submit" class="btn btn-success" name="kick" value="kick">
<br>
<input type="submit" class="btn btn-success" name="tree" value="tree">
<br>
<input type="submit" class="btn btn-success" name="info" value="info">
<br>
<input type="submit" class="btn btn-success" name="ban" value="ban">
<br>
<input type="submit" class="btn btn-success" name="" value="test">
<br>
<input type="submit" class="btn btn-success" name="" value="test">
</form>
<br>
<?php


include "html_pata.php";
}
?>