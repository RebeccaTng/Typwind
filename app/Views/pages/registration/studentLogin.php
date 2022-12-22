<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/kids/login_child.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">

</head>
<body>
<div class="card_welcome_page">
            <?php $session=session();
            $session->set('isLoggedIn',False);
            ?>
    <div>
            <h1 style="color: var(--blueNeutral)">Login</h1>
            <h2 style="color: var(--blueNeutral)">and have fun typing!</h2>
    </div>
            <p style="color: var(--blueNeutral); font: var(--bodyExText);">Let's get loggin in with your email</p>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <form action="<?php echo base_url(); ?>/RegistrationController/loginStudent" method="post">

                <input type="email" name="email" placeholder="Email" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"]; ?>">

                <button type="submit" class="button buttonPrimary buttonChild changeWidth" style="font: var(--buttonLabel);">continue with my email</button>
            </form>
</div>
</body>
</html>

