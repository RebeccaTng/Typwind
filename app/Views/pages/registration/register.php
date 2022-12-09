<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/expert/expertLoginReg.css">

    <title> Expert Registration</title>
</head>
<body>
    <div class="card">
        <h1 >Register</h1>
        <p>Register here if you don't have an account yet</p>
        <?php if(isset($validation)):?>
            <div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>
        <form action="<?php echo base_url(); ?>/RegistrationController/store" method="post">
            <input type="text" name="firstname" placeholder="Firstname" value="<?= set_value('name') ?>" >
            <input type="text" name="lastname" placeholder="Surname" value="<?= set_value('name') ?>" >
            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" >

            <button type="submit" class="button buttonPrimary buttonExpert">REGISTER</button>
        </form>
        <button type="button" id="backToLogin" class="button buttonSecondary buttonExpert" onclick="window.location= '<?=base_url()?>/registration/expertLogin'">BACK TO LOGIN</button>
    </div>
    <img src="/public/assets/general/typwind_logo_white.svg" alt="Typwind Logo" class="logo">
</body>
</html>