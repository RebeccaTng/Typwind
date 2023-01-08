<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php $exercises =json_decode(session()->exercises);?>

<?php foreach ($exercises as $exercise):?>
<?php  if ($exercise->idExercises==$idExercises):?>

        <?php setcookie("currentExercise",$exercise->idExercises, time()+36000, "/");?>

<ul class="breadcrumb">
    <li><a href="<?php echo base_url('/experts/exercises');?>">Exercises</a></li>
    <li>Title</li>
</ul>

<h1>The adventure of the Dog</h1>

<div class="scroller">
        <div class="infoContainer">
            <div class="general">
                <h3>General Information</h3>
                <p>
                    <b>Created by: <?=$exercise->name?></b><br>
                    <b>Lesson:
                        <?php  if ($exercise->isCustom==1):
                        echo "Custom";
                        else: echo $exercise->lesson;
                        endif
                        ?>
                    </b><br>
                </p>
            </div>
            <div class="content">
                <h3>Content</h3>
                <p class="contentText"><?=$exercise->text?></p>
            </div>
        </div>
</div>

<div class="bottomBar">
    <a>
        <?php
        if($exercise->isCustom==1 && $exercise->idTeacher_fk==session()->id):
        echo '<button id= "edit" class="button buttonPrimary buttonExpert">EDIT</button>';
        endif
        ?>
        <script type="text/javascript">
            document.getElementById("edit").onclick = function () {
                location.href = getCookie("baseURL") +"/experts/editExercisePage/" + getCookie("currentExercise") ;
            };
        </script>
    </a>
</div>



    <?php endif;?>
<?php endforeach;?>
<?= $this->endSection() ?>
