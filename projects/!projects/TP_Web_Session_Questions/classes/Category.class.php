<?php

/**
 * Created by PhpStorm.
 * User: amine
 * Date: 31/10/2015
 * Time: 22:56
 */

class Category extends Element
{
    private $arrayItems;

    /**
     * Getter qui retourne le tableau des questions si on fait l'appel depuis une instance de la classe Category, 
     * sinon le tableau de réponses si l'appel est fait depuis la classe Question
     * @return mixed
     */
    public function getArrayItems()
    {
        return $this->arrayItems;
    }

    /**
     * Méthode qui set le tableau de questions 
     * @param $arrayItems
     * @return $this
     */
    public function setArrayItems(array $arrayItems)
    {
        if (!empty($arrayItems)) {
            foreach ($arrayItems as $item) {
                if (get_class($item) == 'Question') {
                    $this->addItem($item);
                }
            }
        }
        return $this;
    }
    
    /**
     * @param Element $item
     * @return $this
     */
    public function addItem(Element $item)
    {
        $this->arrayItems[] = $item;
        return $this;
    }
}