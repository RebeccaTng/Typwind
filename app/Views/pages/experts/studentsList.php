<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertStudents", time()+36000, "/");?>

    <h1 class="one" >Students</h1>
    <div class="bar">
        <!-- Add new student -->
        <a class="addNew two" href=<?php echo base_url('experts/addStudentPage/');?>>Add New Student</a>

        <input type="hidden" id="testURL" name="testURL" value="<?php echo base_url();?>/experts/studentOverview/">
        <!-- Filter -->
        <select name="Filter" id="filter" onchange="filterStudents(users, this.value)">
            <option disabled selected value class="three">Filter</option>
            <?php foreach ($teachers as $teacher):?>
                <option value="<?=$teacher->firstname?>"> <?=$teacher->firstname?> </option>
            <?php endforeach;?>
            <option value="disable filter"> Disable filter</option>
        </select>

        <!-- Searchbar -->
        <input class="four" type="text" id="myInput" onkeyup="search()" placeholder="Search">
    </div>

    <script type="text/javascript">
        var users = <?php echo json_encode($students); ?>;
    </script>
    <script type="text/javascript" src="<?=base_url()?>/public/js/filter.js"></script>

    <ul class="studentList" id="list">
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

