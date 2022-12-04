<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php
echo session()->firstname; echo " "; echo session()->lastname . "<br>"
?>
    <h1> <?= session()->firstname?> </h1>
        <section>
        <h3>First name= <?= session()->firstname?></h3>
        <h3>Last name= <?= session()->lastname?></h3>
        <h3>Email= <?= session()->email?></h3>
        <?php if (session()->isActive==1):?>

            <h3>Active= currently active</h3>

        <?php endif;?>
        <?php if (session()->isActive==0):?>

            <h3>Active= not active</h3>

        <?php endif;?>
        </section>

        <section>
            <a href="<?php echo base_url('experts/editProfilePage/'.session()->id);?>">
                <button class="btn btn-primary btn-lg">EDIT</button>
            </a>
        </section>

<?= $this->endSection() ?>