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
      <div class="row mb-0">
        <h1 class="display-4"><b>New User</b></h1>
      </div>
      <div class="row mb-2">
        <small class="text-danger">* mandatory fields</small>
      </div>
      <form action="http://localhost:1234/assets/php/signup_user.php" method="POST">
        <label class="form-label" for="firstname">First name*</label>
        <input type="text" class="form-control form-control-sm mb-1 validate" id="firstname" name="firstname" required>
        <label class="form-label" for="lastname">Last name*</label>
        <input type="text" class="form-control form-control-sm mb-1" id="lastname" name="lastname" required>
        <label class="form-label" for="email">E-mail*</label>
        <input type="email" class="form-control form-control-sm mb-1" id="email" name="email" required>
        <label class="form-label" for="password">Password*</label>
        <input type="password" class="form-control form-control-sm mb-2" id="password" name="password" required>
        <fieldset>
          <button type="submit" class="btn btn-dark btn-sm">Sign Up</button>
          <button type="reset" class="btn btn-danger btn-sm">Reset</button>
        </fieldset>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
