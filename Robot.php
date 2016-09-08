<?php

abstract class Robot
{
    /**
     * @var float|int
     */
    protected $speed;
    /**
     * @var float|int
     */
    protected $weight;
    /**
     * @var float|int
     */
    protected $height;

    /**
     * @return float|int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param float|int $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return float|int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float|int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float|int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float|int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    function __get($name)
    {
        switch ($name) {
            case "speed":
                return $this->getSpeed();
            case "weight":
                return $this->getWeight();
            case "height":
                return $this->getHeight();
            default:
                return null;
        }
    }


}