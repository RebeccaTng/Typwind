
<?= $this->extend('/templates/css_default') ?>

<?= $this->section('content') ?>
<!--START OF PAGE CONTENT-->
<!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->

<div class = "card_welcome_page">

    <img src="/public/assets/general/Typwind_logo_editable.svg" alt="Typwind logo" style="width:221px;height:77px;">
    <h1 style="color:var(--blueNeutral);">Welcomes you!</h1>
    <h3 style="color:var(--primary-darkest);">Are you a student or a teacher?</h3>

    <div class="teacher_student_buttons">
        <button class="button buttonExpert buttonPrimary" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" title="Look at profile" class="btn btn-dark">TEACHER</button>
        <button class="button buttonExpert buttonPrimary" onclick="window.location= '<?=base_url()?>/registration/studentLogin'" class="btn btn-dark">STUDENT</button>
    </div>

</div>



<!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>