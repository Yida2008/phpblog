<?php
error_reporting(0); 
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'ajdts';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");
$email = $_COOKIE["email"];
$sql = 'SELECT *
        FROM useraccounts
        WHERE userEmail= "' . $email . '" ';

mysqli_select_db( $conn, 'yida_online_judge' );
$retval = mysqli_query( $conn, $sql );
if(! $retval ) {
    die('无法读取数据: ' . mysqli_error($conn));
}
$row=mysqli_fetch_array($retval);
$username=$row["userName"];
$ad=$row["isAdmin"];
// 释放内存
mysqli_free_result($retval);
mysqli_close($conn);

$userlogin=0;
if($username == null) {
    $userlogin = 0;
    if($_SERVER["REQUEST_URI"]!='/login.php' && $_SERVER["REQUEST_URI"]!='/account.php') header('Location: /login.php');
} else {
    $userlogin = 1;
}

echo('
<img id="img" src="http://static.spacei.top/loading.gif"/>
<script>
var img = document.getElementById("img");
var bb = document.body;
img.style.display="block";
bb.style.cssText="display:none;";
document.onreadystatechange = function() { //当页面加载状态改变的时候执行function
    if(document.readyState == "complete") {
        img.style.display="none";
        bb.style.cssText="display:block;";
    } else {
        bb.style.cssText="display:none;";
    }
}
</script>
');

echo("
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS-MML_HTMLorMML'></script> <script type=text/x-mathjax-config> MathJax.Hub.Config({
    extensions: ['tex2jax.js'],
    tex2jax: {
      inlineMath: [['$','$'], ['$$$', '$$$'], ['\\(','\\)']],
      displayMath: [['$$','$$'], ['\\[','\\]']],
      processEscapes: true,
      showProcessingMessages: false,
      messageStyle: 'none',
      processEnvironments: true,
      skipTags: [
        'script',
        'style',
        'textarea',
        'input',
        'code',
        ],
      ignoreClass: 'CodeMirror|language-cpp|ace_editor|noJax',
      },
    });
     MathJax.Hub.Queue(['Typeset', MathJax.Hub]); </script> <script>function MathUpdate(){MathJax.Hub.Queue(['Typeset',MathJax.Hub])}setInterval(MathUpdate,300)</script>
<dl >
    <ni><a id='hom' href='/home'>主页</a></ni>
    <ni><a id='pro' href='/problemset'>题目</a></ni>
    <ni><a id='sta' href='/status'>状态显示</a></ni>
    <ni><a id='ran' href='/rank'>榜单</a></ni>
    <ni><a id='con' href='/contest'>比赛</a></ni>
    <ni><a id='blo' href='/blogs'>博客</a></ni>
    
    <script>
        var hom=document.getElementById('hom');
        var pro=document.getElementById('pro');
        var sta=document.getElementById('sta');
        var ran=document.getElementById('ran');
        var con=document.getElementById('con');
        var blo=document.getElementById('blo');
        var ID=document.body.id;
        if(ID=='home') {
            hom.className='active';
        }
        if(ID=='problemset') {
            pro.className='active';
        }
        if(ID=='status') {
            sta.className='active';
        }
        if(ID=='rank') {
            ran.className='active';
        }
        if(ID=='contest') {
            con.className='active';
        }
        if(ID=='blog') {
            blo.className='active';
        }
        
    </script>

    <!--侧边栏-->
    <right>
        <a id='userid' onclick=''>");
        if($userlogin==0) echo("未登录");
        else echo($username);
    echo("
		</a>
    </right>
</dl>");
if($userlogin==0) {
        echo("
    <follow id='1' hidden='true'>
        <a href='/login.php'>登录</a>
        <a href='/account.php'>注册</a>
    </follow>");
} else {
    if($ad==0) {
        echo("
    <follow id='1' hidden='true'>
        <a href='/logout.php'>退出登录</a>
        <a href='/information'>个人信息</a>
        <a href='/myblog'>我的博客</a>
    </follow>");
    } else {
        echo("
    <follow id='1' hidden='true'>
        <a href='/logout.php'>退出登录</a>
        <a href='/information'>个人信息</a>
        <a href='/myblog'>我的博客</a>
        <a href='/admin'>管理</a>
    </follow>
        ");
    }
}
echo("
<script>
    var flag = 0;
    var userid1=document.getElementById('userid');
    var f=document.getElementById('1');
    userid1.onclick = function(){ //当被点击，则显示
        if(flag) {
            flag = 0;
            f.hidden=true;
        } else {
            flag = 1;
            f.hidden=false;
        }
    }
</script>
<script src='http://cdn.bootcss.com/highlight.js/9.11.0/highlight.min.js'></script>
<script>hljs.initHighlightingOnLoad();</script>
<script src='http://cdn.bootcss.com/highlight.js/8.0/highlight.min.js'></script>
<script src='//cdn.bootcss.com/highlightjs-line-numbers.js/1.1.0/highlightjs-line-numbers.min.js'></script>
<script>hljs.initLineNumbersOnLoad();</script>

");


?>