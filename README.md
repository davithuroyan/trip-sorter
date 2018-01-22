# trip-sorter
Using this App you can sort boarding cards you have.

by Davit Huroyan <davithuroyan@gmail.com>

## Installation

Clone or Download zip and run :


```bash
clone https://github.com/davithuroyan/trip-sorter.git ./trip-sorter
cd trip-sorter
composer install

```

## How to use the App

1 . Load the boarding cards objects :

```php
    $loader = new BoardingCardLoader();
    $boardingCards = $loader->loadCards($cards);
```

2 . Pass your $boardingCards to a new Trip object.
    
```php
    $trip = new Trip($boardingCards);
```

3 . Get your ordered boarding cards and print:

```php
    $sortedCards = $trip->getOrderedBoardingCards();

    foreach ($sortedCards as $card){
        echo $card."<br>";
    }   
```

4. input params format is:

```
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
        "from" => "London",
        "to" => "Lion",
        "type" => "train",
        "number"=>"x123",
        "seat" => "65C"
    ],
    [
        "from" => "Paris",
        "to" => "Berlin",
        "type" => "airport_bus",
        "seat" => "69",
    ],

];
```
