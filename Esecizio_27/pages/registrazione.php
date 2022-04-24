<!DOCTYPE html>
<html>
<head>
<title>Registrazione Del Voto</title>

<?php
    session_start();

    //Così poso usare il DB sensa implementarlo qui
    include "db.php";

    $query_getVoti =  "SELECT voti FROM candidati WHERE candidati.id_candidato = $_SESSION[id]";
    $result_getVoti = mysqli_query($connessione, $query_getVoti) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

    //$query = "UPDATE candidati SET voti = $result_getVoti WHERE id_candidato = $_SESSION[id]";
    //$result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../css/style.css">

</head>
<body>

<br>

<div class="alert alert-primary" role="alert">
  <h2> Registrazione Del Voto </h2>
</div>


<div class="card text-center">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Il Suo voto è stato registrato correttamente <br> GRAZIE</h5>
    <?php

      var_dump($result_getVoti);
      echo $result_getVoti;

    ?>
  </div>
  <div class="card-footer text-muted">
    <a href="../index.html" class="btn btn-primary">Nuovo Voto</a>
  </div>
</div>


</body>
</html>