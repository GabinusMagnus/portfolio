<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="../backend/style.css">
</head>        
<body>
<h1>Notes BTS SIO</h1>

Toutes les notes, toute la documentation accumulée au cours des deux ans de BTS.

<div class="paper with-shadows">
<h3>Première année :</h3>
<details>
    <summary>
        Notes de première année :
        <ul>
        <?php
        $repertoire1 = scandir('./Première année');
        array_diff($repertoire1, array('..', '.'));
        foreach ($repertoire1 as $nom) {
            if ($nom != '.' and $nom != '..') {
            echo "<li><a href='" . "Première année/" . $nom . "'>" . $nom . "</a></li>";
            };
        };
        ?>
        </ul>
    </summary>
</details>
<h3>Deuxième année :</h3>
<details>
    <summary>
        Notes de deuxième année :
        <ul>
        <?php
        $repertoire1 = scandir('./Deuxième année');
        array_diff($repertoire1, array('..', '.'));
        foreach ($repertoire1 as $nom) {
            if ($nom != '.' and $nom != '..') {
            echo "<li><a href='" . "Deuxième année/" . $nom . "'>" . $nom . "</a></li>";
            };
        };
        ?>
        </ul>
    </summary>
</details>
</div>
</body>
</html>