<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>tlcontent</title>

    <script type="text/javascript" src="js/maps.js"></script>
    <script type="text/javascript" src="js/google.js"></script>
    <style type="text/css">
        * {
            padding: 0px;
            margin: 0px;
        }
    </style>

    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen">
    <link rel="stylesheet" href="inc/colorbox.css" type="text/css" media="screen">

    <script type="text/javascript">
        $(document).ready(
            function () {
                $.timeliner({
                    startOpen: ['#19550828EX', '#19630828EX']
                });
                $.timeliner({
                    timelineContainer: '#timelineContainer_2'
                });
                // Colorbox Modal
                $(".CBmodal").colorbox({ inline: true, initialWidth: 100, maxWidth: 682, initialHeight: 100, transition: "elastic", speed: 750 });
            }
        );
    </script>

</head>
<body>
    <div class="container">
        <hr id="firsthr" noshade="true" color="#8ECB8D" size="5" />
        <div id="headcont">
            <h1>线性时间轴</h1>
            <p class="lead">在这里可以按时间浏览博文<br />说不定有什么意外的发现哦！</p>
        </div>
            
        <hr id="firsthr" noshade="true" color="#8ECB8D" size="5" />
            

        <div id="timelineContainer" class="timelineContainer">

            <div class="timelineToggle"><p><a class="expandAll">+ 全部展开</a></p></div>

            <br class="clear">

            <?php
			function time_to_num ($sqltime)
			{
				return implode("", explode("-", implode("", explode(" ", $sqltime, 1))));
			}
                $mysqli = new mysqli("localhost", "Visitor", "", "myblogarticles");
                if ($mysql->connect_errno)
                die("数据联络掉了".$mysqli->connect_error);
                $mysqli->query("SET NAMES utf8");
                $result = $mysqli->query("SELECT title, descriptions, createtime FROM articles order by createtime desc");
				$foreyear = time_to_num("2020");
				$have_begin = false;
                while ($row = $result->fetch_array())
                {
					$thistime = time_to_num($row['createtime']);
					if (substr($thistime, 0, 4) < $foreyear)
					{
						$foreyear = substr($thistime, 0, 4);
						if ($have_begin) echo"</div>";
						$have_begin = true;
						echo"<div class='timelineMajor'><h2 class='timelineMajorMarker'><span>".substr($thistime, 0, 4)."</span></h2>";
					}
					echo"<dl class='timelineMinor'>"
						."<dt id='$thistime'><a>".$row['title']."</a></dt>"
						."<dd class='timelineEvent' id='$thistimeEX' style='display:none;'>"
						."<h3>".$row['createtime']."</h3>"
						."<p>".$row['descriptions']."</p>"
						."</dd>"
						."</a>";
                }
				if ($have_begin) echo"</div>";
				mysqli_close($mysqli);
            ?>

            <br class="clear">
        </div><!-- /#timelineContainer -->

    </div><!-- /.container -->
    <!-- GLOBAL CORE SCRIPTS -->

    <script type="text/javascript" src="inc/colorbox.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/timeliner.min.js"></script>

</body>
</html>
