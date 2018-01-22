<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:04 PM
 */

namespace app\Core;

/**
 * Interface BoardingCardInterface
 * @package app\Core
 */
interface BoardingCardInterface
{
    /**
     * @return Location
     */
    public function getDeparturePlace(): Location;

    /**
     * @return Location
     */
    public function getArrivalPlace(): Location;

    /**
     * @return mixed
     */
    public function __toString();


}