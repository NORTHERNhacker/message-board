      <?php  
 
        //数据库连接  
        $servername = "127.0.0.1"; 
        $usernamesql = "root"; 
        $passwordsql = ""; 
        $con = mysqli_connect($servername, $usernamesql, $passwordsql);
        $dbname = "information";
        mysqli_select_db($con,$dbname);
        mysqli_set_charset($con, "utf-8");

        //检测是否登录，若没登录则转向登录界面  
        if(isset($_COOKIE['username'])){   
            header("Location:login.html");  
            exit();    
        }
        $username = base64_decode($_COOKIE['user']);  
        $user_query = mysql_query("select * from user where username = $username limit 1");
        echo '<center><h1>用户留言板</h1></center>';          
        echo '<h2 >用户信息：</h2><br>';  
        echo '<h3>用户名：',$username,'</h3><br>';
        echo "<img src=./img/background.jpg><br>";      
        echo '<a href=./logout.php?action=logout>注销</a> '; 
     ?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户留言中心</title>
    <style type="text/css">
        html,body
        {
            height: 100%;
            min-height: 100%; 
            color: white;
        }
        html
        {
            overflow-x: hidden; 
            overflow-y: auto;
        }
        .main
        {
            width: 100%;
            background-color: rgba(255,255,255,0.1);
            position: relative;
            min-height: 100%;
            height: auto !important;
            text-align: center;
            padding-top: 10px;
            font-size: 30px;
        }
        .form
        {
            font-size: 50px;
   
        }
        
        .content:hover{
            width:800px;
            height: 300px;
        }
        .text1:hover
        {
            width:100%;
            height: 300px;
        }

    </style>
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/jquery.form.js"></script>
</head>
<body background="./img/index.png">

<div class="main">
   <div class="text1">
    <form id="contentform" method="POST" action="my.php" style="<?php echo $i; ?>">
        <textarea id="content" type="text" class="content" name="content" style="border-radius:10px"  cols="40" rows="5" wrap="hard" placeholder="Please enter message here ,No more than 300 characters" ></textarea>
        <br>
        <input id="button" type="submit" class="button" value=" 点 我 留 言 " style="width:120px;height:60px;">
        </div>
    </form>
    <div style="<?php echo $i; ?>" id="getcontent" > </div>
    <br>
    <script type="text/javascript">
            window.onload=function ()
            {
                htmlobj=$.ajax({url:"./getcontent.php",async:false});
                $("#getcontent").html(htmlobj.responseText);
            };

            $('form').on('submit', function() 
            {
                var content = $('textarea').val();
                if (content == "")
                {
                    alert("Please input your messages!");
                    return false;
                }
                if (content.length > 300)
                {
                    alert("No more than 300 characters!");
                    return false;
                }
                $(this).ajaxSubmit(
                {
                    type: 'post', 
                    url: './add.php', 
                    data: 
                    {
                        'content': content
                    },
                    success: function() 
                    { 
                        htmlobj=$.ajax({url:"./getcontent.php",async:false});
                        $("#getcontent").html(htmlobj.responseText);
                    }
                 });
                document.getElementById("contentform").reset(); 
                return false; 
            });
    </script>
</div>
 
</body>
</html>
