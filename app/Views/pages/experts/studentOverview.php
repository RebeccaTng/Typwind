<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>


<?php foreach ($students as $person):?>
<?php  if ($person->idStudents==$idStudents):?>

    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
        <li><?=$person->firstname?><?=$person->lastname?></li>
    </ul>

    <h1><?=$person->firstname?><?=$person->lastname?></h1>
    
    <div class="scroller">
        <div class="container">
            <div class="general card">
                <h3>General Information</h3>
                <img src="/public/assets/icons/user.svg" alt="User Icon" class="roundProfilePic">
                <?php if ($person->handSelection==1):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_right.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==2):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_left.svg');?>" alt="Italian Trulli">
                <?php endif;?>
                <?php if ($person->handSelection==0):?>
                    <img class="hands" src="<?php echo base_url('/public/assets/general/hands_both.svg');?>" alt="Italian Trulli">
                <?php endif;?>
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
                        One Hand - Right Hand
                    <?php endif;?>
                    <?php if ($person->handSelection==2):?>
                        One Hand - Left Hand
                    <?php endif;?>
                    <?php if ($person->handSelection==0):?>
                        Both Hands
                    <?php endif;?>
                    <br>
                    <b>Active:&nbsp&nbsp</b>
                    <?php if ($person->isActive==1):?>
                        Currently Active
                    <?php endif;?>
                    <?php if ($person->isActive==0):?>
                        Not Active
                    <?php endif;?>
                    <br>
                </p>
            </div>

            <div class="noteCard card">
                <h3>Notes</h3>
                <div class="notes">
                    <p><?=$person->notes ?>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bottomBar">
        <a href= "<?php echo base_url('experts/editStudentPage/'.$person->idStudents);?>">
            <button class="button buttonPrimary buttonExpert">EDIT</button>
        </a>
    </div>

        <?php endif;?>
    <?php endforeach;?>

<?= $this->endSection() ?>



