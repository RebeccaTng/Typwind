<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>



<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>


        <section>
            <a href="<?php echo base_url('/experts/studentsList');?>">Students</a><h6><?=$person->firstname?><?=$person->lastname?></h6>
        </section>

        <form action="<?php echo base_url('experts/editStudent/'.$person->idStudents);?>" method="post">
            <input type="hidden" id="email" name="email" value="<?=$person->email?>">
            <input type="hidden" id="password" name="password" value="<?=$person->password?>">
            <input type="hidden" id="reminder" name="reminder" value="<?=$person->reminder?>">
            <input type="hidden" id="coins" name="coins" value=<?=$person->coins?>>
            <input type="hidden" id="streak" name="streak" value=<?=$person->streak?>>
            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?=$person->firstname?>" required><br><br>
            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" value="<?=$person->lastname?>" required><br><br>
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" required>
            <?php if ($person->gender==1):?>
                <option selected="selected" value="male">Male</option>
                <option value="female">Female</option>
            <?php else:?>
                <option value="male">Male</option>
                <option selected="selected" value="female">Female</option>
            <?php endif;?>
            </select><br><br>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value="<?=$person->birthday?>" required><br><br>
            <label for="teachers">Teacher:</label>
            <select name="teachers" id="teachers" value="<?=$person->teacherFirstname?>" required>
                <?php foreach ($teachers as $teacher):?>
                    <?php if ($person->teacherFirstname==$teacher->firstname):?>
                        <option selected="selected" value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                    <?php else:?> <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>?>
                    <?php endif;?>


                <?php endforeach;?>
            </select><br><br>

            <label for="handSelection">Hand Selection:</label>
            <select name="handSelection" id="handSelection" required>

            <?php if ($person->handSelection==1):?>
                <option selected="selected" value="right">One Hand, right hand</option>
                <option value="left">One Hand, left hand</option>
                <option value="both">Both Hands</option>

            <?php endif;?>
            <?php if ($person->handSelection==2):?>
                <option value="right">One Hand, right hand</option>
                <option selected="selected" value="left">One Hand, left hand</option>
                <option value="both">Both Hands</option>

            <?php endif;?>
            <?php if ($person->handSelection==0):?>

                <option value="right">One Hand, right hand</option>
                <option value="left">One Hand, left hand</option>
                <option selected="selected" value="both">Both Hands</option>

            <?php endif;?>
            </select><br><br>
            <label for="active">Active</label>
            <?php if ($person->isActive==1):?>

                <input type="checkbox" id="active" name="active" value="1"checked>

            <?php else:?>

                <input type="checkbox" id="active" name="active">

            <?php endif;?>
            <br><br>
            <label for="notes">Notes:</label>
            <input type="text" id="notes" name="notes" value="<?= $person->notes?>" ><br><br>
            <input type="submit" value="Save">
        </form>

        <?php if ($person->handSelection==1):?>
            <img src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">

        <?php endif;?>
        <?php if ($person->handSelection==2):?>
            <img src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">

        <?php endif;?>
        <?php if ($person->handSelection==0):?>
            <img src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">

        <?php endif;?>
    <?php endif;?>
<?php endforeach;?>




<?= $this->endSection() ?>
