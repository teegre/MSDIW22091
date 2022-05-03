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
    <title>Sendmail</title>
  </head>
  <body>
    <div class="container">
    <div class="jumbotron mt-2">
      <h1>Send mail</h1>
        <form action="http://localhost:1234/assets/php/sendmail_user.php" method="POST">
          <label class="form-label" for="recipient">Recipient</label>
          <input class="form-control form-control-sm mb-2" type="email" id="recipient" name="recipient" placeholder="Enter e-mail address" required>
          <label class="form-label" for="subject">Subject</label>
          <input class="form-control form-control-sm mb-2" type="text" id="subject" name="subject" required>
          <label class="form-label" for="message">Message</label>
          <textarea class="form-control form-control-sm mb-2" id="message" name="message" required></textarea>
          <input class="btn btn-sm btn-success" type="submit" value="Send">
          <input class="btn btn-sm btn-warning" type="reset" value="Reset">
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
