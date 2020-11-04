<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>注册 - YidaOJ</title>
<link rel="stylesheet" type="text/css" href="http://static.spacei.top/mouse.css" />
<link rel="stylesheet" type="text/css" href="http://static.spacei.top/head.css" />
<link rel='shortcut icon' href='http://static.spacei.top/spacei.png' /></head>
<body >
<?php
include ("nav.php");
?>
<form name="myForm" action="MakeAccounts.php" onsubmit="return validateForm();" method="post">
<div class="banner-box" >
    <h1><center>注册</center></h1><br>
    <h2><center><font size=3>昵称: </font><input onBlur="checkN()" id="name" name="newname" type="textarea" /></center></h2><br><br>
    <h2><center><font size=3>邮箱: </font><input onBlur="checkE()" id="email" name="newmail" type="textarea" /></center></h2><br>
    <script>
        function validateForm(){
            var y=document.forms["myForm"]["name"].value;
            var x=document.forms["myForm"]["email"].value;
            var atpos=x.indexOf("@");
            var dotpos=x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
                alert("不是一个有效的 e-mail 地址");
                return false;
            }
            var com="QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890_";
            for (var i=0;i<y.length;i++){
                var flag=0;
                for (var j=0;j<com.length;j++){
                    if(y[i]==com[j]) {flag=1; break;}
                }
                if(flag==0) {
                    alert("昵称里不能有非法字符");
                    return false;
                }
            }
        }
    </script><br>
    <h2><center><font size=3>密码: </font><input name="newpass" type="password" /></center></h2><br>
    <h2><center><input type="submit"/></center></h2>
</div>
</form>

</html></body>