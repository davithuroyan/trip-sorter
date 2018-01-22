<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 22-Jan-18
 * Time: 12:06 PM
 */

namespace app\Core;

/**
 * Class Location
 * @package app\Core
 */
class Location
{
    /**
     * @var string
     */
    private $name;

    /**
     * Location constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}