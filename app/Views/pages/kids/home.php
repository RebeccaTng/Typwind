<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","studentHome", time()+36000, "/");?>

<div class="home_content">
    <div>
        <h1 style="color:var(--blueNeutral);" class="two"> Welcome Back </h1>
        <h1 style="color:var(--blueNeutral); ">
            <?php
            $session = session();
            echo $session->firstname; echo "!";
            ?>
        </h1>
    </div>
    <div>
        <h3 style="color:var(--blueNeutral);" class="three"> Your next exercise is waiting for you!</h3>
    </div>

    <div class="start_ex_button">
        <button class="button buttonSecondary buttonChild five" style="color:var(--blueNeutral); text-transform: none;"> The Adventure of the Dog.</button>
        <button class="button buttonPrimary buttonChild four">Start new exercise</button>
    </div>

</div>




<?= $this->endSection() ?>