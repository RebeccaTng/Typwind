<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>



<section>



    <p>
        <?php foreach ($students as $person):?>
            <li> <a href="http://localhost/UXWD/public/experts/studentOverview/<?=$person->idStudents?>" <?=$person->firstname?>
            <br><?=$person->lastname?></a>
    </li>
        <?php endforeach;?>
    </p>
</section>
<section>

    <h2>Add student </h2>
    <a href="http://localhost/UXWD/public/experts/addStudentPage/"> addStudent </a>
</section>
<?= $this->endSection() ?>


