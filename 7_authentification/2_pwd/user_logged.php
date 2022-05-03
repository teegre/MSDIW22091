<?php
require 'assets/php/utils.php';
session_start();
if (! isset($_SESSION['user'])) {
  session_destroy();
  header('Location: http://localhost:1234');
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
    <?php
      if (isset($_POST['logout'])) {
        logout();
        header('Location: index.html');
      }
    ?>
    <div class="container">
      <div class="jumbotron mt-2">
        <h1 class="text-success display-5">Logged in</h1>
        <hr class="my-4">
        <p class="lead">
          Welcome <?php echo '<b>' . $_SESSION['user'] . '</b>' ?>!<br>
          Your session id is: <?php echo session_id() ?>.
        </p>
        <p class="lead">
          <form method="POST">
            <input type="submit" name="logout" class="btn btn-danger" value="Log out">
          </form>
        </p>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

