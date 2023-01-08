<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertAddExercise", time()+36000, "/");?>

<ul class="breadcrumb">
    <li><a href="<?php echo base_url('/experts/exercises');?>" class="one">Exercises</a></li>
    <li class="one2">Exercise</li>
</ul>

<h1 class="two">Add Exercise</h1>

<div class="scroller">
    <form class="exerciseContainer" action= "<?php echo base_url('experts/addExercise');?>" method="post">
    <div class="infoContainer">
        <div class="generalContainer">
            <h3 class="three">General Information</h3>
            <div class="general">
                <p>
                    <label for="title"><b class="four">Title Exercise:</b></label>
                    <input type="text" id="title" name="title"><br>
                </p>
            </div>

            <div class="content">
                <label for="content"><h3 class="five">Content</h3></label>
                <textarea class="six" id="content" name="content" rows="12" maxlength="1000" placeholder="Type here."></textarea>
            </div>
        </div>
    </div>
        <div class="bottomBar">
            <a>
                <button class="button buttonPrimary buttonExpert seven">save</button>
            </a>
        </div>
    </form>
</div>




<?= $this->endSection() ?>

