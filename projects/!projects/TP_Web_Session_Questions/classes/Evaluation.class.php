<?php

/**
 * Created by PhpStorm.
 * User: amine
 * Date: 01/11/2015
 * Time: 22:49
 */
class Evaluation
{
    private $categories; // tableau des catégories
    private $choicesArray; // tableau de choix de réponses
    private $html; // html généré

    public function __construct(array $categories, array $choicesArray)
    {
        $this->categories = $categories;
        $this->choicesArray = $choicesArray;
        $this->generate();
    }

    
    private function generate(){
        ob_start();
        echo '<h2>' . 'Évaluation :' . '</h2>';
        foreach ($this->categories as $category) {
            $correctAnswers = 0;
            $totalQuestions = 0;
            echo "<div class='bxSh'><table>";
            echo "<tr><th><h1>" . $category->getText() . "</h1></th></tr>";
            $questionsCounter=0;
            foreach ($category->getArrayItems() as $question) {
                $totalQuestions++;
                echo "<tr><td>";
                echo "<span>".++$questionsCounter."- ".htmlentities($question->getText()) . "</span><br>";
                echo "Votre réponse : ";
                $isGoodAnswer = false;
                if (isset($this->choicesArray[$question->getId()])) { // s'il a répondu a cette question 
                    foreach ($question->getArrayItems() as $answer) {
                        if ($answer->getId() == $this->choicesArray[$question->getId()]) {
                            echo htmlentities($answer->getText());
                            if ($answer->getState()) {
                                $isGoodAnswer = true;
                            }
                            break;
                        }
                    }
                }
                echo "<br>";
                if ($isGoodAnswer) {
                    echo "<b class=\"correct\">Correct.</b>";
                    $correctAnswers++;
                } else {
                    echo "<b class=\"incorrect\">Incorrect; </b><u>la bonne réponse est :</u>";
                    foreach ($question->getArrayItems() as $answer) {
                        if ($answer->getState()) {
                            echo htmlentities($answer->getText());
                        }
                    }
                }
                echo "</td></tr>";
            }
            echo "<tr><td>";
            echo "Évaluation pour <b>" . $category->getText() . "</b> : " . round(($correctAnswers * 100) / $totalQuestions) . "% (" . $correctAnswers . "/" . $totalQuestions . ")";
            echo "</td></tr>";
            echo "</table></div>";
        }
        $this->html = ob_get_clean();
    }

    public function __toString(){
        return $this->html;
    }

}