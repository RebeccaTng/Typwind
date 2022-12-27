<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/main.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/components/generalComponents.css">
    <link rel="stylesheet" href="<?=base_url()?>/public/CSS/expert/expertLoginReg.css">
    <!-- Google Login Authentication Js -->
    <script type="module" src="<?=base_url()?>/public/js/googleLoginAuth.js" defer></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer></script>
    <!-- Translation file -->
    <script type="text/javascript" src="<?=base_url()?>/public/js/languageData.js" defer></script>

    <?php setcookie("currentPage","expertLogin", time()+36000, "/");?>

    <title >Login with email</title>
</head>

<body>
    <div class="card">
        <div class="langWrap menuSubHeader" >
            <a id="<?php echo $_COOKIE["nederlandsActief"];?>" href="#" language='nederlands' class="active">NED</a>
            |
            <a id="<?php echo $_COOKIE["englishActive"];?>" href="#" language='english' >ENG</a>
        </div>
        <?php $session=session();
        $session->set('isLoggedIn',False);
        ?>
        <h1>Login</h1>
        <p class="one">Please log in with your email</p>
        <?php if(session()->getFlashdata('msg')):?>
            <div>
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>

        <form action="<?php echo base_url(); ?>/RegistrationController/loginExpert" method="post">
            <input id="googleJSEmail" type="email" name="email" placeholder="Email" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"]; ?>" >
            <input id="googleJSPass" type="password" name="password" placeholder="Password" value="">
            <button id="googleJSClick" type="submit" class="button buttonPrimary buttonExpert">LOGIN</button>
        </form>
        <button id="REGISTER" onclick="window.location= '<?=base_url()?>/registration/register'" class="button buttonSecondary buttonExpert two">REGISTER</button>
        <p><i class="three">- or -</i></p>
        <p class="four">Log in With Google</p>
        <button type ="button" class="button buttonPrimary buttonExpert" id="login">Log in with Google+</button>

    </div>

    <img src="/public/assets/general/typwind_logo_white.svg" alt="Typwind Logo" class="logo">
</body>
</html>