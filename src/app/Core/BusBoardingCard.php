<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:11 PM
 */

namespace app\Core;


/**
 * Class BusBoardingCard
 * @package app\Core
 */
class BusBoardingCard implements BoardingCardInterface
{
    use BoardingCardTrait;

    /**
     * BusBoardingCard constructor.
     * @param Location $from
     * @param Location $to
     * @param string $number
     * @param string|null $seat
     */
    public function __construct(Location $from, Location $to, string $number, string $seat = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->number = $number;
        $this->seat = $seat ?: 'No seat assignment';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'Take the bus %s from %s to %s. Seat : %s',
            $this->number,
            $this->from,
            $this->to,
            $this->seat
        );
    }
}
