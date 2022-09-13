<html lang="en">
<head>
    <title>Drawer page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php

if (isset($_GET['number'])) {
    if (!is_numeric($_GET['number'])) {
        echo 'Неправильный формат ввода';
        exit(0);
    }
    $number = (int)$_GET['number'];

    // инициализируем данные
    $form = $number & 3;
    $color = $number >> 4 & 3;
    $length = $number >> 6 & 3;
    $width = $number >> 2 & 3;

    echo '<table>
    <tr><th>Form</th><th>Color</th><th>Length</th><th>Width</th></tr>';
    echo '<tr><th>' . $form . '</th><th>' . $color . '</th><th>' . $length . '</th><th>' . $width . '</th></tr></table>';

    $length = 150 + $length * 120;
    $width = 150 + $width * 120;


    $brush;
    switch ($color) {
        case 0:
            $brush = "black";
            break;
        case 1:
            $brush = "pink";
            break;
        case 2:
            $brush = "green";
            break;
        case 3:
            $brush = "yellow";
            break;
        default:
            $brush = "orange";
            break;
    }

    $svg_code = '<svg width = "' . $length . '" height= "' . $width . '">';
    switch ($form) {
        case 0:
            $svg_code .= '<rect x="0" y="0" width="' . $length . '" height="' . $width . '" fill="' . $brush . '" />';
            break;

        case 1:
            $svg_code .= '<ellipse cx="' . $length / 2 . '" cy ="' . $width / 2 . '" rx="' . $length / 2 . '" ry="' . $width / 2 . '" fill = "' . $brush . '" />';
            break;
        case 2:
            if ($length > $width) {
                $length = $width;
            } else {
                $width = $length;
            }
            $svg_code .= '<circle cx="' . $length / 2 . '" cy ="' . $width / 2 . '" r="' . $length / 2 . '" fill = "' . $brush . '" />';
            break;
        case 3:
            if ($length > $width) {
                $length = $width;
            } else {
                $width = $length;
            }
            $svg_code .= '<rect x="0" y="0" width="' . $length . '" height="' . $width . '" fill="' . $brush . '" />';
            break;
    }

    $svg_code .= '</svg>';
    echo $svg_code;
} else {
    echo "Вы не ввели параметр number";
}
?>

</body>
</html>