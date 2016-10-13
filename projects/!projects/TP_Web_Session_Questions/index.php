<?php
/**
 * Created by PhpStorm.
 * User: amine
 * Date: 29/10/2015
 * Time: 19:44
 */

header('content-type: text/html; charset=utf-8');

session_start();

// charger les paramètres de la BD
require_once("./lib/options.php");
require_once("./lib/mysql.php");

// chargment des class
function chargerClass($classname)
{
    require 'classes/' . $classname . '.class.php';
}

spl_autoload_register('chargerClass');

// initialiser l'indice du tableau des catégories : 0 si première visite sinon variable de session
$step = (isset($_SESSION['step'])) ? $_SESSION['step'] : 0;

// initialiser le tableau des choix de réponses : vide si première visite sinon les choix précédents
$choicesArray = (isset($_SESSION['choicesArray'])) ? unserialize($_SESSION['choicesArray']) : array();

// replissage des variables de session par les envoi POST du questionnaire sur chaque page
if (isset($_POST['envoi'])) {
    foreach ($_POST as $question => $answer) {
        if (is_int($question)) { // avec le test is_int($question) on s'assure de pas inclure le value du bouton submit dans le tableau des choix de réponses
            $choicesArray[$question] = $answer;
        }
    }
    if ($_POST['envoi'] != 'Évaluation') {
        $_SESSION['choicesArray'] = serialize($choicesArray);
        $step++;
        $_SESSION['step'] = $step;
    }
}
//var_dump($choicesArray);

// création de l'objet de connexion 
$db = connection();

// création d'une instance du manager 
$manager = new Manager($db);

$categories = array();
$questions = array();
$answers = array();

// création du tableau de catégories. Chaque catégorie contient un tab de question, chaque question contient un tab de réponses.
// chaque objet réponse contient une propriété d'instance booléenne $state : bonne réponse = True sinon False 
$categories = $manager->getListCategories();
foreach ($categories as $category) {
    $questions = $manager->getListQuestions($category->getId());
    $category->setArrayItems($questions);
    foreach ($questions as $question) {
        $answers = $manager->getListAnswers($question->getId());
        $question->setArrayItems($answers);
    }
}
/*echo("<pre>");
print_r($categories);
echo("</pre>");*/
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quizz</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
	
	<p>Travail de session - Silviya Draganova & Mohamed Amine Mrabet </p>
	<p>Programation web dynamique II - groupe 14607</p>

<div id="container">
    <!-- test : Si la catégorie demandée existe bien ET ( si on charge le questionnaire pour la première fois OU on passe d'un questionnaire à un autre mais qu'on est pas encore arrivé à l'évaluation) -->
    <?php if ((isset($categories[$step])) && ((!isset($_POST['envoi'])) || (isset($_POST['envoi']) && ($_POST['envoi'] != 'Évaluation')))) { ?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <fieldset>
            <h1>Étape <?php echo ($step+1)." : ".$categories[$step]->getText(); ?></h1>
            <?php
            $questionsCounter= 0;
            foreach ($categories[$step]->getArrayItems() as $question) {
                echo "<span class='qstSpan'>".++$questionsCounter."- ".htmlentities($question->getText())."</span><br>"."\n\t";
                foreach ($question->getArrayItems() as $answer) {
                    echo '<input type="radio" name="' . htmlentities($question->getId()) . '" value="' . htmlentities($answer->getId()) . '"><span class="answSpan">' . htmlentities($answer->getText()) . '</span><br>';
                }
                echo "<br><br>"."\n\t";
            }
            ?>
            <input type="submit" name="envoi"
                   value="<?= (isset($categories[$step + 1])) ? "Prochaine étape (" . ($step + 2) . ") : " . $categories[$step + 1]->getText() : "Évaluation" ?>"/>
        </fieldset>
    </form>
    <?php
    } else {
        echo new Evaluation($categories,$choicesArray);
        session_unset();
        session_destroy(); // on affiche l'évaluation et on vide la session pour que si on charge la page de nouveau on refait le questionnaire
    } ?>
</div>
</body>
</html>

