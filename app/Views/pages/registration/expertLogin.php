<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login with Email</title>
</head>
<body>
<div>
    <div>
        <div>

            
            <?php $session=session();
            $session->set('isLoggedIn',False);
            ?>
            <br>
            <br>

            <h2>Login</h2>
            <br>
            <h5>Please Log in with your email</h5>
            <?php if(session()->getFlashdata('msg')):?>
                <div>
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <form action="<?php echo base_url(); ?>/RegistrationController/loginExpert" method="post">
                <div>
                    <input type="email" name="email" placeholder="Email" value="<?php if (!session()->isStudent) echo session()->email ?>" >
                </div>
<!--                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" >
                </div>-->

                <div>
                    <button type="submit">LOGIN</button>
                </div>
            </form>

            <br>
            <div>
                <button id="REGISTER" onclick="window.location= '<?=base_url()?>/registration/register'">REGISTER</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>