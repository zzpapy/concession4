<?php
    $vehicules = $render["data"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php

            // var_dump($render);

            foreach($render["content"] as $v){

                echo "<p>", $v, "</p>";
            }

        ?>

    </div>
</body>
</html>