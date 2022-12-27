<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/welcome.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>

    <!-- Translation file -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>


    <?php setcookie("currentPage","welcome", time()+36000, "/");?>

    <title class="one">Welcome page</title>
</head>
<body>

<div class = "grid-container_welcome">
    <div class = "card_welcome_page">

        <img src="/public/assets/general/typwind_logo.svg" alt="Typwind logo" style="width:221px;height:77px;">
        <h1 class="two" style="color:var(--blueNeutral); margin-bottom: 15px;">Welcomes you!</h1>
        <h3 class="three" style="color:var(--primary-darkest);">Are you a student or a teacher?</h3>

        <div class="teacher_student_buttons">
            <button class="button buttonExpert buttonPrimary four" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" title="Look at profile" >TEACHER</button>
            <button class="button buttonExpert buttonPrimary five" onclick="window.location= '<?=base_url()?>/registration/studentLogin'" >STUDENT</button>
        </div>

        <div class="langWrap menuSubHeader" >
            <a id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
            |
            <a id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
        </div>

    </div>
</div>

</body>
</html>