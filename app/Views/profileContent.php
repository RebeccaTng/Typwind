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

<script>
    // Sample JS object
    var obj = {FirstName: "Emily", SurName: "Pauwels", Email: "Emily.Pauwels@hotmail.com", Active: "Currently Active"};

    // Converting JS object to JSON string
    var json = JSON.stringify(obj);

    console.log(json);
    // Prints: {FirstName: "Emily", SurName: "Pauwels", Email: "Emily.Pauwels@hotmail.com", Active: "Currently Active"}
</script>

<script>
    const xhr = new XMLHttpRequest();

    xhr.open("GET", json)
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(json);
</script>

<header>
    <div id="logo">
        <h1 class="test"> My Profile</h1>
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
            <h3 class="text-center">
            <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
            </h3>
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
            <h3 class="text-center">
            <button class="btn btn-success" onclick="location.href='<?=base_url()?>/public/editExpert';"> Edit Profile </button>
            </h3>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>