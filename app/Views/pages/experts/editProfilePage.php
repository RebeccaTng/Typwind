<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php foreach ($teachers as $person):?>
    <?php  if ($person->idTeachers==$idTeachers):?>
        <form action="http://localhost/UXWD/public/experts/editProfile/<?=$person->idTeachers?>" method="post">

            <input type="hidden" id="password" name="password" value="<?=$person->password?>">
            <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?=$person->firstname?>"><br><br>
            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" value="<?=$person->lastname?>"><br><br>
            <label for="email">email:</label>
            <input type="text" id="email" name="email" value="<?=$person->email?>"><br><br>
            <label for="active">Active</label>
            <?php if ($person->isActive==1):?>

                <input type="checkbox" id="active" name="active" value="1"checked>

            <?php else:?>

                <input type="checkbox" id="active" name="active">

            <?php endif;?>
            <br><br>
            <input type="submit" value="Save">
        </form>
    <?php endif;?>
<?php endforeach;?>




<?= $this->endSection() ?>