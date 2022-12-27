<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/kids/login_child.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>
    <!-- Translation file -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <?php setcookie("currentPage","studentLogin", time()+36000, "/");?>

    <title>Welcome page</title>
</head>
<body>

<div class = "grid-container_login_child">
    <div class="card_login_child">
        <div class="langWrap menuSubHeader" >
            <a id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
            |
            <a id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
        </div>
        <?php $session=session();
        $session->set('isLoggedIn',False);
        ?>
        <div>
            <h1 style="color: var(--blueNeutral)">Login</h1>
            <h2 class ="one" style="color: var(--blueNeutral)">and have fun typing!</h2>
        </div>
        <p class ="two" style="color: var(--blueNeutral); font: var(--bodyExText); margin: 30px;">Let's get logged in with your email</p>
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>

        <form action="<?php echo base_url(); ?>/RegistrationController/loginStudent" method="post">

            <input type="email" name="email" placeholder="Email" value="<?php if (session()->isStudent) echo session()->email ?>">

            <div class="continue_w_email_button">
                <button type="submit" class="button buttonPrimary buttonChild three" style="font: var(--buttonLabel);">continue with my email</button>
            </div>
        </form>

    </div>

</div>

</body>
</html>

