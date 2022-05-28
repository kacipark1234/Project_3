<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
 
    <title>主題區</title>
    <style type="text/css">
            html{
                 height: 100%;
            }
            body{
                background-image: url(bg.jpg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-attachment: fixed;
                height: 100%;
            }
            .top_div{
                background-image: url(title_1.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
               
                width:100%;
                height:250px;
                
            }
            .button_div{
                height:50px;
                background-color:DodgerBlue;
                width:800px;
                margin:0 auto;
            }
        </style>
        <script type="text/javascript">
            function _check(){
                if(document.myForm.author.value.length == 0 || document.myForm.subject.value.length == 0 || document.myForm.text.value.length == 0){
                    alert("請填完資料");
                }
                else{
                    myForm.submit();
                }
            }
            
            
        </script>
</head>
<body>
    
    <?php
        require_once("dbtools.inc.php");
            
        $id = $_GET["id"];
        
    
        
        $link = create_connection();
        $sql = "SELECT * FROM message WHERE id = $id";
        $result = execute_sql($link,"Portfolio_3",$sql);
    
        echo "<table width='800' align='center' cellspacing='3'>";
        
        $j=1;
        $bg[0]="#0AB16F";
        $bg[1]="#EC5C59";
        $bgg[0]="#D9D9FF";
        
        while($row = mysqli_fetch_assoc($result)){
            
           // echo 
            echo "<div class='top_div'><br><br><br><br><h1  align='center' >". $row["subject"]."</h1></div>";
            echo "<tr bgcolor='".$bgg[0]."'>";
            echo " <td width='120' align='center' >".$row["subject"]."</td>";
            echo "<td>作者:".$row["author"]."<br>";
            echo "時間:".$row["date"]."<br></td></tr>";
            
            echo "<tr bgcolor='".$bgg[0]."'>";
            echo " <td width='120' align='center' >"."文章"."</td>";
            echo "<td height='300px' valign='top'>".$row["content"]."<br></td></tr>";
            //echo "<a herf='show_news.php'>777777</a>";
            
        }
        
        
        echo "<div class='button_div'> <a href='index.php'>返回</a></div>";
        echo "</table>";
        
        mysqli_free_result($result);
        echo "<table width='800' align='center' cellspacing='3'>";
        
        $link = create_connection();
        $sql = "SELECT * FROM reply_message WHERE reply_id = $id";
        
        $result = execute_sql($link,"Portfolio_3",$sql);
        //echo $sql;
        if(mysqli_num_rows($result) == null){
            echo "<tr bgcolor='".$bg[1]."'>";
            echo " <td width='120' align='center' ></td>";
            echo "<td>尚未留言<br></td></tr>";
        }
        else{
            $j=1;
            while($row = mysqli_fetch_assoc($result)){
            
                echo "<tr bgcolor='".$bg[$j%2]."'>";
                echo " <td width='120' align='center' >作者:".$row["author"]."<br>主題:".$row["subject"]."<br>時間:".$row["date"]."</td>";
                echo "<td>".$row["content"]."<br><br></td>";
                echo "<td  width='120' align='center'><a href='delete_reply_message.php?id=".$row["id"]."&reply_id=".$row["reply_id"]."'>刪除留言</a></td>.</tr>";
                $j++;
            }
            
            
            
        }
        
        
        echo "</table>";
        mysqli_free_result($result);
        mysqli_close($link);
        /*
       echo "<p align='center' >";
        if($page > 1){
            echo "<a href='index.php?page=".($page-1)."'>上一頁</a>";
        }
        for($i = 1;$i<=$total_page;$i++){
            if($i==$page){
                echo "$i";
                
            }
            else{
                echo "<a href='index.php?page=$i'>$i </a>";
                    
            }
            
        }
        if($page < $total_pages){
            echo  "<a href='index.php?page=".($page+1)."'>下一頁</a>";
        }
        echo "</p>";*/
    
        
        
    ?>
    
    
    <form name="myForm" method="post" action="reply_post.php">
        <input name="reply_id" type="hidden" value="<?php echo $id ?>">
        <table border="1" width="800" align="center">
            <tr>
                <td colspan="2">
                    <font>回覆留言</font>
                </td>
            </tr>
            <tr>
                <td width=15%>
                    <font>作者</font>
                </td>
                <td width=85%>
                    <input name="author" type="text" size="50">
                </td>
            </tr>
            <tr>
                <td width=15%>
                    <font>主題</font>
                </td>
                <td >
                    <input name="subject" type="text" size="50">
                </td>
            </tr>
            <tr>
                <td width=15%>
                    <font>留言</font>
                </td>
                <td >
                    <textarea name="text" size="500" cols="5" rows="5" style="width:70%;height:100px;"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" value="發佈留言" onClick="_check()">
                    <input type="reset" value="重新輸入">
                </td>
            </tr>
        </table>
    
    </form>
    
    
</body>
</html>