<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>
<?php $exercises =json_decode(session()->exercises);?>

<?php foreach ($exercises as $exercise):?>
<?php  if ($exercise->idExercises==$idExercises):?>

<?php  if($exercise->idTeacher_fk!=session()->id):?>
<script>
    window.alert("You can only edit exercises that you created.");
    window.location.href = "<?php echo base_url('experts/exercises');?>";
</script>
    <?php endif;?>

        <ul class="breadcrumb">
            <li><a>Exercises</a></li>
            <li>Exercise</li>
        </ul>

<h1>Edit Exercise</h1>

<div class="scroller">
    <form class="exerciseContainer" action= "<?php echo base_url('experts/editExercise/'.$exercise->idExercises);?>" method="post">
    <div class="infoContainer">
        <div class="generalContainer">
            <h3>General Information</h3>
            <div class="general">
                <p>
                    <label for="title"><b>Title Exercise:</b></label>
                    <input type="text" id="title" name="title" value="<?=$exercise->name?>"><br>
                    <label for="lesson"><b>Lesson:</b></label>
                    <input type="text" id="lesson" name="lesson" value="<?=$exercise->lesson?>"><br>
                </p>
            </div>

            <div class="content">
                <label for="content"><h3>Content</h3></label>
                <textarea id="content" name="content" rows="12" maxlength="1000"><?=$exercise->text?></textarea>
            </div>
        </div>
    </div>
        <div class="bottomBar">
            <a>
                <button class="button buttonPrimary buttonExpert">save</button>
            </a>
        </div>
    </form>
</div>

    <?php endif;?>
<?php endforeach;?>

<?= $this->endSection() ?>
