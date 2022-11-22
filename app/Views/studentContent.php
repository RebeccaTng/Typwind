<?php

class expert
{
    public $FirstName= "Emily";
    public $SurName = "Pauwels";
    public $Email = "Emily.Pauwels@hotmail.com";
    public $Active = "Currently Active";
}

$Emily= new expert;

/*if(isset($_POST)){
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    p
    // do whatever we want with the users array.
}*/?>

<header>
    <div id="logo">
        <h1 class="test"> @Naam Plaats </h1>
    </div>
</header>

<!--<span id="name"></span>
<script type="text/javascript">
    let name = "Nathan";
    document.getElementById("name").innerHTML = name;

</script>-->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
            <h3 class="text-center">
                <?php echo $Emily->FirstName; echo " "; echo $Emily->SurName . "<br>" ?>
            </h3>
            <h4 class="text-center"> General Information </h4>
            <p class="text-center">
                FirstName: <?php echo $Emily->FirstName. "<br>" ?>
                SurName: <?php echo $Emily->SurName. "<br>" ?>
                Email: <?php echo $Emily->Email. "<br>" ?>
                Active: <?php echo $Emily->Active. "<br>" ?>
            </p>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>