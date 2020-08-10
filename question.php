<?php include 'database.php'?>

<?php
    //set question number
    $number=(int)$_GET['n'];


      //get total questions
      $query="SELECT * FROM Questions";
      //get result
      $result=$mysqli->query($query) or die($mysqli->error.__LINE__);
      $total=$result->num_rows;
      


    /*
    * Get Question
    */
    $query="SELECT * FROM Questions
            WHERE  ques_num =$number";
    
            //get result
    $result=$mysqli->query($query) or die($mysqli->error.__LINE__);

    $question=$result->fetch_assoc();


    /*
    * Get CHOICES
    */
    $query="SELECT * FROM Choices
            WHERE  ques_num =$number";
    
//get result
    $choice=$mysqli->query($query) or die($mysqli->error.__LINE__);


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
            <div class="current"> Question <?php echo $question['ques_num'];?> to <?php echo $total;?></div>
            <p class="question">
                <?php
                    echo $question['text'];    
                ?>
            </p>
            <form action="process.php" method="post">
                <ul class="choice">
                    <?php while($row=$choice->fetch_assoc()):?>
                    <li><input name="choice" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li>
                    <?php endwhile;?>
                </ul>
                <input class="submit_btn" type="submit" value="Submit">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020 PHP Quizzer.
        </div>
    </footer>
</body>
</html>