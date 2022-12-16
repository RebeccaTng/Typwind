<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <div class="user">
        <img src="/public/assets/icons/user.svg" alt="User Icon" class="roundProfilePic">
        <h1>Welcome Back,</h1>
        <p>
            <?php
            $session = session();
            echo $session->firstname; echo " "; echo $session->lastname . "<br>"
            ?>

        </p>
    </div>

<?= $this->endSection() ?>
