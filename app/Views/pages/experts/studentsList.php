<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<h1>Students</h1>
<div class="bar">
    <a class="addNew" href=<?php echo base_url('experts/addStudentPage/');?>>Add New Student</a>
</div>

<ul class="studentList">
    <?php foreach ($students as $person):?>
        <li class="studentListItem">
            <a href="<?php echo base_url('experts/studentOverview/'.$person->idStudents);?>">
                <img src="/public/assets/icons/user.svg" alt="User Icon" class="roundProfilePic">
                <h4><?=$person->firstname?><br><?=$person->lastname?></h4>
            </a>
        </li>
    <?php endforeach;?>
</ul>

<?= $this->endSection() ?>


