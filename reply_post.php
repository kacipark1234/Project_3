<?php
    
    
    require_once("dbtools.inc.php");
    $author = $_POST["author"];
    $subject = $_POST["subject"];
    $text = $_POST["text"];
    $time = date("Y-m-d H:i:s");
    $reply_id = $_POST["reply_id"];

    $link = create_connection();
    //$sql = "SELECT * FROM message";
    $sql = "INSERT INTO reply_message(author,subject,content,date,reply_id) VALUES('$author','$subject','$text','$time','$reply_id')";
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
    header("location:show_news.php?id=".$reply_id);
    exit();
    
    
    
        
    
    
?>