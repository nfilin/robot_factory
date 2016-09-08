<?php

class UnionRobot extends Robot implements Iterator
{
    /**
     * @var Robot[]
     */
    private $robots = [];


    /**
     * @param Robot|Robot[] $input
     */
    public function addRobot($input)
    {
        if (is_array($input)) { // if input is array of Robot's
            foreach ($input as $id => $robot) {
                if (is_object($robot) && $robot instanceof Robot)
                    $data[] = $robot;
            }
        } elseif (is_object($input) && $input instanceof Robot) { // if input is a robot
            $data[] = $input;
        }
        /** Reset clear cache for speed, weight and height calculations */
        $this->speed = null;
        $this->weight = null;
        $this->height = null;
    }

    /**
     * @return float|int|mixed
     */
    public function getSpeed()
    {
        /** Speed calculation cache */
        if ($this->speed == null) {
            $speeds = [];
            for ($i = count($this->robots) - 1; $i >= 0; --$i) {
                $speeds[] = $this->robots[$i]->getSpeed();
            }
            $this->speed = min($speeds);
        }
        return $this->speed;
    }

    /**
     * @return float|int
     */
    public function getWeight()
    {
        /** Weight calculation cache */
        if ($this->weight == null) {
            $weight = 0;
            for ($i = count($this->robots) - 1; $i >= 0; --$i) {
                $weight += $this->robots[$i]->getWeight();
            }
            $this->weight = $weight;
        }
        return $this->weight;
    }

    /**
     * @return float|int
     */
    public function getHeight()
    {
        /** Height calculation cache */
        if ($this->height == null) {
            $height = 0;
            for ($i = count($this->robots) - 1; $i >= 0; --$i) {
                $height += $this->robots[$i]->getHeight();
            }
            $this->height = $height;
        }
        return $this->height;
    }

    /**
     * @return Robot
     */
    public function current()
    {
        return current($this->robots);
    }

    public function next()
    {
        next($this->robots);
    }

    public function key()
    {
        return key($this->robots);
    }

    public function valid()
    {
        return array_key_exists($this->key(), $this->robots);
    }

    public function rewind()
    {
        reset($this->robots);
    }
}