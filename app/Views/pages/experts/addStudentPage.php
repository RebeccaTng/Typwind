<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertAddStudent", time()+36000, "/");?>

    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
        <li>Add Student</li>
    </ul>

    <h1>Add Student</h1>

    <div class="scroller">
        <form class="studentContainer" action= "<?php echo base_url('experts/addStudent');?>" method="post">
            <div class="infoContainer">
                <div class="general">
                    <h3>General Information</h3>
                    <div class="generalFields">
                        <label for="firstname"><b>First name</b><span class="mandatory">* </span><b>:</b></label  required>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                        <label for="lastname"><b>Surname</b><span class="mandatory">* </span><b>:</b></label>
                        <input type="text" id="lastname" name="lastname" placeholder="Surname" required>
                        <label for="email"><b>Email</b><span class="mandatory">* </span><b>:</b></label>
                        <input type="text" id="email" name="email" placeholder="Email" required>

                        <label for="gender"><b>Gender:</b></label>
                        <select name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        <label for="birthday"><b>Birthday</b><span class="mandatory">* </span><b>:</b></label>
                        <input type="date" id="birthday" name="birthday" required>

                        <label for="teachers"><b>Teacher:</b></label>
                        <select name="teachers" id="teachers" value="<?=$teachers[0]->firstname?>" required>
                            <?php foreach ($teachers as $teacher):
                                if($teacher->idTeachers== session()->id): ?>
                                    <option value="<?=$teacher->idTeachers?>" selected><?=$teacher->firstname?></option>
                                    <?php else:?>
                                    <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select>

                        <label for="handSelection"><b>Hand Selection:</b></label>
                        <select name="handSelection" id="handSelection" required>
                            <option value="One Hand, right hand">Right Hand</option>
                            <option value="One Hand, left hand">Left Hand</option>
                            <option selected="selected" value="Both Hands">Both Hands</option>
                        </select>

                        <label for="active"><b>Active:</b></label>
                        <label class="switch">
                            <input type="checkbox" id="active" name="active" checked>
                            <span class="slider"></span>
                        </label>
                        <span class="mandatory manText">*Mandatory Fields</span>
                    </div>
                </div>

                <div class="notes">
                    <label for="notes"><h3>Notes</h3></label>
                    <textarea id="notes" name="notes" rows="12" maxlength="1000" placeholder="Type here."></textarea>
                </div>
            </div>

            <div class="bottomBar">
                <input type="submit" value="Submit" class="button buttonPrimary buttonExpert">
            </div>
        </form>
    </div>

<?= $this->endSection() ?>