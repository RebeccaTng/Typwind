<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertEditProfile", time()+36000, "/");?>

    <h1 class="one">My Profile</h1>
    <div class="center">
        <div class="user">
            <img src="/public/assets/icons/user.svg" alt="User Icon" class="roundProfilePic">
            <h2>
                <?php $session = session();
                echo $session->firstname; echo " "; echo $session->lastname;?>
            </h2>
        </div>

        <h3 class="two">General Information</h3>
        <form action="<?php echo base_url('experts/editProfile/'.session()->id);?>" method="post">
            <!-- <input type="hidden" id="password" name="password" value="<?$person->password?>"> -->

            <div class="field">
                <label class="three" for="firstname">First name:</label><br>
                <input type="text" id="firstname" name="firstname" value="<?=session()->firstname?>" required><br>
                <label class="four" for="lastname">Surname:</label><br>
                <input type="text" id="lastname" name="lastname" value="<?=session()->lastname?>" required><br>
                <label class="five" for="email">Email:</label><br>
                <input type="text" id="email" name="email" value="<?=session()->email?>" required><br>
                <label class="six" for="active">Active</label>

                <label class="switch">
                    <?php if (session()->isActive==1):?>
                        <input type="checkbox" id="active" name="active" value="1" checked>
                    <?php else:?>
                        <input type="checkbox" id="active" name="active">
                    <?php endif;?>
                    <span class="slider"></span>
                </label>
            </div>
            <div class="bottomBar">
                <input id="seven" class="button buttonPrimary buttonExpert" type="submit" value="Save">
            </div>
        </form>
    </div>

<?= $this->endSection() ?>