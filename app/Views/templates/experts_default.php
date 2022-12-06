<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/navbar.css">
    <!-- Dropdown menu for Expert exercises CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/dropDownExpertExercises.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <!-- sidebar Toggle Js -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/sidebarToggle.js" defer></script>
    <!-- Language switch Js -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>
    <!-- Scrolling in exercise page Js -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/ScrollExercises.js" defer></script>



    <!--CSS FILES-->
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/generalComponents.css">
</head>
<body>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <?= $this->include('templates/side_nav_bar') ?>
    <!-- Page Content Holder -->
    <div id="content">
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <main>
            <?= $this->renderSection('content') ?>
        </main>
    </div>
</div>


</body>
</html>