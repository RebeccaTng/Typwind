<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php foreach ($exercises as $ex):?>
    <?php  if ($ex->idExercises==$idExercises):?>
        <h1><?= $ex->name?></h1>
    <?php endif;?>
<?php endforeach;?>

<section>

    <h3>How do you want to play the game?</h3>
    <label for="keyboard">Show keyboard with colors: </label>
    <input type="checkbox" id="keyboard" name="keyboard">
</section>


<section>

    <h3>Press start and earn some stars.<br> Good luck!</h3>
    <a href="">
        <button>Start</button>
    </a><br><br>
    <a href="">
        <button>GO BACK TO EXERCISES</button>
    </a>
</section>

<?= $this->endSection() ?>

