<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Expert Registration</title>
</head>
<body>
<div>
    <div>
        <div>
            <h2 >Register</h2>
            <?php if(isset($validation)):?>
                <div>
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/RegistrationController/store" method="post">
                <div>
                    <input type="text" name="firstname" placeholder="Firstname" value="<?= set_value('name') ?>" >
                </div>
                <div>
                    <input type="text" name="lastname" placeholder="Surname" value="<?= set_value('name') ?>" >
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" >
<!--                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" >
                </div>
                <div>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" >
                </div>-->
                    <br>

                    <div>
                    <button type="submit">REGISTER</button>
                </div>
            </form>
            <br>
            <div>
                <button type="button" id="backToLogin" onclick="window.location= '<?=base_url()?>/registration/expertLogin'">BACK TO LOGIN</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>