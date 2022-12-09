<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Welcome Page</title>
</head>
<body>
<h2>Typwind</h2>
<h3>Welcomes you!</h3>

<h5>Are you a student or a teacher?</h5>

<div>

    <button id="teacher" onclick="window.location= '<?=base_url()?>/registration/expertLogin'" title="Look at profile">TEACHER</button>
</div>

<br>

<div>
    <button id="student" onclick="window.location= '<?=base_url()?>/registration/studentLogin'">STUDENT</button>
</div>

</body>
</html>