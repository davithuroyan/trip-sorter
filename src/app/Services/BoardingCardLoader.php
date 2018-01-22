<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:11 PM
 */

namespace app\Services;

use app\Core\AirportBusBoardingCard;
use app\Core\BoardingCardInterface;
use app\Core\BusBoardingCard;
use app\Core\FlightBoardingCard;
use app\Core\Location;
use app\Core\TrainBoardingCard;
use app\Exceptions\UnknownBoardingCardTypeException;
use app\Helpers\Helper;

/**
 * Class BoardingCardLoader
 * @package app\Services
 */
class BoardingCardLoader
{
    /**
     * @param $data
     * @return array
     */
    public function loadCards($data)
    {
        $cards = [];
        foreach ($data as $data) {
            $cards[] = $this->createCard($data);
        }
        return $cards;
    }

    /**
     * @param $data
     * @return BoardingCardInterface
     * @throws UnknownBoardingCardTypeException
     */
    public function createCard($data): BoardingCardInterface
    {
        if (!Helper::arrayKeysExists($data, ['type', 'from', 'to', 'seat'])) {
            throw new \InvalidArgumentException(
                'Missing required arguments to create boarding card. Check type, from, to and seat.'
            );
        }

        $type = $data['type'];

        switch ($type) {
            case 'flight':
                if (!Helper::arrayKeysExists($data, ['number', 'gate', 'baggage_ticket'])) {
                    throw new \InvalidArgumentException(
                        'Missing required keys to create FlightBoardingCard. Check id, gate and baggage.'
                    );
                }

                return new FlightBoardingCard(
                    new Location($data['from']),
                    new Location($data['to']),
                    $data['number'],
                    $data['seat'],
                    $data['gate'],
                    $data['baggage_ticket']
                );
            case 'airport_bus':
                return new AirportBusBoardingCard(
                    new Location($data['from']),
                    new Location($data['to']),
                    $data['seat']
                );
            case 'bus':
                if (!Helper::arrayKeysExists($data, ['number'])) {
                    throw new \InvalidArgumentException(
                        'Missing required keys to create BusBoardingCard. Check number'
                    );
                }

                return new BusBoardingCard(
                    new Location($data['from']),
                    new Location($data['to']),
                    new Location($data['number']),
                    $data['seat']
                );
            case 'train':
                if (!Helper::arrayKeysExists($data, ['number'])) {
                    throw new \InvalidArgumentException(
                        'Missing required keys to create TrainBoardingCard. Check number'
                    );
                }

                return new TrainBoardingCard(
                    new Location($data['from']),
                    new Location($data['to']),
                    $data['number'],
                    $data['seat']
                );
            default:
                throw new UnknownBoardingCardTypeException('Unknown boarding card type ' . $type);
        }
    }
}