<?php include 'database.php'?>
<?php
    //get total number of questions
    $query="SELECT * FROM Questions";

    //get results
    $result=$mysqli->query($query) or die($mysqli->error.__LINE__);
    $total=$result->num_rows;
?>
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
            <h2>Test your PHP knowledge</h2>
            <p>This is a multiple choice quiz to test your
            knowledge in PHP.</p>
            <ul>
                <li><strong>Number of questions:</strong><?php echo $total;?></li>
                <li><strong>Type:</strong>Multiple choice</li>
                <li><strong>Estimated time:</strong><?php echo $total*.5;?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start"> Start Quiz</a>
            <p>If you want to add more questions click <a href="addquizz.php">here</a>.</p>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020 PHP Quizzer.
        </div>
    </footer>
</body>
</html>