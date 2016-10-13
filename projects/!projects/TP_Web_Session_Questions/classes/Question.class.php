<?php

/**
 * Created by PhpStorm.
 * User: amine
 * Date: 31/10/2015
 * Time: 22:56
 */

    /**
     * Méthode qui set le tableau de réponses 
     * @param $arrayItems
     * @return $this
     */
class Question extends Category
{
    public function setArrayItems(array $arrayItems)
    {
        if (!empty($arrayItems)) {
            foreach ($arrayItems as $item) {
                if (get_class($item) == 'Answer') {
                    $this->addItem($item);
                }
            }
        }
        return $this;
    }
}