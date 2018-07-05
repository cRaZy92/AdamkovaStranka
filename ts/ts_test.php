<?php
/*
// load framework files
require_once("libraries/TeamSpeak3/TeamSpeak3.php");

// connect to local server, authenticate and spawn an object for the virtual server on port 9987
$host = "ts3.hicoria.com";
$ts3_VirtualServer = TeamSpeak3::factory("serverquery://test:iBBjRNmB@".$host.":10016/?server_port=22631");

// get notified on incoming private messages
$ts3_VirtualServer->notifyRegister("textprivate");

// register a callback for notifyTextmessage events
TeamSpeak3_Helper_Signal::getInstance()->subscribe("notifyTextmessage", "onTextmessage");

// wait for events
while (1) {
    $ts3_VirtualServer->getAdapter()->wait();
}

// define a callback function
function onTextmessage(TeamSpeak3_Adapter_ServerQuery_Event $event, TeamSpeak3_Node_Host $host)
{
    echo "Client " . $event["invokername"] . " sent textmessage: " . $event["msg"];
}
    */


    require_once("libraries/TeamSpeak3/TeamSpeak3.php");
    $username = 'test'; 
    $password = 'iBBjRNmB'; 
    $server_ip = 'ts3.hicoria.com'; 
    $query_port = '10016'; 
    $server_port = '22631'; 

    // connect to local server, authenticate and spawn an object for the virtual server on port 9987 
    $ts3_VirtualServer = TeamSpeak3::factory("serverquery://".$username.":".$password."@".$server_ip.":".$query_port."/?server_port=".$server_port); 

    // build and display HTML treeview using custom image paths (remote icons will be embedded using data URI sheme) 
    echo $ts3_VirtualServer->getViewer(new TeamSpeak3_Viewer_Html("images/viewericons/", "images/countryflags/", "data:image")); 
?>