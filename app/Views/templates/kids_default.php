<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <!-- Translation file -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>
    <?php
    if (! empty($cssFiles) && is_array($cssFiles)):
        foreach ($cssFiles as $ccsFilePath):
            $path = base_url('public/CSS/'.$ccsFilePath);
            echo PHP_EOL.'<link rel="stylesheet" href='.$path.'>' ;
        endforeach;
    endif;
    ?>

    <title>Typewind Online</title>
</head>
<body >
<div class="grid-container">
    <div class="leftNavBar">
        <?= $this->include('templates/side_nav_bar_2') ?>
    </div>
    <div class="mainContent ">
        <?= $this->renderSection('content') ?>
    </div>
</div>
</body>
</html>