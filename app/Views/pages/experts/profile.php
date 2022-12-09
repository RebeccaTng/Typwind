<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

    <div>
        <h3>
            <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg">
        </h3>
        <h3>
            <?php $session = session();
            echo $session->firstname; echo " "; echo $session->lastname . "<br>" ?>
        </h3>
        <h4> General Information </h4>
        <p>
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

        <h3>
            <section>
                <a href="<?php echo base_url('experts/editProfilePage/'.session()->id);?>">
                    <button>EDIT</button>
                </a>
            </section>
        </h3>
    </div>

<?= $this->endSection() ?>