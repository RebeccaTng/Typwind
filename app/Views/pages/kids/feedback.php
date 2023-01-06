<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>
<div class = "grid-container_feedback">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>">Exercises</a>
            <li>Feedback</li>
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
        <h2 style="color: var(--primary-darkest)"> Finished exercise! </h2>
        <div>
        <?php if(0<=$score & $score<0.2): ?>
            <h3 style="color: var(--primary-darkest)">Congrats, you completed an exercise!<br>Try again to earn more stars :)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.2<=$score & $score<0.4): ?>
            <h3 style="color: var(--primary-darkest)">Congrats, you completed an exercise!<br>Try again to earn more stars :)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.4<=$score & $score<=0.6): ?>
            <h3 style="color: var(--primary-darkest)">You earned 2 stars already!<br>Try again to earn more stars :)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.6<=$score & $score<0.8): ?>
            <h3 style="color: var(--primary-darkest)">You earned 3 stars! Well done! Do you want to try again to earn more stars?</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.8<=$score & $score<1): ?>
            <h3 style="color: var(--primary-darkest)">Wow you earned 4 stars! You are ready for the next exercise ;-)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if($score ==1): ?>
            <h3 style="color: var(--primary-darkest)">Perfect score! You are a pro! You are ready for the next exercise ;-)</h3></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
            </div>
        <?php endif;?>


        <div class="card_buttons">

            <?php  if ($idExercise_fk==94):
                $idNext = 1;
            else:
                $idNext= $idExercise_fk+1;
            endif;?>

            <form action="<?php echo base_url('/kids/intro/'.$idNext);?>" class="feedback_ex_button">
                <button class="button buttonPrimary buttonChild">Start next exercise</button>
            </form>

            <form action="<?php echo base_url('/kids/intro/'.$idExercise_fk);?>" class="feedback_ex_button">
                <button class="button buttonSecondary buttonChild">Replay exercise</button>
            </form>

            <form action="<?php echo base_url('/kids/exercises');?>" class="feedback_ex_button">
                <button class="button buttonSecondary buttonChild">Back to exercises</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
