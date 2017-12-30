<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>JamesHen's Backstage</title>
    <link rel="stylesheet" href="../css/backstage.css" />
    <link rel="stylesheet" type="text/css" href="../editor.md-master/css/editormd.min.css" />
    <link href="../css/maps.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/maps.js"></script>
    <script type="text/javascript" src="../js/google.js"></script>
    <script type="text/javascript">$(document).ready(function () { $().maps(); });</script>

</head>

<body>

    <div class="content">
        <ul class="venus-menu">
            <li class="active">
                <a href="#">
                    <i class="icon-home"></i>主页
                </a>
            </li>
            <li>
                <a href="#">文档管理</a>
            </li>
            <li>
                <a href="#">评论管理</a>
            </li>
			<li>
                <a href="../../phpMyAdmin/index.php">MySQL</a>
            </li>
        </ul>
    </div>

	<div class="headingarea">
		<h1>母鸡的博客之后台</h1>
	</div>

    <div class="mainframe">
        <table class="articleform">
            <?php
                $mysqli = new mysqli("localhost", "Visitor", "", "myblogarticles");
                if ($mysql->connect_errno)
                die("数据联络掉了".$mysqli->connect_error);
                $mysqli->query("SET NAMES utf8");
                $result = $mysqli->query("SELECT blnum, title, createtime, category, descriptions FROM articles");
                echo"<thead><tr>";
                while ($field = $result->fetch_field())
                {
                    echo"<td>".$field->name."</td>";
                }
				echo"<td>选择</td>";
                echo"</tr></thead>";
				echo"<tbody>";
                while ($row = $result->fetch_row())
                {
                    for ($i = 0; $i < $result->field_count; $i++)
                    {
                        echo"<td>".$row[$i]."</td>";
                    }
					echo"<td><input type='checkbox' name='articlechoose[]' value=\"".$row['blnum']."\" /></td>";
                    echo"</tr>";
                }
				echo"</tbody>";
				mysqli_close($mysqli);
            ?>
        </table>
		<div class="choosebar">
			<input type="button" value="修改"/>
			<input type="button" value="添加"/>
			<input type="button" value="删除"/>
		</div>
    </div>
</body>
</html>
