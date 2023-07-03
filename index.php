
<!-- Stampare tutti i nostri hotel con tutti i dati disponibili, iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->
<?php 

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <!-- BOOTSTRAP v5.2 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap js -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style.css">
</head>
<body>


 <?php
        
        $counter = 1;
        $parkValue = isSet($_GET["park"]);
        $votoHotel = $_GET["rating"];
       

?> 

    <div class="wrapper d-flex justify-content-center w-50">
        <form action="index.php" method="GET" class="w-100 p-2">
        <div class="form-check d-flex justify-content-evenly w-100">
            <label class="form-check-label" for="park">
                Parcheggio
            </label> 
            <input class="form-check-input" type="checkbox" id="park" name="park">
        </div>
        <div class="d-flex justify-content-evenly w-100">
        <label for="rating">Voto</label>
        <input type="number" name="rating" id="rating" min="1" max="5">
</select>
        </div>
        <div class="btn-container p-2 d-flex justify-content-center"><button type="submit" class="btn btn-outline-success w-25">Cerca</button></div>
        </form>
    </div>
  

<?php if($parkValue !== 'on' && empty($votoHotel)){ ?>
<table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>

      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Parking</th>
      <th scope="col">Vote</th>
      <th scope="col">Distance to center</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($hotels as $hotel){ ?>
    <tr>
      <th scope="row"><?php echo $counter++ ?></th>
      <?php foreach($hotel as $key => $value){ ?>
      <td><?php echo $value ?></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
</body>
</html>