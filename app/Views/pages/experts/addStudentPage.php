<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php setcookie("currentPage","expertAddStudent", time()+36000, "/");?>

    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
        <li>Add Student</li>
    </ul>

    <h1>Add Student</h1>

    <div class="scroller">
        <div class="studentContainer">
            <div class="infoContainer">
                <div class="general">
                    <h3>General Information</h3>
                    <?php if(isset(session()->validation)):?>
                        <div class="errorMessage">
                            <p>
                                <?= session()->validation->listErrors() ?>
                            </p>
                        </div><br>
                    <?php endif;?>
                    <form action= "<?php echo base_url('ExpertController/storeStudent');?>" method="post">
                    <div class="generalFields">
                        <label for="firstname"><b>First name</b><span class="mandatory">* </span><b>:</b></label  required>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                        <label for="lastname"><b>Surname</b><span class="mandatory">* </span><b>:</b></label>
                        <input type="text" id="lastname" name="lastname" placeholder="Surname" required>
                        <label for="email"><b>Email</b><span class="mandatory">* </span><b>:</b></label>
                        <input type="text" id="email" name="email" placeholder="Email" required>

                        <label for="gender"><b>Gender</b><span class="mandatory">* </span><b>:</b></label>
                        <select name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        <label for="birthday"><b>Birthday</b><span class="mandatory">* </span><b>:</b></label>
                        <input type="date" id="birthday" name="birthday" required>

                        <label for="teachers"><b>Teacher</b><span class="mandatory">* </span><b>:</b></label>
                        <select name="teachers" id="teachers" value="<?=$teachers[0]->firstname?>" required>
                            <?php foreach ($teachers as $teacher):
                                if($teacher->idTeachers== session()->id): ?>
                                    <option value="<?=$teacher->idTeachers?>" selected><?=$teacher->firstname?></option>
                                    <?php else:?>
                                    <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select>

                        <label class="explanation">Which hand(s) will they be typing with?</label>
                        <label for="handSelection"><b>Hand Selection:</b></label>
                        <select name="handSelection" id="handSelection" required>
                            <option value="One Hand, right hand">Right Hand</option>
                            <option value="One Hand, left hand">Left Hand</option>
                            <option selected="selected" value="Both Hands">Both Hands</option>
                        </select>

                        <label class="explanation">Is the child currently following the Typwind course?</label>
                        <label for="active"><b>Active:</b></label>
                        <label class="switch">
                            <input type="checkbox" id="active" name="active" checked>
                            <span class="slider"></span>
                        </label>
                        <span class="mandatory">*Mandatory fields</span>
                    </div>
                </div>

                <div class="notes">
                    <label for="notes"><h3>Notes</h3></label>
                    <p class="notesExplanation">Add some things you need to keep in mind about your student.</p>
                    <textarea id="notes" name="notes" rows="12" maxlength="1000" placeholder="Type here."></textarea>
                    <div id="the-count">
                        <span id="current">0</script></span>
                        <span id="maximum">/ 1000</span>
                    </div>
                </div>
            </div>

            <div class="bottomBar space">
                <input type="submit" value="Submit" class="button buttonPrimary buttonExpert">
                    </form>
                <a href= "<?php echo base_url('experts/studentsList');?>">
                    <button class="button buttonSecondary buttonExpert">BACK</button>
                </a>
            </div>
        </div>
    </div>
    <script>
        $('textarea').keyup(function () {

            var characterCount = $(this).val().length,
                current = $('#current'),
                maximum = $('#maximum'),
                note = $('#notes'),
                theCount = $('#the-count');


            current.text(characterCount);

            if (characterCount < 167) {
                current.css('color', '#023047');
            }
            if (characterCount > 167 && characterCount < 334) {
                current.css('color', '#5F8090');
            }
            if (characterCount > 334 && characterCount < 500) {
                current.css('color', '#5F8090');
            }
            if (characterCount > 667 && characterCount < 834) {
                current.css('color', '#F37460');
            }
            if (characterCount > 834 && characterCount < 1000) {
                current.css('color', '#FC482C');
            }

            if (characterCount >= 1000) {
                maximum.css('color', '#DE1E00');
                current.css('color', '#DE1E00');
                theCount.css('font-weight', 'bold');
            } else {
                maximum.css('color', '#023047');
                theCount.css('font-weight', 'normal');
            }
        });
    </script>
<?php session()->remove("validation") ?>

<?= $this->endSection() ?>