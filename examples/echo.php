<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>FormBuilder Tests - ECHO script</title>
<style>
.incomplete {
	color: grey;
}
.complete {
	
}
</style> 
</head>
<body>
<?php 
if (!empty($_GET)) {
    echo '<h1>GET</h1>';
    $get = var_export($_GET, true);
    echo '<pre>'. $get .'</pre>';
}
if (!empty($_POST)) {
    echo '<h1>POST</h1>';
    $post = var_export($_POST, true);
    echo '<pre>'. $post .'</pre>';
}
?>
</body>
</html>