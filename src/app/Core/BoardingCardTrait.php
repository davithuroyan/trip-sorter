<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 1:37 PM
 */

namespace app\Core;

/**
 * Trait BoardingCardTrait
 * @package app\Core
 */
trait BoardingCardTrait
{
    /** @var Location */
    private $from;

    /** @var Location */
    private $to;

    /** @var string */
    private $seat;

    /**
     * @return Location
     */
    public function getArrivalPlace(): Location
    {
        return $this->to;
    }

    /**
     * @return Location
     */
    public function getDeparturePlace(): Location
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * @param BoardingCardInterface $card
     * @return bool
     */
    public function hasSameOriginAs(BoardingCardInterface $card): bool
    {
        return $this->from->getName() === $card->getArrivalPlace()->getName();
    }

    /**
     * @param BoardingCardInterface $card
     * @return bool
     */
    public function hasSameDestinationAs(BoardingCardInterface $card): bool
    {
        return $this->to->getName() === $card->getDeparturePlace()->getName();
    }
}