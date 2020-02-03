<!DOCTYPE html">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">На главную</a> |
		<a href="index.php?c=page&act=edit">Редактировать</a> |
		<a href="<?=$act1?>"><?=$act1_caption?></a> |
		<a href="<?=$act2?>"><?=$act2_caption?></a>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Название.
	</div>
</body>
</html>
