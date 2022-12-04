<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login with Email/Password</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-5">

            
            <?php $session=session();
            $session->set('isLoggedIn',False);
            ?>

            <h2>Login in</h2>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>
            <form action="<?php echo base_url(); ?>/RegistrationController/loginAuth" method="post">
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="Email" value="<?php if (isset($_COOKIE["emailCookie"])) echo $_COOKIE["emailCookie"]; ?>" class="form-control" >
                </div>
<!--                <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" >
                </div>-->

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Signin</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>