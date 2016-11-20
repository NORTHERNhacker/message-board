
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>登陆成功</title>
        <style>
        html {
            margin: 0;
            height: 100%;
        }

        body {
            margin: 0;
            height: 100%;
            align-items: center;
            background: black;
            color: #ccc;
        }

        html::before,
        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: .5vmin;
            height: .5vmin;
            border-radius: 10%;
            color: transparent;
        }

        html::before {
            box-shadow: 93vw 63vh .3vmin rgba(255, 255, 255, .8),
            3vw 17vh .3vmin rgba(255, 255, 255, .8),
            28vw 85vh .3vmin rgba(255, 255, 255, .8),
            97vw 82vh .3vmin rgba(255, 255, 255, .8),
            55vw 83vh .3vmin rgba(255, 255, 255, .8),
            74vw 72vh .3vmin rgba(255, 255, 255, .8),
            84vw 11vh .3vmin rgba(255, 255, 255, .8),
            32vw 6vh .3vmin rgba(255, 255, 255, .8),
            45vw 92vh .3vmin rgba(255, 255, 255, .8),
            98vw 57vh .3vmin rgba(255, 255, 255, .8),
            63vw 98vh .3vmin rgba(255, 255, 255, .8),
            90vw 46vh .3vmin rgba(255, 255, 255, .8),
            50vw 86vh .3vmin rgba(255, 255, 255, .8),
            38vw 21vh .3vmin rgba(255, 255, 255, .8),
            74vw 2vh .3vmin rgba(255, 255, 255, .8),
            89vw 22vh .3vmin rgba(255, 255, 255, .8),
            39vw 0vh .3vmin rgba(255, 255, 255, .8),
            25vw 89vh .3vmin rgba(255, 255, 255, .8),
            54vw 58vh .3vmin rgba(255, 255, 255, .8),
            81vw 39vh .3vmin rgba(255, 255, 255, .8),
            51vw 8vh .3vmin rgba(255, 255, 255, .8),
            24vw 56vh .3vmin rgba(255, 255, 255, .8),
            50vw 23vh .3vmin rgba(255, 255, 255, .8),
            62vw 34vh .3vmin rgba(255, 255, 255, .8),
            10vw 77vh .3vmin rgba(255, 255, 255, .8),
            92vw 45vh .3vmin rgba(255, 255, 255, .8),
            70vw 40vh .3vmin rgba(255, 255, 255, .8),
            2vw 53vh .3vmin rgba(255, 255, 255, .8),
            3vw 54vh .3vmin rgba(255, 255, 255, .8),
            18vw 21vh .3vmin rgba(255, 255, 255, .8),
            48vw 47vh .3vmin rgba(255, 255, 255, .8),
            83vw 96vh .3vmin rgba(255, 255, 255, .8),
            26vw 32vh .3vmin rgba(255, 255, 255, .8),
            46vw 9vh .3vmin rgba(255, 255, 255, .8),
            2vw 13vh .3vmin rgba(255, 255, 255, .8),
            29vw 63vh .3vmin rgba(255, 255, 255, .8),
            17vw 90vh .3vmin rgba(255, 255, 255, .8),
            78vw 9vh .3vmin rgba(255, 255, 255, .8),
            15vw 39vh .3vmin rgba(255, 255, 255, .8),
            90vw 5vh .3vmin rgba(255, 255, 255, .8);
        }




        
        }
    </style>
    </head>
    <body>
          <?php                 


    //登录  
    if(!isset($_POST['submit'])){  
        exit('wrong！invalid！');  
    }  
                $servername = "127.0.0.1"; 
                $usernamesql = "root"; 
                $passwordsql = ""; 
                $con = mysqli_connect($servername, $usernamesql, $passwordsql);

                $dbname = "information";

                mysqli_select_db($con,$dbname);
                mysqli_set_charset($con, "utf-8");

                $username=$_POST["username"];
                $password=$_POST["password"];
                
                $cache = "SELECT * from user WHERE username = ";
                $query = "{$cache}'{$username}'";
                //echo $query;
                $get = mysqli_query($con, $query);
                $result = mysqli_fetch_assoc($get); 
                if ($result == false)
                {
                    echo "The account does not exist!请检查或注册。";
                exit('<a href="javascript:history.back(-1);">返回</a> 重试');

                }
                else
                
                    if ($result['password'] != $password) 
                    {
                        echo " Password is wrong!请重新输入！";
                    exit(' <a href="javascript:history.back(-1);">返回</a> 重试');             
                    }
                    else
                    {
             //登录成功    
                setcookie("user",base64_encode($username),time()+2*7*24*3600);
                echo $username,' 欢迎您的到来！ <br>';  
                echo "<center><h1>请等待更多新功能的上线，留言请点击进入用户留言中心</h1></center>";
                echo '<center><a href="my.php">用户留言中心</a></center><br>';                 
                echo '<center>点击此处 <a href="logout.php?action=logout">注销</a> <center><br>'; 
                exit;  
                }

                

      

    ?> 

    </body>
    </html>
    
