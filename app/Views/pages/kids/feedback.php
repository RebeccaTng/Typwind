<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php foreach ($exercises as $ex):?>
    <?php  if ($ex->idExercises==$idExercises):?>
        <h1><?= $ex->name?></h1>
    <?php endif;?>
<?php endforeach;?>


<section>
    <h3>Congrats, you completed an exercise!<br>Try again to earn more stars :)</h3>
</section>

<section>

    <a href="">
        <button>REPLAY EXERCISE</button>
    </a><br><br>
    <a href="">
        <button>START NEW EXERCISE</button>
    </a><br><br>
    <a href="">
        <button>BACK TO EXERCISES</button>
    </a>
</section>
<?= $this->endSection() ?>
