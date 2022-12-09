<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/welcome.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/generalComponents.css">
    <title>Welcome page</title>
</head>
<body>

<div class = "card_welcome_page">

    <img src="/public/assets/general/Typwind_logo_editable.svg" alt="Typwind logo" style="width:221px;height:77px;">
    <h1 style="color:var(--blueNeutral);">Welcomes you!</h1>
    <h3 style="color:var(--primary-darkest);">Are you a student or a teacher?</h3>

    <div class="teacher_student_buttons">
        <button class="button buttonExpert buttonPrimary" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" title="Look at profile" class="btn btn-dark">TEACHER</button>
        <button class="button buttonExpert buttonPrimary" onclick="window.location= '<?=base_url()?>/registration/studentLogin'" class="btn btn-dark">STUDENT</button>
    </div>

</div>

</body>
</html>