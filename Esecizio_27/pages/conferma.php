<!DOCTYPE html>
<html>

<head>
  <title>Conferma Voto</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/style.css">

  <?php

  //Così poso usare il DB sensa implementarlo qui
  include "db.php";
  session_start();

  $_SESSION["id"] = $_POST["candidato"];

  ?>

</head>

<body>

  <br>

  <div class="alert alert-primary" role="alert">
    <h2>Conferma Del Voto</h2>
  </div>

  <?php

    $query = "SELECT * FROM candidati WHERE candidati.id_candidato = $_POST[candidato]";
    $result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

    $query1 = " SELECT * FROM liste INNER JOIN candidati ON candidati.id_lista = liste.id_lista WHERE candidati.id_candidato = $_SESSION[id]";
    $result1 = mysqli_query($connessione, $query1) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    

  ?>


  <div class="card text-center">
    <div class="card-header">
      <h4 class="card-title">La terza ed ultima fase del voto consiste nella conferma della selezione.</h4>
    </div>
    <div class="card-body">
      <h5 class="card-title">Qui sotto è riepilogata la Sua scelta del voto. <br> Confermando questa scelta Lei esprime in modo definitivo il Suo voto.</h5>
      <p class="card-text">
        <h4>LISTA: 
        <?php
          while ($row = mysqli_fetch_assoc($result1)) {
            echo "$row[nome_lista]";
          }
          ?>
        <br>

        CANDIDATO: 
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "$row[nome]", " ", "$row[cognome]";
          }
          ?></h4>
      </p>

    <div class="btn-group">
    <a href="registrazione.php" class="btn btn-success">Conferma</a>
    <a href="sceltaLista.php" class="btn btn-danger">Annulla</a>
    </div>

  </div>


</body>

</html>