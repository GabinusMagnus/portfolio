<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
if (isset($_POST["url"])) {
    $valeur_recuperee = $_POST["url"];

    var_dump(htmlentities($valeur_recuperee));

}

?>
</body>
</html>