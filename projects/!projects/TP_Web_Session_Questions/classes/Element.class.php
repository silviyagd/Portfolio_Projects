<?php

/**
 * Created by PhpStorm.
 * User: amine
 * Date: 31/10/2015
 * Time: 22:56
 */
class Element
{
    private $id; 
    private $text; // le texte de la question !


    public function __construct (array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value){
            $method = "set".ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int)$id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}