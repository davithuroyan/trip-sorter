<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:11 PM
 */

namespace app\Core;

/**
 * Class AirportBusBoardingCard
 * @package app\Core
 */
class AirportBusBoardingCard implements BoardingCardInterface
{
    use BoardingCardTrait;

    /**
     * AirportBusBoardingCard constructor.
     * @param Location $from
     * @param Location $to
     * @param string|null $seat
     */
    public function __construct(Location $from, Location $to, string $seat = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->seat = $seat ?: 'No seat assignment';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'Take the airport bus from %s to %s. Seat : %s',
            $this->from,
            $this->to,
            $this->seat
        );
    }
}
