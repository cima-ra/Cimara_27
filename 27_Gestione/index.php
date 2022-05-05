<!DOCTYPE html>
<html>
<head>
<title>Sistema Elettorale</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">

<?php
  include "pages/db.php";

  $query = "SELECT * FROM liste";
  $result = mysqli_query($connessione, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
?>

</head>
<body>

<br>

<div class="alert alert-primary" role="alert">
  <h2>Pagina Riepilogo Voti Per L'Amministrazione</h2>
</div>


<div class="card text-center">
  <div class="card-header">
  <h3>Scegliere il modo con il quale si vuole vedere il riepilogo dei voti.</h3>
  </div>
  <div class="card-body">
    <p class="card-text">

    <h5>Selezionando la lista e poi cliccando invia e possibile visualizzare i voti realizzati dai candidati per lista:</h5>

    <form action="pages/riepilogoLista.php" method="POST">
        <br>
        <select id="list" name="list" class="form-select" aria-label="Default select example">
          <option selected>Seleziona la lista</option>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='$row[id_lista]'>", "$row[nome_lista]", "</option>";
          }
          ?>
        </select>

        <br>
        <input class="btn btn-primary" type="submit" value="Visualizza Voti Lista">
      </form>
    </p>
  </div>
  <div class="card-footer text-muted">
    <br>
    <h5>Cliccando su questo pulsante è possibile visualizzare i voti realizzati da tutte le liste:</h5>
    <a href="pages/riepilogoVoti.php" class="btn btn-primary">Riepilogo Totale Dei Voti</a>
    <br>
  </div>
</div>


</body>
</html>