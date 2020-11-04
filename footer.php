<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title> - YidaOJ</title>
<link rel="stylesheet" type="text/css" href="http://static.spacei.top/mouse.css" />
<link rel="stylesheet" type="text/css" href="http://static.spacei.top/markdown.css" />
<link rel="stylesheet" type="text/css" href="http://static.spacei.top/head.css" />
<link href="https://cdn.bootcss.com/highlight.js/9.6.0/styles/atelier-lakeside-dark.min.css" rel="stylesheet"/>
<link href="http://cdn.bootcss.com/highlight.js/8.0/styles/monokai_sublime.min.css" rel="stylesheet">
<link rel='shortcut icon' href='http://static.spacei.top/spacei.png' /></head>

<?php
include("nav.php");
?>
<?php

header("content-type:text/html;charset=utf8");
require_once('Parsedown.php');
$text = "##Markdown有哪些功能？
* 方便的`导入导出`功能
    *  直接把一个markdown的文本文件拖放到当前这个页面就可以了
    *  导出为一个html格式的文件，样式一点也不会丢失
* 编辑和预览`同步滚动`，所见即所得（右上角设置）
* `VIM快捷键`支持，方便vim党们快速的操作 （右上角设置）
* 强大的`自定义CSS`功能，方便定制自己的展示
* 有数量也有质量的`主题`,编辑器和预览区域
* 完美兼容`Github`的markdown语法
* 预览区域`代码高亮`
* 所有选项自动记忆

- test
+ test




```cpp
#include<bits/stdc++.h>
using namespace std;

set<string> S;

int main(){
    int n; cin>>n;
    for(int i=0;i<n;i++){
        string x;
        cin>>x;
        S.insert(x);
    }
    string name;
    cin>>name;
    if(S.find(name)==S.end()) cout<<'No'<<endl;
    else cout<<'Yes'<<endl;
}
```
```html
<html><body>
</html></body>
```
[点此进入首页](http://code.spacei.top/)
> test
";
$result = Parsedown::instance()->parse($text);
echo("<div class='markdown'>");
echo("<div class='all'>");
echo str_replace(['<code c', '">', '">'],['<code id=code c', '"><button class="copy" id=copy>copy</button>', '/">'],$result);
echo("</div>");
echo("
<script>
    var copy = document.getElementById('copy');
    var code = document.getElementById('code');
    copy.onclick = function() {
        code.value.select();
        document.execCommand('Copy');
        alert('已复制好，可贴粘。');
    }
</script>");
echo("</div>");
?>
</div>

</html></body>