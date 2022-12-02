<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<h3 class="text-center">
    <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
</h3>
<section>
    <h2 class="text-center">Welcome Back,</h2> <br>
    <h3 class="text-center">
        <?php
        $session = session();
        echo $session->firstname; echo " "; echo $session->lastname . "<br>"
        ?>

    </h3>

</section>

<?= $this->endSection() ?>
