<?php
    $dbhost = 'localhost';  // mysql服务器主机地址
    $dbuser = 'root';            // mysql用户名
    $dbpass = 'ajdts';          // mysql用户名密码
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(! $conn ) {
        die('连接失败: ' . mysqli_error($conn));
    }
    // 设置编码，防止中文乱码
    mysqli_query($conn , "set names utf8");
    $email = $_POST["remail"];
    $password = $_POST["repass"];
    $sql = 'SELECT *
            FROM useraccounts
            WHERE userEmail= "' . $email . '" ';
    
    mysqli_select_db( $conn, 'yida_online_judge' );
    $retval = mysqli_query( $conn, $sql );
    if(! $retval ) {
        die('无法读取数据: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($retval);
    $p=$row["userPass"];
    $n=$row["userName"];
    $ad=$row["isAdmin"];
    if($p!=null && $password!=null && !strcmp($p,$password)) {
        setcookie("email", $email, time()+3600*5);
        header("Location: /home");
    } else {
        header("Location: login.php");
    }
    // 释放内存
    mysqli_free_result($retval);
    mysqli_close($conn);
?>
