<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<div class = "grid-container_welcome">
    <div class = "breadcrumb">

    </div>

    <div class="title"></div>
    <?php foreach ($exercises as $ex):?>
        <?php  if ($ex->idExercises==$idExercises):?>
            <h1 style="color: var(--blueNeutral);"><?= $ex->name?></h1>
        <?php endif;?>
    <?php endforeach;?>
    </div>
        <div class="grid_cards">
            <div class="card_intro">
                <h4 style="color: var(--blueNeutral-dark)">How do you want to play the game?</h4>
                <label for="keyboard" style="color: var(--blueNeutral-dark); font: var(--bodyExText)">Show keyboard with colors: </label>
                <label class="switch">
                    <input type="checkbox" id="keyboard" name="keyboard">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="card_intro">

                <h4 style="color: var(--blueNeutral-dark)">Press start and earn some stars.<br> Good luck!</h4>
                <div class="intro_ex_button">
                    <button class="button buttonSecondary buttonChild">Start</button>
                    <button class="button buttonPrimary buttonChild">Go back to exercises</button>
                </div>
            </div>
    </div>
</div>
<?= $this->endSection() ?>

