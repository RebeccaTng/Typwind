<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<script type="text/javascript">
    var users = <?php echo json_encode($students); ?>;
</script>

<script type="text/javascript" src="<?=base_url()?>/public/js/filter.js"></script>



<div id="list">

        <?php foreach ($students as $person):?>
            <li> <a href="<?php echo base_url('experts/studentOverview/'.$person->idStudents);?>"><?=$person->firstname?><br><?=$person->lastname?></a></li>


        <?php endforeach;?>
</div>

<section>

    <h2>Add New Student </h2>

    <a href=<?php echo base_url('experts/addStudentPage/');?>> addStudent </a> <br><br>
</section>

<section>
    <select name="Filter" id="filter" onchange="filterStudents(users, this.value);">
        <option disabled selected value> Filter </option>
        <?php foreach ($teachers as $teacher):?>
            <option value="<?=$teacher->firstname?>"> <?=$teacher->firstname?> </option>
        <?php endforeach;?>
    </select>
</section>

<section>

    <input type="text" id="myInput" onkeyup="search()" placeholder="Text Input">
</section>
<?= $this->endSection() ?>


