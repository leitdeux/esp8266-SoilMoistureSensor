<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- http://getbootstrap.com/ -->
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Fredoka+One|Lato:300|Lato:400' rel='stylesheet' type='text/css'>
    
        <link href="css/styles.css" rel="stylesheet"/>
        
        <?php if (isset($title)): ?>
            <title>Soil Status: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Soil Staus</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="middle">