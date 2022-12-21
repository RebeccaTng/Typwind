<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<section>
    <h1>Select exercise:</h1>


    <form action="<?php echo base_url('kids/intro');?>" method="get">
        <label for="idExercises">id exercise:</label><br>
        <input type="text" id="idExercises" name="idExercises"><br>
        <input type="submit" value="Submit">
    </form>
</section>

<section>
    <h1>Go to feedback page:</h1>

    <form action="<?php echo base_url('kids/feedback');?>" method="get">
        <label for="idExercises">id exercise:</label><br>
        <input type="text" id="idExercises" name="idExercises"><br>
        <input type="submit" value="Submit">
    </form>
<h3 class="text-center">
    <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
</h3>

<section>
    <h2>Welcome Back</h2>
    <h3>
        <?php
        $session = session();
        echo $session->firstname; echo "!";
        ?>

        <br>
        <br>
        Your next exercise is waiting for you!
        <br>
        <br>
        The Adventure of the Dog.
        <br>
        <br>
        <button type="button">Start new exercise</button>

    </h3>

</section>

<?= $this->endSection() ?>