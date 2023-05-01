<!DOCTYPE html>
<html>
<head>
	<title>Execute JS with PHP</title>
	<script type="text/javascript">
		function changeColor() {
			document.body.style.backgroundColor = "red";
		}
	</script>
</head>
<body>
	<h1>Hello World!</h1>
	<form method="POST" action="executejs.php">
		<button type="submit" name="execute-js" onclick="changeColor()">Execute JS</button>
	</form>
</body>
</html>
