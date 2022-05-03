<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>New User</title>
  </head>
  <body>
    <div class="container">
      <?php
      require 'utils.php';
      foreach ($_POST as $key => $value)
        $$key = $value;

      if (userExists($email)) {
        displayError('A user with this e-mail adress already exists.');
        die();
      }

      $db = connect();
      try {
        $q = $db->prepare("
          INSERT INTO user 
          (user_firstname, user_lastname, user_email, user_password)
          VALUES (?, ?, ?, ?);
        ");
        $q->execute(array($firstname, $lastname, $email, password_hash($password, PASSWORD_BCRYPT)));
        $q->closeCursor();
        header('Location: ../../user_login.html');
      }
      catch (Exception $e) {
        echo $e->getMessage();
        die();
      }
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
