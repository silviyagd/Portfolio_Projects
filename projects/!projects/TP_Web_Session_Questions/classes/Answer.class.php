<?php

/**
 * Created by PhpStorm.
 * User: amine
 * Date: 31/10/2015
 * Time: 22:56
 */

class Answer extends Element
{
    private $state; // type bool : réponse correcte ou non

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = (bool)$state;
        return $this;
    }
}