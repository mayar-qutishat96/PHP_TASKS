<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo '<table cellpadding="3px" cellspacing="0px">';

for ($i = 1; $i <= 5; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 6; $j++) {
        $result = $j * $i;
        echo '<td>' . $j . '*' . $i . '=' . $result . '</td>';
    }
    echo '</tr>';
}

echo '</table>';
?>   
</body>
</html>