<?php

class expert
{
    public $FirstName= "Peter";
    public $SurName = "Willenbroek";
    public $Email = "Peter.Willenbroek@hotmail.com";
    public $Active = "Currently Active";
}

$Emily= new expert;

/*if(isset($_POST)){
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    p
    // do whatever we want with the users array.
}*/?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>
                <h1 class="test"> <?php echo $Emily->FirstName; echo " "; echo $Emily->SurName . "<br>" ?> </h1>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <h3>
                General Information
            </h3>
            <div class="row">
                <div class="col-md-5">
                    <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle"><img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg">
                </div>
                <div class="col-md-7">
                    <p>
                        FirstName: <?php echo $Emily->FirstName. "<br>" ?>
                        SurName: <?php echo $Emily->SurName. "<br>" ?>
                        Gender:<br>
                        Birthday:<br>
                        Teacher:<br>
                        Hand Selection:<br>
                        Active: <?php echo $Emily->Active. "<br>" ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h3>
                Notes
            </h3>
            <p>
                - Child with severe CVI. <br>
                - Does not perform well under pressure and needs a calm and stress-free environment. <br>
            </p>

        </div>
    </div>
</div>
<h4 class="text-right">
    <button class="btn btn-success" onclick="location.href='<?=base_url()?>/public/editStudent';"> Edit </button>
</h4>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>