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

</section>

<?= $this->endSection() ?>

