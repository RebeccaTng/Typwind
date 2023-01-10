<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertExercise", time()+36000, "/");?>

<?php $exercises =json_decode(session()->exercises);?>
<?php $teachers =session()->teachers;?>

<?php foreach ($exercises as $exercise):?>
<?php  if ($exercise->idExercises==$idExercises):?>
<?php foreach ($teachers as $teacher):?>
    <?php  if ($exercise->idTeacher_fk==$teacher->idTeachers || $exercise->idTeacher_fk==null):?>

        <?php setcookie("currentExercise",$exercise->idExercises, time()+36000, "/");?>

<ul class="breadcrumb">
    <li><a href="<?php echo base_url('/experts/exercises');?>" class="one">Exercises</a></li>
    <li><?php echo $exercise->name?></li>
</ul>

<h1><?=$exercise->name?></h1>

<div class="scroller">
        <div class="infoContainer">
            <div class="general">
                <h3 class ="three">General Information</h3>
                <p>
                    <b class="four">Created by: </b>
                    <?php if ($exercise->idTeacher_fk==null):
                          echo
                          "Windekind";
                    ?>
                    <?php
                          else:
                           echo
                          $teacher->firstname. " "
                        . $teacher->lastname

                    ; endif;?>


                    <br>
                    <b class="five">Lesson:
                    </b><?php  if ($exercise->isCustom==1):
                        echo "Custom";
                    else: echo $exercise->lesson;
                    endif
                    ?><br>
                </p>
            </div>
            <div class="content">
                <h3 class="six">Content</h3>
                <p class="contentText"><?=$exercise->text?></p>
            </div>
        </div>
</div>

<div class="bottomBar space">
    <a href= "<?php echo base_url('experts/exercises');?>">
        <button class="button buttonSecondary buttonExpert nine2">BACK</button>
    </a>

    <a>
        <?php
        if($exercise->isCustom==1 && $exercise->idTeacher_fk==session()->id):
        echo '<button id= "edit" class="button buttonPrimary buttonExpert seven">EDIT</button>';
        endif
        ?>
        <?php
        if($exercise->isCustom==1 && $exercise->idTeacher_fk==session()->id):?>
        <script type="text/javascript">
            document.getElementById("edit").onclick = function () {
                location.href = getCookie("baseURL") +"/experts/editExercisePage/" + getCookie("currentExercise") ;
            };
        </script>
            <?php endif
            ?>
    </a>
</div>
                <?php break;?>
            <?php endif;?>
        <?php endforeach;?>
    <?php endif;?>
<?php endforeach;?>

<?= $this->endSection() ?>
