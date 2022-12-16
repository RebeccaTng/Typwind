<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>


        <form action="<?php echo base_url('experts/editProfile/'.session()->id);?>" method="post">

<!--            <input type="hidden" id="password" name="password" value=" <?/*=$person->password*/?>">
-->         <label for="firstname">First name:</label>
            <input type="text" id="firstname" name="firstname" value="<?=session()->firstname?>" required><br><br>
            <label for="lastname">Last name:</label>
            <input type="text" id="lastname" name="lastname" value="<?=session()->lastname?>" required><br><br>
            <label for="email">email:</label>
            <input type="text" id="email" name="email" value="<?=session()->email?>" required><br><br>
            <label for="active">Active</label>
            <?php if (session()->isActive==1):?>

                <input type="checkbox" id="active" name="active" value="1" checked>

            <?php else:?>

                <input type="checkbox" id="active" name="active">

            <?php endif;?>
            <br><br>
            <input type="submit" value="Save">
        </form>

<?= $this->endSection() ?>