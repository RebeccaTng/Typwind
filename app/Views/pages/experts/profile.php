<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <div class="col-md-4">
        <h3 class="text-center">
            <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
        </h3>
        <h3 class="text-center">
            <?php $session = session();
            echo $session->firstname; echo " "; echo $session->lastname . "<br>" ?>
        </h3>
        <h4 class="text-center"> General Information </h4>
        <p class="text-center">
            FirstName: <?php echo $session->firstname. "<br>" ?>
            SurName: <?php echo $session->lastname. "<br>" ?>
            Email: <?php echo $session->email. "<br>" ?>
            <?php if (session()->isActive==1):?>

        Active: Currently Active

        <?php endif;?>
        <?php if (session()->isActive==0):?>

            Active: Currently Not Active

        <?php endif;?>
        </p>

        <h3 class="text-center">
            <section>
                <a href="<?php echo base_url('experts/editProfilePage/'.session()->id);?>">
                    <button class="btn btn-primary btn-lg">EDIT</button>
                </a>
            </section>
        </h3>
    </div>

<?= $this->endSection() ?>