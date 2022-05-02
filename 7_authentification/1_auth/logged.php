<?php
function logout() {
  unset($_SESSION['auth']);
  if (ini_get('session.use_cookies'))
    setcookie(session_name(), '', time()-1);
  session_destroy();
}

?>

<!DOCTYPE html>
<html>
<body>
  <?php
  if (isset($_POST['logout'])) {
    logout();
    header('Location: login_form.php');
  }
  if (session_start()) {
    var_dump($_SESSION);
    echo '<h1><b>Login successful</b></h1>';
    echo '<h2>Your session id: ' . session_id() . '</h2>';
    echo '<form method="POST">';
    echo '  <input type="submit" name="logout" value="Logout">';
    echo '</form>';
  }
  else  header('Location: login_form.php');
  ?>
</body>
</html>
