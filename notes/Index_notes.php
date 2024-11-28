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
        <?php
        $dossiers_1 = print_r(scandir('./'))
        foreach ($dossiers_1 as $note1) {
            echo "<a href='" + $note1 + "'>" + $note1
        }

        ?>
    </summary>
</detail>
</div>
</body>
</html>