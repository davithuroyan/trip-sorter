<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 1:18 PM
 */

namespace app;

use app\Core\BoardingCardInterface;
use app\Services\CardSorter;

/**
 * Class Trip
 * @package app
 */
class Trip
{
    /**
     * @var BoardingCardInterface[]
     */
    private $boardingCards = [];

    /**
     * Trip constructor.
     * @param array $boardingCards
     */
    public function __construct(array $boardingCards)
    {
        $sorter = new CardSorter();
        foreach ($boardingCards as $boardingCard) {
            $this->addBoardingCard($boardingCard);
        }

        $this->boardingCards = $sorter->sort($this->boardingCards);
    }

    /**
     * @return array
     */
    public function getOrderedBoardingCards(): array
    {
        return $this->boardingCards;
    }

    /**
     * @param BoardingCardInterface $boardingCard
     */
    private function addBoardingCard(BoardingCardInterface $boardingCard)
    {
        $this->boardingCards[] = $boardingCard;
    }
}