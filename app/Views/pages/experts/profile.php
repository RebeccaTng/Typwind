<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertProfile", time()+36000, "/");?>

    <h1 class="one">My Profile</h1>
    <div class="center">
        <img src="/public/assets/icons/user.svg" alt="User Icon" class="roundProfilePic">
        <h2>
            <?php $session = session();
            echo $session->firstname; echo " "; echo $session->lastname;?>
        </h2>
        <h3 class="two">General Information</h3>
        <p>
            <b class="three">First name:</b>&nbsp&nbsp&nbsp<?php echo $session->firstname;?><br>
            <b class="four">Surname:</b>&nbsp&nbsp&nbsp<?php echo $session->lastname;?><br>
            <b class="five">Email:</b>&nbsp&nbsp&nbsp<?php echo $session->email;?><br>

            <?php if (session()->isActive==1):?>
                <b class="six">Active:</b>&nbsp&nbsp&nbspCurrently active
            <?php endif;?>

            <?php if (session()->isActive==0):?>
                <b class="six">Active:</b>&nbsp&nbsp&nbspCurrently not active
            <?php endif;?>
        </p>
    </div>

    <div class="bottomBar">
        <a href="<?php echo base_url('experts/editProfilePage/'.session()->id);?>">
            <button class="button buttonPrimary buttonExpert seven">EDIT</button>
        </a>
    </div>

<?= $this->endSection() ?>