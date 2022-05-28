<?php
    
    
    require_once("dbtools.inc.php");
    $author = $_POST["author"];
    $subject = $_POST["subject"];
    $text = $_POST["text"];
    $time = date("Y-m-d H:i:s");
    
    $link = create_connection();
    //$sql = "SELECT * FROM message";
    $sql = "INSERT INTO message(author,subject,content,date) VALUES('$author','$subject','$text','$time')";
    $result = execute_sql($link,"Portfolio_3",$sql);
    
    /*echo $author;
    echo $subject;
    echo $text;
    echo $time;*/
    
    //$cid = mysqli_num_rows($result) + 1;
    //$sql = "INSERT INTO message(author,subject,content) VALUES('$author','$subject','$text','$time')";
    //echo $sql;
    //$result = execute_sql($link,"Portfolio_3",$sql);
    
        
    mysqli_close($link);
    header("location:index.php");
    exit();
    
    
    
        
    
    
?>