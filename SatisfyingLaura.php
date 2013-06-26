<html>
<head></head>
<body>
	<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . "/Widgets/User.php");
	echo User::getResults();
	?>

</body>
</html>
