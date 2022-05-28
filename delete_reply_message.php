<?php
    
    $id = $_GET["id"];
    $reply_id = $_GET["reply_id"];
    
    require_once("dbtools.inc.php");

    /*echo $id."<br>";
    echo $reply_id;*/
    
    $link = create_connection();
    $sql = "DELETE FROM reply_message WHERE id = $id AND reply_id = $reply_id";	
    $result = execute_sql($link,"Portfolio_3",$sql);

    
    
    //mysqli_free_result($result);    
    mysqli_close($link);
    header("location:show_news.php?id=".$reply_id);
    exit();
    
    
    
        
    
    
?>