<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<ul class="breadcrumb">
    <li><a>Exercises</a></li>
    <li>Title</li>
</ul>

<h1>The adventure of the Dog</h1>

<div class="scroller">
        <div class="infoContainer">
            <div class="general">
                <h3>General Information</h3>
                <p>
                    <b>Created by:</b><br>
                    <b>Lesson:</b><br>
                </p>
            </div>
            <div class="content">
                <h3>Content</h3>
                <p class="contentText">Add content</p>
            </div>
        </div>
</div>

<div class="bottomBar">
    <a>
        <button class="button buttonPrimary buttonExpert">EDIT</button>
    </a>
</div>


<?= $this->endSection() ?>
