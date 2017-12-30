<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>JamesHen's Blog</title>
    <link rel="stylesheet" type="text/css" href="./Sources/css/stylelist.css" />
    <link href="./Sources/css/zzsc.css" rel="stylesheet" />
    <link href="./Sources/css/maps.css" rel="stylesheet" />
    <script type="text/javascript" src="./Sources/js/maps.js"></script>
    <script type="text/javascript" src="./Sources/js/google.js"></script>

    <script type="text/javascript">$(document).ready(function () { $().maps(); });</script>

</head>

<body>

    <div class="content">
        <ul class="venus-menu">
            <li class="active"><a href="#">
                <i class="icon-home"></i>主页</a>
            </li>
            <li><a href="Sources/about.html"><i class="icon-magic"></i>关于</a>
            </li>
            <li><a href="#"><i class="icon-thumbs-up"></i>条目</a>
                <ul>
                    <li><a href="#">鬼畜家</a></li>
                            
                    <li><a href="#">心得式</a></li>
                            
                    <li><a href="#">OI/算法</a>
                        <ul>
                            <li><a href="#">基础算法</a></li>
                            <li><a href="#">数据结构</a></li>
                        </ul>
                    </li>
                    <li><a href="#">和信息没有关系</a></li>
                </ul>
            </li>
            <li><a href="Sources/timeline.html"><i class="icon-quote-right"></i>时间轴</a>
            </li>
            <li><a href="#"><i class="icon-envelope-alt"></i>联系我</a>
            </li>
        </ul>
    </div>

    <div id="blankarea">
        <canvas id="selfie" width="170" height="170">
            你该换个浏览器了
        </canvas>
        <script type="text/javascript">
            var mycanvas = document.getElementById("selfie");
            var context = mycanvas.getContext("2d");
            function Draw() {
                var himg = new Image();
                himg.src = "./Pictures/selfie.jpg";
                ArcClip(context);
                himg.onload = function () {
                    context.drawImage(himg, 0, 0, 170, 170);
                }
            }
            function ArcClip(context) {
                context.beginPath();
                context.arc(85, 85, 85, 0, Math.PI * 2, true);
                context.clip();
            }
            window.addEventListener("load", Draw, true);
        </script>
    </div>

    <div id="mainbox">
        <br />
        <br />
        <br />
        <br />
        <br />
        <h1 class="ttl">--母鸡的Blog--</h1>

        <div class="columncontainer">
			<?php
                $mysqli = new mysqli("localhost", "Visitor", "", "myblogarticles");
                if ($mysql->connect_errno)
                die("数据联络掉了".$mysqli->connect_error);
                $mysqli->query("SET NAMES utf8");
                $result = $mysqli->query("SELECT title, descriptions, blnum FROM articles order by blnum desc");
                while ($row = $result->fetch_array())
                {	
					echo"<a href='Sources/articles/article.php?arcid=".$row['blnum']."' class='articlebox'>";
					echo"<h2 class='smallttl'>".$row['title']."</h2>"."<h3 class='description'>".$row['descriptions']."</h3>";
					echo"</a>";
                }
				mysqli_close($mysqli);
            ?>
        </div>
    </div>

    <div id="endarea">
        张骏扬的个人博客<br />
        James-Hen@Outlook.com<br />
        Copyright: JamesHen 2017. 转载请注明出处
    </div>
</body>
</html>
