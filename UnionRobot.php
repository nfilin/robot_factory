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
        if(is_array($input)){
            foreach ($input as $id=>$robot){
                $data[] = $robot;
            }
        } elseif(is_object($input) && $input instanceof Robot) {
            $data[] = $input;
        }
        $this->speed = null;
        $this->weight = null;
        $this->height = null;
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

    public function getSpeed()
    {
        if($this->speed == null){
            $speeds = [];
            for($i = count($this->robots)-1; $i >= 0; --$i){
                $speeds[] = $this->robots[$i]->getSpeed();
            }
            $this->speed = min($speeds);
        }
        return $this->speed;
    }

    public function getWeight()
    {
        return parent::getWeight(); // TODO: Change the autogenerated stub
    }

    public function getHeight()
    {
        return parent::getHeight(); // TODO: Change the autogenerated stub
    }


}