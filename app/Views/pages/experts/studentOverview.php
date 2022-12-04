<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>


<?php foreach ($students as $person):?>
<?php  if ($person->idStudents==$idStudents):?>

<h1> <?= $person->firstname?> </h1>
<section>
    <h3>First name= <?= $person->firstname?></h3>
    <h3>Last name= <?= $person->lastname?></h3>
    <?php if ($person->gender==1):?>

        <h3>Gender= male</h3>

    <?php endif;?>
    <?php if ($person->gender==0):?>

        <h3>Gender= female</h3>

    <?php endif;?>
    <h3>birthday= <?= $person->birthday?></h3>
    <h3>teacher= <?= $person->teacherFirstname?></h3>
    <?php if ($person->handSelection==1):?>

        <h3>Hand selection= One Hand</h3>

    <?php endif;?>
    <?php if ($person->handSelection==0):?>

        <h3>Hand selection= Both Hands</h3>

    <?php endif;?>
    <?php if ($person->isActive==1):?>

        <h3>Active= currently active</h3>

    <?php endif;?>
    <?php if ($person->isActive==0):?>

        <h3>Active= not active</h3>

    <?php endif;?>

    <h1>Notes</h1>
    <h3><?=$person->notes ?></h3>

</section>

<section>

    <a href= "<?php echo base_url('experts/editStudentPage/'.$person->idStudents);?>">
        <button class="btn btn-primary btn-lg">EDIT</button>
    </a>
</section>
<?php endif;?>
<?php endforeach;?>

<?= $this->endSection() ?>



