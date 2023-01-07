<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertStudent", time()+36000, "/");?>

<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
            <li><?=$person->firstname?> <?=$person->lastname?></li>
        </ul>

        <h1><?=$person->firstname?> <?=$person->lastname?></h1>

        <div class="scroller">
            <div class="studentContainer">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/1.svg" alt="User Icon">
                </div>
                <?php if ($person->handSelection==1):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==2):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==0):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">
                <?php endif;?>

                <div class="infoContainer">
                    <div class="general">
                        <h3>General Information</h3>
                        <p>
                            <b>First name:</b>&nbsp&nbsp<?= $person->firstname?><br>
                            <b>Surname:&nbsp&nbsp</b><?= $person->lastname?><br>
                            <b>Email:&nbsp&nbsp</b><?= $person->email?><br>
                            <b>Gender:&nbsp&nbsp</b>
                            <?php if ($person->gender==1):?>
                                Male
                            <?php endif;?>
                            <?php if ($person->gender==0):?>
                                Female
                            <?php endif;?>
                            <br>
                            <b>Birthday:</b>&nbsp&nbsp<?= $person->birthday?><br>
                            <b>Teacher:</b>&nbsp&nbsp<?= $person->teacherFirstname?><br>
                            <b>Hand Selection:&nbsp&nbsp</b>
                            <?php if ($person->handSelection==1):?>
                                Right Hand
                            <?php endif;?>
                            <?php if ($person->handSelection==2):?>
                                Left Hand
                            <?php endif;?>
                            <?php if ($person->handSelection==0):?>
                                Both Hands
                            <?php endif;?>
                            <br>
                            <b>Active:&nbsp&nbsp</b>
                            <?php if ($person->isActive==1):?>
                                Currently active and following the Typwind course
                            <?php endif;?>
                            <?php if ($person->isActive==0):?>
                                Not active, stopped following the Typwind course
                            <?php endif;?>
                            <br>
                        </p>
                    </div>

                    <?php if($person->notes == null || $person->notes == ""):?>
                        <div class="notes">
                            <h3>Notes</h3>
                            <span class="noNotes">This student does not have any notes.</span>
                        </div>
                    <?php else:?>
                        <div class="notes">
                            <h3>Notes</h3>
                            <p class="noteText"><?=$person->notes ?></p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <div class="bottomBar space">
            <a href= "<?php echo base_url('experts/studentsList');?>">
                <button class="button buttonSecondary buttonExpert">BACK</button>
            </a>
            <a href= "<?php echo base_url('experts/editStudentPage/'.$person->idStudents);?>">
                <button class="button buttonPrimary buttonExpert">EDIT</button>
            </a>
        </div>

    <?php endif;?>
<?php endforeach;?>

<?= $this->endSection() ?>



