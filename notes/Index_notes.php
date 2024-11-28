<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="../backend/style.css">
</head>        
<body>
<h1>Notes BTS SIO</h1>

Toutes les notes, toute la documentation accumulée au cours des deux ans de BTS.

<div class="paper with-shadows">
**Première année :**
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
            }
        };
        ?>
        </ul>
    </summary>
</detail>
</div>
</body>
</html>