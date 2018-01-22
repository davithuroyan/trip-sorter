<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:11 PM
 */

namespace app\Core;

/**
 * Class FlightBoardingCard
 * @package app\Core
 */
class FlightBoardingCard implements BoardingCardInterface
{
    use BoardingCardTrait;

    /**
     * @var string
     */
    private $flightNumber;

    /**
     * @var string
     */
    private $gate;

    /**
     * @var string
     */
    private $baggageTicketNumber;

    /**
     * FlightBoardingCard constructor.
     * @param Location $from
     * @param Location $to
     * @param string $flightNumber
     * @param string $gate
     * @param string $seat
     * @param string|null $baggageTicketNumber
     */
    public function __construct(
        Location $from,
        Location $to,
        string $flightNumber,
        string $gate,
        string $seat,
        string $baggageTicketNumber = null
    )
    {
        $this->from = $from;
        $this->to = $to;
        $this->flightNumber = $flightNumber;
        $this->gate = $gate;
        $this->seat = $seat;
        $this->baggageTicketNumber = $baggageTicketNumber ?: 'Automatically transferred';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'Take the flight %s from %s to %s. Gate : %s. Seat : %s. Baggage ticket counter : %s.',
            $this->flightNumber,
            $this->from,
            $this->to,
            $this->gate,
            $this->seat,
            $this->baggageTicketNumber
        );
    }

}
