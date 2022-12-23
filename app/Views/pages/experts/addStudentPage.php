<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('/experts/studentsList');?>">Students</a></li>
        <li>Add Student</li>
    </ul>

    <h1>Add Student</h1>

    <form action= "<?php echo base_url('experts/addStudent');?>" method="post">

        <label for="firstname">firstname:</label>
        <input type="text" id="firstname" name="firstname"><br><br>
        <label for="lastname">lastname:</label>
        <input type="text" id="lastname" name="lastname"><br><br>
        <label for="email">email:</label>
        <input type="text" id="email" name="email"><br><br>
        <label for="password">password:</label>
        <input type="text" id="password" name="password"><br><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <label for="birthday">birthday:</label>
        <input type="date" id="birthday" name="birthday"><br><br>

        <label for="teachers">Teacher:</label>
        <select name="teachers" id="teachers" value="<?=$teachers[0]->firstname?>">
            <?php foreach ($teachers as $teacher):?>
                <option value="<?=$teacher->idTeachers?>"> <?=$teacher->firstname?> </option>
            <?php endforeach;?>
        </select><br><br>

        <label for="handSelection">Hand Selection:</label>
        <select name="handSelection" id="handSelection">
            <option value="One Hand, right hand">One Hand, right hand</option>
            <option value="One Hand, left hand">One Hand, left hand</option>
            <option value="Both Hands">Both Hands</option>
        </select><br><br>

        <label for="active">Active</label>
        <input type="checkbox" id="active" name="active"<br><br>

        <input type="submit" value="Add student">
    </form>

<?= $this->endSection() ?>