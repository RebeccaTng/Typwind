<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
<script type="text/javascript" src="<?=base_url()?>/public/js/intro.js"></script>

<div class = "grid-container_intro">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>">Exercises</a></li>
            <li>Introduction</li>
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
                <h4 style="color: var(--blueNeutral-dark); margin-bottom: 25px">How do you want to play the game?</h4>
                <label class="switch">
                    <input type="checkbox" id="keyboardShow" name="keyboard"  onchange="keyboard()" checked>
                    <span class="slider"></span>
                </label>
                <label for="keyboard" style="color: var(--blueNeutral-dark); font: var(--bodyExText)">Show keyboard</label>
                <br>
                <div id="color">
                    <label class="switch">
                        <input type="checkbox" id="keyboardColors" name="keyboard" onchange="color()" checked>
                        <span class="slider"></span>
                    </label>
                    <label for="keyboard" style="color: var(--blueNeutral-dark); font: var(--bodyExText)">Show keyboard with colors </label>
                </div>


            </div>

            <div class="card_intro">

                <h4 style="color: var(--blueNeutral-dark); margin-bottom: 25px">Press start and earn some stars.<br> Good luck!</h4>
                <?php foreach ($exercises as $ex):?>
                    <?php  if ($ex->idExercises==$idExercises):?>

                        <form action="<?php echo base_url('kids/exercise/'.$ex->idExercises);?>" class="intro_ex_button" method="post">
                                <button class="button buttonPrimary buttonChild">Start</button>
                                <input type="checkbox" id="keyboardShowCopy" name="keyboard" hidden checked>
                                <input type="checkbox" id="keyboardColorsCopy" name="keyboard" hidden checked>
                            </form>
                            <form action="<?php echo base_url();?>/kids/exercises" class="intro_ex_button">
                                <button class="button buttonSecondary buttonChild">Go back to exercises</button>
                            </form>


                    <?php endif;?>
                <?php endforeach;?>
            </div>
    </div>
</div>
<?= $this->endSection() ?>

