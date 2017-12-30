<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>JamesHen's Blog</title>
    <link rel="stylesheet" type="text/css" href="../css/stylelist.css" />
    <link href="../css/zzsc.css" rel="stylesheet" />
    <link href="../css/maps.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/maps.js"></script>
    <script type="text/javascript" src="../js/google.js"></script>
    <script type="text/javascript">$(document).ready(function () { $().maps(); });</script>

	<!--<link rel="stylesheet" href="../editor.md-master/examples/css/style.css" />-->
	<link rel="stylesheet" type="text/css" href="../editor.md-master/css/editormd.min.css" />
    <!--<link rel="stylesheet" href="../editor.md-master/css/editormd.preview.css" />-->
    <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />

</head>

<body>
    <div class="content">
        <ul class="venus-menu">
            <li class="active">
                <a href="../../index.php">
                    <i class="icon-home"></i>主页
                </a>
            </li>
            <li>
                <a href="../about.html"><i class="icon-magic"></i>关于</a>
            </li>
            <li>
                <a href="#"><i class="icon-thumbs-up"></i>条目</a>
                <ul>
                    <li><a href="#">鬼畜家</a></li>

                    <li><a href="#">心得式</a></li>

                    <li>
                        <a href="#">OI/算法</a>
                        <ul>
                            <li><a href="#">基础算法</a></li>
                            <li><a href="#">数据结构</a></li>
                        </ul>
                    </li>
                    <li><a href="#">和信息没有关系</a></li>
                </ul>
            </li>
            <li>
                <a href="../timeline.html"><i class="icon-quote-right"></i>时间轴</a>
            </li>
            <li>
                <a href="#"><i class="icon-envelope-alt"></i>联系我</a>
            </li>
        </ul>
    </div>

    <div id="blankarea">
	
    </div>

	<div id="layout">
            <div id="test-editormd-view">
                <textarea id="append-test" style="display:none;">
					<?php
						echo"\n";
						$mysqli = new mysqli("localhost", "Visitor", "", "myblogarticles");
						if ($mysql->connect_errno)
						die("数据联络掉了".$mysqli->connect_error);
						$mysqli->query("SET NAMES utf8");
						$result = $mysqli->query("SELECT contents FROM articles WHERE blnum = ".$_GET['arcid']);
						while ($row = $result->fetch_array())
						{
							echo($row['contents']);
						}
						mysqli_close($mysqli);
					?>
				</textarea>          
            </div>
        </div>
        <!-- <script src="js/zepto.min.js"></script>
		<script>		
			var jQuery = Zepto;  // 为了避免修改flowChart.js和sequence-diagram.js的源码，所以使用Zepto.js时想支持flowChart/sequenceDiagram就得加上这一句
		</script> -->
        <script src="../editor.md-master/examples/js/jquery.min.js"></script>
        <script src="../editor.md-master/lib/marked.min.js"></script>
        <script src="../editor.md-master/lib/prettify.min.js"></script>
        
        <script src="../editor.md-master/lib/raphael.min.js"></script>
        <script src="../editor.md-master/lib/underscore.min.js"></script>
        <script src="../editor.md-master/lib/sequence-diagram.min.js"></script>
        <script src="../editor.md-master/lib/flowchart.min.js"></script>
        <script src="../editor.md-master/lib/jquery.flowchart.min.js"></script>

        <script src="../editor.md-master/editormd.js"></script>
        <script type="text/javascript">
            $(function() {
                var testEditormdView;
                
                $.get("test.md", function(markdown) {
                    
				    testEditormdView = editormd.markdownToHTML("test-editormd-view", {
                        markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
                        htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                        htmlDecode      : "style,script",  // you can filter tags decode
                        //toc             : false,
                        tocm            : true,    // Using [TOCM]
                        //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                        //gfm             : false,
                        //tocDropdown     : true,
                        // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                        emoji           : true,
                        taskList        : true,
                        tex             : true,  // 默认不解析
                        flowChart       : true,  // 默认不解析
                        sequenceDiagram : true,  // 默认不解析
                    });
                    
                    //console.log("返回一个 jQuery 实例 =>", testEditormdView);
                    
                    // 获取Markdown源码
                    //console.log(testEditormdView.getMarkdown());
                    
                    //alert(testEditormdView.getMarkdown());
                });
                    
                testEditormdView = editormd.markdownToHTML("test-editormd-view", {
					htmlDecode		:true,
                    htmlDecode      : "style,script",  // you can filter tags decode
                    emoji           : true,
                    taskList        : true,
                    tex             : true,  // 默认不解析
                    flowChart       : true,  // 默认不解析
                    sequenceDiagram : true,  // 默认不解析
                });
            });
        </script>

    <div id="endarea">
        张骏扬的个人博客<br />
        James-Hen@Outlook.com<br />
        Copyright: JamesHen 2017. 转载请注明出处
    </div>
</body>
</html>
