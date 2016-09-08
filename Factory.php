<?php

class Factory
{
    /**
     * @var Robot[]
     */
    private $types = [];

    /**
     * @param $name
     * @param $arguments
     * @return Robot[]|null
     */
    function __call($name, $arguments)
    {
        if (substr($name, 0, 6) == "create" && (array_key_exists($class = substr($name, 6), $this->types))) {
            $result = [];
            for ($i = $arguments[0]; $i > 0; --$i) {
                /** Create copy of required robot and put it to resulting array*/
                $result[] = clone($this->types[$class]);
            }
            return $result;
        } else {
            return null;
        }
    }

    /**
     * @param Robot $robot
     */
    public function addType(Robot $robot)
    {
        $class = get_class($robot);
        /** Store robot objects indexed by ClassName */
        $this->types[$class] = clone($robot);
    }

}