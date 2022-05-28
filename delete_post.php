<?php
    
    $id = $_GET["id"];
    
    require_once("dbtools.inc.php");

    
    $link = create_connection();
    //$sql = "SELECT * FROM message";
    $sql = "DELETE FROM message WHERE id = $id";	
    //$sql = "INSERT INTO message(author,subject,content,date) VALUES('$author','$subject','$text','$time')";
    $result = execute_sql($link,"Portfolio_3",$sql);

    $sql = "DELETE FROM reply_message WHERE reply_id = $id";
    $result = execute_sql($link,"Portfolio_3",$sql);

    /*echo $author;
    echo $subject;
    echo $text;
    echo $time;*/
    
    //$cid = mysqli_num_rows($result) + 1;
    //$sql = "INSERT INTO message(author,subject,content) VALUES('$author','$subject','$text','$time')";
    //echo $sql;
    //$result = execute_sql($link,"Portfolio_3",$sql);
    
    //mysqli_free_result($result);    
    mysqli_close($link);
    header("location:index.php");
    exit();
    
    
    
        
    
    
?>