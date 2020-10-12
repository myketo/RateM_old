<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href='http://localhost/RateM/'>
    <link rel='stylesheet' href='styles/style.css'>

    <link rel='stylesheet' href='styles/tablesorter/theme.default.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='scripts/tablesorter/jquery.tablesorter.js'></script>
    
    <title><?=$title?></title>
</head>
<body>
    <div class='list index'>
        <?php require_once $subpage; ?>
    </div>
</body>
</html>