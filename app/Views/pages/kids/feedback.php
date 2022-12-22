<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
<div class = "grid-container_feedback">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
            <li>Page 4</li>
        </ul>
    </div>
    <div class="title" style="color: var(--blueNeutral)">
        <?php foreach ($exercises as $ex):?>
            <?php  if ($ex->idExercises==$idExercises):?>
                <h1><?= $ex->name?></h1>
            <?php endif;?>
        <?php endforeach;?>
    </div>

    <div class="content_feedback">
        <div>
            <h2 style="color: var(--primary-darkest)">Congrats, you completed an exercise!<br>Try again to earn more stars :)</h2>
        </div>
        <!-- Star icons -->
        <div class = "wrapper_for_stars">
            <div class ="checked_stars"></div>
            <div class ="checked_stars"></div>
            <div class ="checked_stars"></div>
            <div class ="unchecked_stars"></div>
            <div class ="unchecked_stars"></div>
        </div>

        <div class="card_buttons">
            <button class="button buttonPrimary buttonChild">Replay exercise</button>

            <button class="button buttonPrimary buttonChild">Start new exercise</button>

            <button class="button buttonSecondary buttonChild">Back to exercises</button>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
