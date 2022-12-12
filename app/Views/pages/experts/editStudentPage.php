<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>


<?php foreach ($students as $person):?>
    <?php  if ($person->idStudents==$idStudents):?>

        <form action="<?php echo base_url('experts/editStudent/'.$person->idStudents);?>" method="post">
            <input type="hidden" id="email" name="email" value="<?=$person->email?>">
            <input type="hidden" id="password" name="password" value="<?=$person->password?>">
            <input type="hidden" id="reminder" name="reminder" value="<?=$person->reminder?>">
            <input type="hidden" id="coins" name="coins" value=<?=$person->coins?>>
            <input type="hidden" id="streak" name="streak" value=<?=$person->streak?>>
            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?=$person->firstname?>"><br><br>
            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" value="<?=$person->lastname?>"><br><br>
            <label for="gender">Gender:</label>
            <select name="gender" id="gender">
            <?php if ($person->gender==1):?>
                <option selected="selected" value="male">Male</option>
                <option value="female">Female</option>
            <?php else:?>
                <option value="male">Male</option>
                <option selected="selected" value="female">Female</option>
            <?php endif;?>
            </select><br><br>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value=<?=$person->birthday?>><br><br>
            <label for="teachers">Teacher:</label>
            <select name="teachers" id="teachers" value="<?=$person->teacherFirstname?>">
                <?php foreach ($teachers as $teacher):?>
                    <?php if ($person->teacherFirstname==$teacher->firstname):?>
                        <option selected="selected" value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                    <?php else:?> <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>?>
                    <?php endif;?>


                <?php endforeach;?>
            </select><br><br>

            <label for="handSelection">Hand Selection:</label>
            <select name="handSelection" id="handSelection">
            <?php if ($person->handSelection==1):?>

                <option selected="selected" value="One Hand">One Hand</option>
                <option value="Both Hands">Both Hands</option>

            <?php else: ?>
                <option value="One Hand">One Hand</option>
                <option selected="selected" value="Both Hands">Both Hands</option>
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
    <?php endif;?>
<?php endforeach;?>




<?= $this->endSection() ?>
