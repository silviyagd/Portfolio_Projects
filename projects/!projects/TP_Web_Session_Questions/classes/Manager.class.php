<?php

/**
 * Created by PhpStorm.
 * User: amine
 * Date: 29/10/2015
 * Time: 19:43
 */
class Manager
{
    private $db; // objet de connexion PDO

    public function __construct(PDO $db){
        $this->setDb($db);
    }

    public function setDb(PDO $db){
        $this->db=$db;
    }

    /**
     * Méthode qui retourne un tableau d'instances de la classe Category
     * @return array : $categories
     */
    public function getListCategories(){
        $categories = array();
        $req = $this->db->query('SELECT categoryID as id, category as text FROM tp2__categories');
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $categories[]=new Category($data);
        }
        return $categories;
    }

    /**
     * Méthode qui retourne un tableau d'instances de la classe Question
     * @param $categoryID : Id de la catégorie de questions
     * @return array : $questions tableau de questions
     */
    public function getListQuestions($categoryID){
        $questions = array();
        $req = $this->db->prepare('SELECT questionID as id, question as text FROM tp2__questions WHERE categoryID =:categoryID');
        $req->bindValue(":categoryID",$categoryID,PDO::PARAM_INT);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $questions[]=new Question($data);
        }
        return $questions;
    }

    /**
     * Méthode qui retourne un tableau d'instances de la classe Answer avec l'information sur la bonne récponse
     * @param $questionID : Id de la question à laquelle appartiennent les réponses
     * @return array : $answers tableau de réponses
     */
    public function getListAnswers($questionID){
        $answers = array();
        $req = $this->db->prepare('SELECT answerID as id, answer as text FROM tp2__answers WHERE questionID =:questionID');
        $req->bindValue(":questionID",$questionID,PDO::PARAM_INT);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $answer = new Answer($data);
            $answer->setState($this->isGoodAnswer($answer));
            $answers[]=$answer;
        }
        return $answers;
    }

    /**
     * Méthode qui vérifie si la réponse est bonne
     * @param $answer l'instance de la réponse
     * @return bool : True si la réponse est bonne sinon False
     */
    public function isGoodAnswer(Answer $answer){
        return (bool) $this->db->query('SELECT count(*) FROM tp2__goodAnswers WHERE answerID ='.$answer->getId())->fetchColumn();
    }
}