<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<ul class="breadcrumb">
    <li><a>Exercises</a></li>
    <li>Exercise</li>
</ul>

<h1>Exercise</h1>

<div class="scroller">
    <div class="infoContainer">
        <div class="generalContainer">
            <h3>General Information</h3>
            <div class="general">

                <p>
                    <label for="titleExercise"><b>Title Exercise:</b></label>
                    <input type="text" id="titleExercise" name="titleExercise"><br>
                    <label for="createdBy"><b>Created by:</b></label>
                    <input type="text" id="createdBy" name="createdBy"><br>
                </p>
            </div>

            <div class="content">
                <label for="content"><h3>Content</h3></label>
                <textarea id="content" name="content" rows="12" maxlength="1000" placeholder="Type here."></textarea>
            </div>
        </div>
    </div>
</div>

<div class="bottomBar">
    <a>
        <button class="button buttonPrimary buttonExpert">save</button>
    </a>
</div>


<?= $this->endSection() ?>

