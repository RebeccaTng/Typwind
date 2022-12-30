<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<div class="home_content">
    <div>
        <h1 style="color:var(--blueNeutral);" class="two"> Welcome Back </h1>
        <h1 style="color:var(--blueNeutral); ">
            <?php
            $session = session();
            echo $session->firstname; echo "!";
            ?>
        </h1>
    </div>
    <div>
        <h3 style="color:var(--blueNeutral);" class="three"> Your next exercise is waiting for you!</h3>
    </div>

    <div class="start_ex_button">
        <?php foreach ($exercises as $ex):
            $found =0;
            foreach ($scores as $sc):
                if ($ex->idExercises== $sc->idExercise_fk):
                    $found=1;
                    break;
                endif;
            endforeach;
            if($found == 0): ?>
                <button class="button buttonSecondary buttonChild five" style="color:var(--blueNeutral); text-transform: none;"> <?=$ex->name;?></button>

                <form action="<?php echo base_url('/kids/intro/'.$ex->idExercises);?>" class="inline">
                    <button class="button buttonPrimary buttonChild four">Start new exercise</button>
                </form>
                 <?php break;
            endif;
            $found =1;
        endforeach;
        if($found ==1): ?>
            <button class="button buttonSecondary buttonChild five" style="color:var(--blueNeutral); text-transform: none;">Congratulations, you have finished the game!</button>

            <form action="<?php echo base_url('/kids/intro/1');?>" class="inline">
                <button class="button buttonPrimary buttonChild four">Start new exercise</button>
            </form>
        <?php endif;?>
    </div>

</div>




<?= $this->endSection() ?>