<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertEditStudent", time()+36000, "/");?>
<input type="hidden" id="URL" name="URL" value="<?php echo base_url();?>/public/assets/general">
<script type="text/javascript" src="<?=base_url()?>/public/js/editStudent.js"></script>

<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>

        <ul class="breadcrumb">
            <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
            <li><?=$person->firstname?> <?=$person->lastname?></li>
        </ul>

        <h1><?=$person->firstname?> <?=$person->lastname?></h1>

        <div class="scroller">
            <form class="studentContainer" action="<?php echo base_url('experts/editStudent/'.$person->idStudents);?>" method="post">
                <div class="roundProfilePic">
                    <img src="/public/assets/avatars/1.svg" alt="User Icon">
                </div>

                <div class="infoContainer">
                    <div class="general">
                        <h3>General Information</h3>
                        <input type="hidden" id="email" name="email" value="<?=$person->email?>">
                        <input type="hidden" id="password" name="password" value="<?=$person->password?>">
                        <input type="hidden" id="reminder" name="reminder" value="<?=$person->reminder?>">
                        <input type="hidden" id="coins" name="coins" value=<?=$person->coins?>>
                        <input type="hidden" id="streak" name="streak" value=<?=$person->streak?>>

                        <div class="generalFields">
                            <label for="firstname"><b>First name:</b></label>
                            <input type="text" id="firstname" name="firstname" value="<?=$person->firstname?>" required>
                            <label for="lastname"><b>Surname:</b></label>
                            <input type="text" id="lastname" name="lastname" value="<?=$person->lastname?>" required>
                            <label for="lastname"><b>Email:</b></label>
                            <input type="text" id="email" name="email" value="<?=$person->email?>" required>
                            <label for="gender"><b>Gender:</b></label>
                            <select name="gender" id="gender" required>
                            <?php if ($person->gender==1):?>
                                <option selected="selected" value="male">Male</option>
                                <option value="female">Female</option>
                            <?php else:?>
                                <option value="male">Male</option>
                                <option selected="selected" value="female">Female</option>
                            <?php endif;?>
                            </select>
                            <label for="birthday"><b>Birthday:</b></label>
                            <input type="date" id="birthday" name="birthday" value="<?=$person->birthday?>" required>
                            <label for="teachers"><b>Teacher:</b></label>
                            <select name="teachers" id="teachers" value="<?=$person->teacherFirstname?>" required>
                                <?php foreach ($teachers as $teacher):?>
                                    <?php if ($person->teacherFirstname==$teacher->firstname):?>
                                        <option selected="selected" value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                                    <?php else:?> <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                            <label for="handSelection"><b>Hand Selection:</b></label>
                            <select name="handSelection" id="handSelection" onChange="handImage()" required >
                            <?php if ($person->handSelection==1):?>
                                <option selected="selected" value="right">Right hand</option>
                                <option value="left">Left Hand</option>
                                <option value="both">Both Hands</option>
                            <?php endif;?>
                            <?php if ($person->handSelection==2):?>
                                <option value="right">Right Hand</option>
                                <option selected="selected" value="left">Left Hand</option>
                                <option value="both">Both Hands</option>
                            <?php endif;?>
                            <?php if ($person->handSelection==0):?>
                                <option value="right">Right Hand</option>
                                <option value="left">Left Hand</option>
                                <option selected="selected" value="both">Both Hands</option>
                            <?php endif;?>
                            </select>
                            <label for="active"><b>Active:</b></label>&nbsp;
                            <label class="switch">
                            <?php if ($person->isActive==1):?>
                                <input type="checkbox" id="active" name="active" value="1"checked>
                            <?php else:?>
                                <input type="checkbox" id="active" name="active">
                            <?php endif;?>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="notes">
                        <label for="notes"><h3>Notes</h3></label>
                        <textarea id="notes" name="notes" rows="12" maxlength="1000" placeholder="Type here"><?= $person->notes?></textarea>
                        <div id="the-count">
                            <span id="current"></script></span>
                            <span id="maximum">/ 1000</span>
                        </div>
                    </div>

                </div>

                <?php if ($person->handSelection==1):?>
                    <img id="hand image" class="hands" src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==2):?>
                    <img id="hand image" class="hands" src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==0):?>
                    <img id="hand image" class="hands" src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">
                <?php endif;?>

                <div class="bottomBar space">
                    <input type="submit" value="Save" class="button buttonPrimary buttonExpert">

                    <a href="<?php echo base_url('experts/studentOverview/'.$person->idStudents);?>">
                        <button class="button buttonSecondary buttonExpert">BACK</button>
                    </a>
                </div>
            </form>
        </div>

    <?php endif;?>
<?php endforeach;?>

<script>
    function handImage() {
        var URL = document.getElementById("URL").value;
        var state=document.getElementById("handSelection");
        if(state.value=="right")
        {
            document.getElementById("hand image").src =URL +"/hands_right.svg";
        }
        if(state.value=="left")
        {
            document.getElementById("hand image").src =URL +"/hands_left.svg";
        }
        if(state.value=="both")
        {
            document.getElementById("hand image").src =URL +"/hands_both.svg";
        }
    }
    $('textarea').keyup(function () {

        var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            note = $('#notes'),
            theCount = $('#the-count');


        current.text(characterCount);

        if (characterCount < 167) {
            current.css('color', '#666');
        }
        if (characterCount > 167 && characterCount < 334) {
            current.css('color', '#6d5555');
        }
        if (characterCount > 334 && characterCount < 500) {
            current.css('color', '#793535');
        }
        if (characterCount > 667 && characterCount < 834) {
            current.css('color', '#841c1c');
        }
        if (characterCount > 834 && characterCount < 1000) {
            current.css('color', '#8f0001');
        }

        if (characterCount >= 1000) {
            maximum.css('color', '#8f0001');
            current.css('color', '#8f0001');
            theCount.css('font-weight', 'bold');
        } else {
            maximum.css('color', '#666');
            theCount.css('font-weight', 'normal');
        }
    });
</script>

<?= $this->endSection() ?>
