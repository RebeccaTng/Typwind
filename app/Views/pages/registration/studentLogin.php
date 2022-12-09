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
            <h4>and have fun typing!</h4>
            <br>
            <h6>Let's get logged in with your email</h6>
            <?php if(session()->getFlashdata('msg')):?>
                <div>
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>

            <form action="<?php echo base_url(); ?>/RegistrationController/loginStudent" method="post">
                <div>
                    <input type="email" name="email" placeholder="Email" value="<?php if (session()->isStudent) echo session()->email ?>" >
                </div>
                <!--                <div>
                                    <input type="password" name="password" placeholder="Password" class="form-control" >
                                </div>-->
                <div>
                    <button type="submit">CONTINUE WITH MY EMAIL</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>