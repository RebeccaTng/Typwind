
<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>
<h3 class="text-center">
    <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
</h3>
<section>
    <h2 class="text-center">Welcome Back,</h2> <br>
    <h3 class="text-center">
        Emily Wauters <?php
        $session = session();
        echo $session->get('name')
        ?>
    </h3>
</section>

<section>
    <h1>show students:</h1>

    <a href= <?php echo base_url('experts/studentsList');?>>
        <button class="btn btn-primary btn-lg">Show students</button>
    </a>
</section>

<section>
    <h1>show profile:</h1>
    <form action= <?php echo base_url('experts/profile');?>"method="get">
        <label for="idTeachers">id teacher:</label><br>
        <input type="text" id="idTeachers" name="idTeachers"><br>
        <input type="submit" value="Submit">
    </form>

</section>
<?= $this->endSection() ?>


