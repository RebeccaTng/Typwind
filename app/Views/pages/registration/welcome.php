<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/welcome.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <title>Welcome page</title>
</head>
<body>

<div class = "grid-container_welcome">
    <div class = "card_welcome_page">

        <img src="/public/assets/general/typwind_logo.svg" alt="Typwind logo" style="width:221px;height:77px;">
        <h1 style="color:var(--blueNeutral); margin-bottom: 15px;">Welcomes you!</h1>
        <h3 style="color:var(--primary-darkest);">Are you a student or a teacher?</h3>

        <div class="teacher_student_buttons">
            <button class="button buttonExpert buttonPrimary" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" title="Look at profile" >TEACHER</button>
            <button class="button buttonExpert buttonPrimary" onclick="window.location= '<?=base_url()?>/registration/studentLogin'" >STUDENT</button>
        </div>

    </div>
</div>

</body>
</html>