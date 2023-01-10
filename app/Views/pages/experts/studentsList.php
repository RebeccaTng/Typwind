<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertStudents", time()+36000, "/");?>

    <h1 class="one" >Students</h1>
    <div class="bar">
        <!-- Add new student -->
        <a class="addNew two" href=<?php echo base_url('experts/addStudentPage/');?>>Add New Student</a>

        <input type="hidden" id="URL" name="URL" value="<?php echo base_url();?>/experts/studentOverview/">

        <div class="rightBar">
            <!-- Filter -->
            <div class="filterContainer">
                <select name="Filter" id="filter" onchange="filterStudents(users, this.value)" onclick="hideOption()">
                    <option disabled selected value="Filter" class="three" hidden>Filter</option>
                    <?php foreach ($teachers as $teacher):
                        if($teacher->isActive):?>

                            <option value="<?=$teacher->firstname?>"> <?=$teacher->firstname?> </option>
                        <?php endif;
                    endforeach;?>
                </select>
                <button hidden= "hidden" id="disable filter" onclick="filterStudents(users, 'disable filter')"></button>
            </div>
            <!-- Searchbar -->
            <input class="four" type="text" id="myInput" onkeyup="search()" placeholder="Search">
        </div>
    </div>

    <script >
        var users = <?php echo json_encode($students); ?>;
    </script>
    <script  src="<?=base_url()?>/public/js/filter.js"></script>

    <ul class="studentList" id="list">
        <?php foreach ($students as $person):?>
            <li class="studentListItem">
                <a href="<?php echo base_url('experts/studentOverview/'.$person->idStudents);?>">
                    <div class="roundProfilePic">
                        <?php
                        $idOfSelectedAvatar=1;
                        if (!empty($avatars)):
                            foreach ($avatars as $avatar):
                                if($person->idStudents==$avatar->idStudent_fk):
                                    $idOfSelectedAvatar=$avatar->idAvatar_fk;
                                    break;
                                endif;
                            endforeach;
                        endif;?>
                        <img src="/public/assets/avatars/<?=$idOfSelectedAvatar?>.svg" alt="User Icon">
                    </div>
                    <h4><?=$person->firstname?> <br><?=$person->lastname?></h4>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
            <h3 id="noStudents" hidden>No student found with this name</h3>
            <h3 id="noStudents" hidden>This teacher has no students assigned to them</h3>

<?= $this->endSection() ?>

