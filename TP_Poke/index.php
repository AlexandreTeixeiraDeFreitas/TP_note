<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Pokedex</title>
  </head>
  <body>
  <?php
  $link = mysqli_connect("localhost", "root", "", "Pokedex");
    if (!$link) {
        echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
        echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
        echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    $req = "SELECT DISTINCT * FROM `pokemon`;";
    $result = mysqli_query($link,$req);
    if($result) {
    ?>
 <h1>My Pokedex</h1>
    <table>
      <thead>
        <tr>
          <th>Sprite</th>
          <th>ID</th>
          <th>Name</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Base exp</th>
        </tr>
      </thead>
      <tbody>
      <?php

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $id = $row["id"];
      $nom = $row["identifier"];
      $height = $row["height"];
      $weight =  $row["weight"];
      $bs_ex = $row["base_experience"];
      if($bs_ex>=200) {
      ?>
        <tr class="super">
        <td><img src="sprites/<?php echo $nom; ?>.png" alt="<?php echo $nom; ?>"></td>
        <td><?php echo $id; ?></td>
        <td><?php echo $nom; ?></td>
        <td><?php echo $height; ?></td>
        <td><?php echo $weight; ?></td>
        <td><?php echo $bs_ex; ?></td>
      </tr>
      <?php }else{ ?>
      <tr>
          <td><img src="sprites/<?php echo $nom; ?>.png" alt="<?php echo $nom; ?>"></td>
          <td><?php echo $id; ?></td>
          <td><?php echo $nom; ?></td>
          <td><?php echo $height; ?></td>
          <td><?php echo $weight; ?></td>
          <td><?php echo $bs_ex; ?></td>
        </tr>
        <?php }} ?>
      </tbody>
    </table>
    <?php    
}
mysqli_close($link);
?>
  </body>
</html>
