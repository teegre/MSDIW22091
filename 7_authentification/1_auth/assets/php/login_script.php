<?php
 $user = 'admin';
 $pass = 'admin';

 if ($_POST['user'] == $user && $_POST['pass'] == $pass) {
   if (session_start()) {
     $_SESSION['auth'] = 'ok';
     $_SESSION['id'] = session_id();
   }
 }
 else
   unset($_SESSION['auth']);

 if ($_SESSION['auth'] == 'ok')
   header('Location: ../../logged.php');
 else
   header('Location: ../../login_form.php');
?>
