

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

    $filteredHotels = [];
    $votedHotels = [];

    if(isset($_GET['hotel_parking'])) {
        foreach($hotels as $hotel) {
            if($hotel['parking'] === true) {
                $filteredHotels[] = $hotel;
            }
        }
        $hotels = $filteredHotels;
    }

    if(isset($_GET['hotel_vote'])) {
        $voteNumber = intval($_GET['hotel_vote']);
        foreach($hotels as $hotel) {
            if($hotel['vote'] === $voteNumber) {
                $votedHotels[] = $hotel;
            }
        }
        $hotels = $votedHotels;
    }

    var_dump($_GET['hotel_vote']);
    var_dump($voteNumber);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>php-hotel</title>
</head>
<body>

    <!-- CHECKBOX PARKING -->
    <form class="p-3" method="GET">

         <div class="p-1"> 
            <label for="">Hotel con parcheggio
                 <input name="hotel_parking" type="checkbox">
            </label>
        </div>
       
        <div class="p-1 mb-2">  
            <label for="">VOTO
                <select name="hotel_vote" id="">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </label>
        </div>
      
        <button type="submit">Filtra</button>
    </form>
    
    <!--HOTELS TABLES-->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTIONS</th>
                <th scope="col">PARKING</th>
                <th scope="col">VOTE</th>
                <th scope="col">DISTANCE TO CENTER</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hotels as $hotel) { ?>
                <tr>
                    <td><?php echo($hotel['name'])?></td>
                    <td><?php echo($hotel['description'])?></td>               
                    <td><?php echo($hotel['parking'] ? 'Yes' : 'No') ?></td> <!-- TERNARIO: SE PARKING è TRUE STAMPA YES ALTRIMENTI NO -->
                    <td><?php echo($hotel['vote'])?></td>
                    <td><?php echo($hotel['distance_to_center'])?></td>   
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
