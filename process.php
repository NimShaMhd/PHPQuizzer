<?php include 'database.php';?>
<?php session_start();?>
<?php 
    //check to see score is set or not
    if(!isset($_SESSION['score'])){
        $_SESSION['score']=0;
    }
    if($_POST){
        $number=$_POST['number'];
        $selected_choice=$_POST['choice'];

        $next=$number+1;

        //get total questions
        $query="SELECT * FROM Questions";
        //get result
        $result=$mysqli->query($query) or die($mysqli->error.__LINE__);
        $total=$result->num_rows;


        //get correct answer
        $query="SELECT * FROM Choices
                WHERE ques_num=$number AND is_correct=1";
        //get result
        $result=$mysqli->query($query) or die($mysqli->error.__LINE__);
    
        //getrow
        $row=$result->fetch_assoc();

        //set correct choice
        $correct_choice=$row['id'];

        //compare

        if($correct_choice==$selected_choice){
            //answer is correct
            $_SESSION['score']++;
        }
        
        if($number==$total){
            header("Location:final.php");
            exit();

        }else{
            header("Location:question.php?n=".$next);
        }
    }
?>