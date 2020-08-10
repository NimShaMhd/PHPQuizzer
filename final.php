<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>You're Done!!</h2>
            <p>Congrats! You have completed the test.</p>
            <p>Final score:<strong><?php echo $_SESSION['score'];?></strong></p>
            <a href="question.php?n=1" class="start">Take again</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020 PHP Quizzer.
        </div>
    </footer>
</body>
</html>
<?php session_destroy(); ?>