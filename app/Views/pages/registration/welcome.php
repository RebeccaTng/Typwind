<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> User Registration</title>
</head>
<body>
<h2 class="text-center">Typwind</h2>
<h3 class="text-center">Welcomes you!</h3>

<h5 class="text-center">Are you a student or a teacher?</h5>

<div class="d-grid">

    <button id="teacher" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" title="Look at profile" class="btn btn-dark">TEACHER</button>
</div>

<br>

<div class="d-grid">
    <button id="student" onclick="window.location= '<?=base_url()?>/registration/studentLogin'" class="btn btn-dark">STUDENT</button>
</div>

</body>
</html>