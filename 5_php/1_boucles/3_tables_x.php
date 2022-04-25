<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tables de multiplication</title>
  </head>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
    }

    th, td {
      width: 2rem;
      height: 2rem;
    }
  </style>
  <body>
    <?php
      echo "<table>";
      echo "<tr>";
      echo "<th></th>";
      
      for ($th = 0; $th <= 12; $th++) {
        echo "<th>$th</th>";
      }
      
      echo "</tr>";
      
      for ($tr = 0; $tr <= 12; $tr++) {
        echo "<tr>";
        echo "<th>$tr</th>";
        for ($td = 0; $td <= 12; $td++) {
          $r = $tr * $td;
          echo "<td>$r</td>";
        }
        echo "</tr>";
      }
      
      echo "</table>";
    ?>
  </body>
</html>
