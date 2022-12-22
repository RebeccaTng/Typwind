<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>

    <!-- Translation file -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <!--CSS FILES-->
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/dropDownExpertExercises.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/menubar.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">

    <!--PHP -->
    <?=include(base_url().'/public/PHP/jQueryStoreUserInDB.php')?>
    <title>Typewind Online</title>
</head>
<body >
<div class="grid-container">
    <div class="leftNavBar">
        <?= $this->include('templates/side_nav_bar') ?>
    </div>
    <div class="mainContent ">
        <?= $this->renderSection('content') ?>
    </div>
</div>
</body>
</html>