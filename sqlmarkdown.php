<?php
function MarkdownToHtml($text){
    $str = <<<EOS
    \
    EOS;
    //str_replace("#", "&#35;", $text);
    return str_replace(['"', "'", "`", $str], ["&#34;", "&#39;", "&#96;", "&#92;"], $text);
}
function HtmlToMarkdown($text){
    $str = <<<EOS
    \
    EOS;
    //str_replace("&#35;", "#", $text);
    return str_replace(["&#34;", "&#39;", "&#96;", "&#92;"], ['"', "'", "`", $str], $text);
}
?>