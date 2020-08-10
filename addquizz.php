<?php include 'database.php'?>
<?php
    if(isset($_POST['submit'])){
        //get post variables
        $ques_num=$_POST['que_num'];
        $ques_text=$_POST['que_text'];
        $correct_choice=$_POST['answer'];

        //choice array
        $choices=array();
        $choices[1]=$_POST['choice1'];
        $choices[2]=$_POST['choice2'];
        $choices[3]=$_POST['choice3'];
        $choices[4]=$_POST['choice4'];

        //question insert
        $query="INSERT INTO Questions(ques_num, text)
                VALUES('$ques_num','$ques_text')";
        //run query
        $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
        //validate insert
        if($insert_row){
            foreach ($choices as $choice=>$value){
                if($value!=''){
                    if($correct_choice==$choice){
                        $is_correct=1;
                    }else{
                        $is_correct=0;
                    }
                   //choice query
                   $query="INSERT INTO Choices(ques_num,is_correct,text)
                            VALUES('$ques_num','$is_correct','$value')";
                    //run query
                    $insert_row=$mysqli->query($query) or die($mysqli->error.__LINE__);
                    //validate insert
                    if($insert_row){
                        continue;
                    }else{
                        die("Error:('.mysqli->errno . ')". $mysqli->error);
                    }
                }
            }
            $msg="Question has been added";
        }

    }
      //get total questions
      $query="SELECT * FROM Questions";
      //get result
      $result=$mysqli->query($query) or die($mysqli->error.__LINE__);
      $total=$result->num_rows;
      $next=$total+1;

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
            <h2>Add a question</h2>
            <?php
                if(isset($msg)){
                    echo '<p>'.$msg.'</p>';
                }
            ?>
            <form method="post" action="addquizz.php">
                <p>
                    <label>Question Number:</label>
                    <input type="number" name="que_num" value="<?php echo $next;?>">
                </p>
                <p>
                    <label>Question:</label>
                    <input type="text" name="que_text">
                </p>
                <p>
                    <label>Choice 1:</label>
                    <input type="text" name="choice1">
                </p>
                <p>
                    <label>Choice 2:</label>
                    <input type="text" name="choice2">
                </p>
                <p>
                    <label>Choice 3:</label>
                    <input type="text" name="choice3">
                </p>
                <p>
                    <label>Choice 4:</label>
                    <input type="text" name="choice4">
                </p>
                <p>
                    <label>Correct Answer:</label>
                    <input type="number" name="answer">
                </p>
                <p>
                    <input class="submit_btn" type="submit" name="submit" value="Submit">
                </p>
            </form>
            <p>If you want to take quiz click <a href="index.php">here</a>.</p>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2020 PHP Quizzer.
        </div>
    </footer>
</body>
</html>