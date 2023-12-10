<?php

$flashcards = array(
    "What is the capital of England?" => "London",
    //ADD your own questions and answers here
);

shuffle($flashcards);

$score = 0;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $selectedAnswer = $_POST["answer"];
}

$correctAnswer = $_SESSION["flashcards"][$_SESSION["currentQuestion"]];

if ($selectedAnswer === $correctAnswer) {
    $score++;
}

?>