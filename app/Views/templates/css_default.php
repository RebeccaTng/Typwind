<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <!--CSS FILES-->
<!--    <link rel="stylesheet" href="--><?php //=base_url()?><!--/public/CSS/components/main.css">-->
<!--    <link rel="stylesheet" href="--><?php //=base_url()?><!--/public/CSS/components/menubar.css">-->
<!--    <link rel="stylesheet" href="--><?php //=base_url()?><!--/public/CSS/components/generalComponents.css">-->
<!--    <link rel="stylesheet" href="--><?php //=base_url()?><!--/public/CSS/login_child.css">-->
<!--    <link rel="stylesheet" href="--><?php //=base_url()?><!--/public/CSS/child_components_varia.css">-->


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
            <?= $this->include('templates/side_nav_bar') ?>
        </div>
        <div class="mainContent ">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</body>
</html>