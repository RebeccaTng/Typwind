<header>
    <div id="logo">
        <h1 class="test"> My Profile</h1>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
        </div>
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
                Active: To Be Included in code
            </p>
            <h3 class="text-center">
            <button class="btn btn-success" onclick="location.href='<?=base_url()?>/public/editExpert';"> Edit </button>
            </h3>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>