<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","feedback", time()+36000, "/");?>

<div class = "grid-container_feedback">
    <div class = "breadcrumb">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/kids/exercises');?>" class="one">Exercises</a>
            <li class="two">Feedback</li>
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
        <?php if(0<=$score & $score<0.2): ?>
            <h2 style="color: var(--primary-darkest)">Congrats, you completed an exercise!<br>Try again to earn more stars :)</h2></div>
            <div class = "wrapper_for_stars">
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.2<=$score & $score<0.4): ?>
            <h2 style="color: var(--primary-darkest)">Congrats, you completed an exercise!<br>Try again to earn more stars :)</h2></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.4<=$score & $score<=0.6): ?>
            <h2 style="color: var(--primary-darkest)">You earned 2 stars already!<br>Try again to earn more stars :)</h2></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.6<=$score & $score<0.8): ?>
            <h2 style="color: var(--primary-darkest)">3 Stars! Well done!</h2></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if(0.8<=$score & $score<1): ?>
            <h2 style="color: var(--primary-darkest)" class="three">Wow 4 Stars!</h2></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="unchecked_stars"></div>
            </div>
        <?php endif;?>
        <?php if($score ==1): ?>
            <h2 style="color: var(--primary-darkest)">Perfect score! You are a pro!</h2></div>
            <div class = "wrapper_for_stars">
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
                <div class ="checked_stars"></div>
            </div>
        <?php endif;?>


        <div class="card_buttons">


            <form action="<?php echo base_url('/kids/intro/'.$idExercise_fk);?>" class="feedback_ex_button">
                <button class="button buttonPrimary buttonChild four">Replay exercise</button>
            </form>
            <?php  if ($idExercise_fk==94):
                $idNext = 1;
            else:
                $idNext= $idExercise_fk+1;
            endif;?>

            <form action="<?php echo base_url('/kids/intro/'.$idNext);?>" class="feedback_ex_button">
                <button class="button buttonPrimary buttonChild five">Start new exercise</button>
            </form>

            <form action="<?php echo base_url('/kids/exercises');?>" class="feedback_ex_button">
                <button class="button buttonSecondary buttonChild six">Back to exercises</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
