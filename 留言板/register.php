     <?php  
        if(isset($_POST["submit"]) && $_POST["submit"] == "注册")  
        {  
            $user = $_POST["username"];  
            $psw = $_POST["password"];  
            $psw_confirm = $_POST["relpass"];  
            if($_POST['username']=='')
            {
              echo "<script>alert('用户名不能为空'); history.go(-1);</script>";
            exit();
            }
            else if($_POST['password']=='')
            {
              echo "<script>alert('密码不能为空'); history.go(-1);</script>";
            exit();
            }
            else if($_POST['relpass']!=$_POST['password'])
            {
              echo "<script>alert('两次密码输入不一致'); history.go(-1);</script>";
            exit();
            }
            else if(!empty($_POST['email'])&&!ereg("([0-9a-zA-Z]+)([@])([0-9a-zA-Z]+)(.)([0-9a-zA-Z]+)",$_POST['email']))
            { 
               echo "<script>alert('邮箱格式不合法'); history.go(-1);</script>";
            exit();
            }
            elseif(!empty($_POST['phonenumber'])&&!is_numeric($_POST['phonenumber']))
            { 
               echo "<script>alert('电话号码必须为数字'); history.go(-1);</script>";
            exit();
            }
            else if($_POST['address']=='')
            {
              echo "<script>alert('地址不能为空'); history.go(-1);</script>";
            exit();
            }
            else  
            {  
                    mysql_connect("127.0.0.1","root","");   //连接数据库  
                    mysql_select_db("information");  //选择数据库  
                    mysql_query("set names 'utf-8'"); 
                    $sql = "select username from user where username = '$_POST[username]'"; //SQL语句  
                    $result = mysql_query($sql);    //执行SQL语句  
                    $num = mysql_num_rows($result); //统计执行结果影响的行数  
                    if($num)    //如果已经存在该用户  
                    {  
                        echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                    }  
                    else    //不存在当前注册用户名称  
                    {  
                        $sql_insert = "insert into user (username,password,email,phone,address) values('$_POST[username]','$_POST[password]','$_POST[email]','$_POST[phone]','$_POST[address]')";  
                        $res_insert = mysql_query($sql_insert);  
                        //$num_insert = mysql_num_rows($res_insert);  
                        if($res_insert)  
                        {  
                            echo "<script>alert('注册成功！'); history.go(-1);</script>";  
                        }  
                        else  
                        {  
                            echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                        }  
                    }  
                }  

            }  
 

    ?>  
<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>注册界面</title>

        <style>
        html {
            margin: 0;
            height: 100%;
        }

        body {
            margin: 0;
            height: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
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
            border-radius: 50%;
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
        div{
        transition:width 4s;
        }

        div:hover
      {
        width:600px;
      }
    </style>
</head>
<body>    <div class="reg">
          <form action="register.php" method="post" >
          <table border=1 align=center width=500  style="color: #00E3E3" background="./img/1.gif"  >
            <tr>
              <td height=40 style="color: white" colspan=2 align="center">欢迎注册</td>  
            </tr>
            <tr>
              <td height=40 style="color: #00E3E3" >ID</td>
            <td><input type="text" name="username" id="username"/></td>
            </tr>
            <tr>
              <td height=40 style="color: #00E3E3">密码</td>
              <td><input type="password" name="password" id="password"/></td>
            </tr>
            <tr>
              <td height=40 style="color: #00E3E3">确认密码</td>
              <td>
              <input type="password" name="relpass" id="relpass"/>
              </td>
            </tr>
            <tr>
              <td height=40 style="color: #00E3E3">EMAIL</td>
              <td>
              <input type="text" name="email" id="email"/>
            </tr>
            <tr>
              <td height=40 style="color: #00E3E3">您的电话</td>
              <td>
              <input type="text" name="phone" id="phone"/>
            </tr>
            <tr>
              <td height=40 style="color: #00E3E3">您的地址</td>
              <td>
              <input type="text" name="address" id="address"/>
            </tr>
            <tr>
            <td height=40 style="color: #00E3E3"></td>
            <td><input type="submit" name="submit" value="注册"/><input type="reset" value="重置">    </td>
            </tr>
          </table>
      </form>
      </div>
      <a href="login.html"><input style="width: 150px;height: 370px;" type="submit" name="submit" value="返回登陆页" /> </a>
      
      
</body>

</html>
