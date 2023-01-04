<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<ul class="breadcrumb">
    <li><a>Exercises</a></li>
    <li>Exercise</li>
</ul>

<h1>Add Exercise</h1>

<div class="scroller">
    <form class="exerciseContainer" action= "<?php echo base_url('experts/addExercise');?>" method="post">
    <div class="infoContainer">
        <div class="generalContainer">
            <h3>General Information</h3>
            <div class="general">
                <p>
                    <label for="title"><b>Title Exercise:</b></label>
                    <input type="text" id="title" name="title"><br>
                    <label for="lesson"><b>Lesson:</b></label>
                    <input type="text" id="lesson" name="lesson"><br>
                </p>
            </div>

            <div class="content">
                <label for="content"><h3>Content</h3></label>
                <textarea id="content" name="content" rows="12" maxlength="1000" placeholder="Type here."></textarea>
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




<?= $this->endSection() ?>

