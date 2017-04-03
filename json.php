<!DOCTYPE html>
<html>
<head>
	<meta content="en-gb" http-equiv="Content-Language">
	<meta charset = "utf-8">
	<title>PHP Test</title>
</head>
<body>

<?php

    $json = file_get_contents('http://webdev.student.uws.ac.uk/movie-trivia.php');
    $trivia = (json_decode($json, true));

?>

<script type="text/javascript">
	
<?php 
	echo $trivia["movie-trivia"];
?>

</script>


</body>