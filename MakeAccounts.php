<?php
    $dbhost = 'localhost';  // mysql服务器主机地址
    $dbuser = 'root';            // mysql用户名
    $dbpass = 'ajdts';          // mysql用户名密码
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(! $conn ) {
        die('连接失败: ' . mysqli_error($conn));
    }
    // 设置编码，防止中文乱码
    mysqli_query($conn , "set names ANSI");
    
    $Name = $_POST["newname"];
    $email = $_POST["newmail"];
    $password = $_POST["newpass"];
    
    if($Name!=null && $email != null && $password != null){
        $sqlr = 'SELECT count(*)
                FROM useraccounts
                WHERE userEmail= "' . $email . '"';
        mysqli_select_db( $conn, 'yida_online_judge' );
        $retvalr = mysqli_query( $conn, $sqlr );
        if(mysqli_num_rows( $retvalr)) {     
            $rs=mysqli_fetch_array($retvalr);    
            //统计结果
            $count=$rs[0];    
         }else{     
             $count=0;
         }
        if($count==1){
            header("Location: login.php");
        } else {
            $sql = "INSERT INTO useraccounts ".
            "(userEmail, userPass, userName, isAdmin, rating) ".
            "VALUES ".
            "('$email','$password','$Name','0','1500')";

            $retval = mysqli_query( $conn, $sql );
            if(! $retval ) {
                die('无法插入数据: ' . mysqli_error($conn));
            }
            header("Location: login.php");
        }
        mysqli_close($conn);
    } else {
        die("昵称/邮箱/密码 尚未填写完整，请重新填写!");
    }
?>