<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:07 PM
 */

include 'autoloader.php';

use app\Trip;
use app\Services\BoardingCardLoader;

$boardingCards = [

    [
        "from" => "Berlin",
        "to" => "London",
        "number" => "A1234",
        "seat" => "12B",
        "gate" => "A20",
        "type" => 'flight',
        'baggage_ticket'=>null
    ],
    [
        "from" => "Barcelone",
        "to" => "Paris",
        "type" => "airport_bus",
        "number" => "1034",
        "seat" => "14",
    ],
    [
        "from" => "Rome",
        "to" => "Barcelone",
        "type" => "bus",
        "number" => "5074",
        "seat" => "45",
    ],
    [
        "from" => "Paris",
        "to" => "Berlin",
        "type" => "airport_bus",
        "number" => "7654",
        "seat" => "69",
    ],

];

$loader = new BoardingCardLoader();
$boardingCards = $loader->loadCards($boardingCards);

$trip = new Trip($boardingCards);

$sortedCards = $trip->getOrderedBoardingCards();

foreach ($sortedCards as $card){
    echo $card."<br>";
}