<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","intro", time()+36000, "/");?>

<div class = "grid-container_intro">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>" class="one">Exercises</a></li>
            <li class="two">Introduction</li>
        </ul>
    </div>

    <div class="title">
        <?php foreach ($exercises as $ex):?>
            <?php  if ($ex->idExercises==$idExercises):?>
                <h1 style="color: var(--blueNeutral);"><?= $ex->name?></h1>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <div class="grid_cards">
            <div class="card_intro">
                <h4 style="color: var(--blueNeutral-dark); margin-bottom: 25px" class="three">How do you want to play the game?</h4>
                <label class="switch">
                    <input type="checkbox" id="keyboard" name="keyboard">
                    <span class="slider"></span>
                </label>
                <label for="keyboard" style="color: var(--blueNeutral-dark); font: var(--bodyExText)" class="four">Show keyboard with colors </label>
            </div>

            <div class="card_intro">

                <h4 style="color: var(--blueNeutral-dark); margin-bottom: 0px" class="five">Press start and earn some stars.</h4> <br> <h4 style="color: var(--blueNeutral-dark); margin-bottom: 0px" class="six">Good luck!</h4>
                <?php foreach ($exercises as $ex):?>
                    <?php  if ($ex->idExercises==$idExercises):?>

                        <form action="<?php echo base_url('kids/exercise/'.$ex->idExercises);?>" class="intro_ex_button">
                                <button class="button buttonPrimary buttonChild seven">Start</button>
                            </form>
                            <form action="<?php echo base_url();?>/kids/exercises" class="intro_ex_button">
                                <button class="button buttonSecondary buttonChild eight">Go back to exercises</button>
                            </form>


                    <?php endif;?>
                <?php endforeach;?>
            </div>
    </div>
</div>
<?= $this->endSection() ?>

