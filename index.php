<?php

$flashcards = array(
    "What is the capital of England?" => "London",
    //ADD your own questions and answers here
);

shuffle($flashcards);

$score = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $selectedAnswer = $_POST["answer"];

    $correctAnswer = $_SESSION["flashcards"][$_SESSION["currentQuestion"]];

    if ($selectedAnswer === $correctAnswer) {
        $score++;
    }

    $_SESSION["currentQuestion"]++;

    if ($_SESSION["currentQuestion"] >= count($_SESSION["flashcards"])) {
        echo "<h2>Your final score is $score out of " . count($_SESSION["flashcards"]) . ".</h2>";
        session_destroy();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcard Game</title>
</head>



<?php
session_start();

if (!isset($_SESSION["flashcards"])) {
    $_SESSION["flashcards"] = $flashcards;
    shuffle($_SESSION["flashcards"]);
    $_SESSION["currentQuestion"] = 0;
    $score = 0;
}
?>

<?php if ($_SESSION["currentQuestion"] < count($_SESSION["flashcards"])) : ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2><?php echo key($_SESSION["flashcards"]); ?></h2>
        <label for="answer">Type your answer:</label>
        <input type="text" name="answer" required>
        <button type="submit">Submit your Answer</button>
    </form>
<?php endif; ?>

<body>

</html>