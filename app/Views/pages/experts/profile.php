<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<?php foreach ($teachers as $person):?>
    <?php  if ($person->idTeachers==$idTeachers):?>

        <h1> <?= $person->firstname?> </h1>
        <section>
        <h3>First name= <?= $person->firstname?></h3>
        <h3>Last name= <?= $person->lastname?></h3>
        <h3>Email= <?= $person->email?></h3>
        <?php if ($person->isActive==1):?>

            <h3>Active= currently active</h3>

        <?php endif;?>
        <?php if ($person->isActive==0):?>

            <h3>Active= not active</h3>

        <?php endif;?>
        </section>

        <section>
            <a href="<?php echo base_url('experts/editProfilePage/'.$person->idTeachers);?>">
                <button class="btn btn-primary btn-lg">EDIT</button>
            </a>
        </section>
    <?php endif;?>
<?php endforeach;?>



<?= $this->endSection() ?>