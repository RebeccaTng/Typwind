<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>You are welcome, <?= $firstname ?> </h1>

<h1>show students:</h1>
<form action="http://localhost/PHP/public/getStudents/" method="get" onsubmit="getStudents()">
    <label for="idTeacher">id teacher:</label><br>
    <input type="text" id="idTeacher" name="idTeacher"><br>
    <input type="submit" value="Submit">
</form>


<h1>add student:</h1>
<form action="http://localhost/PHP/public/addStudent" method="post" onsubmit="addStudent()">
    <label for="idTeacher">idTeacher:</label>
    <input type="text" id="idTeacher" name="idTeacher">
    <label for="firstname">firstname:</label>
    <input type="text" id="firstname" name="firstname">
    <label for="lastname">lastname:</label>
    <input type="text" id="lastname" name="lastname">
    <label for="email">email:</label>
    <input type="text" id="email" name="email">
    <label for="password">password:</label>
    <input type="text" id="password" name="password">
    <label for="birthday">birthday:</label>
    <input type="text" id="birthday" name="birthday">
    <input type="submit" value="Submit">
</form>


<h1>add teacher:</h1>
<form action="http://localhost/PHP/public/addTeacher" method="post" onsubmit="addTeacher()">

    <label for="firstname">firstname:</label>
    <input type="text" id="firstname" name="firstname">
    <label for="lastname">lastname:</label>
    <input type="text" id="lastname" name="lastname">
    <label for="email">email:</label>
    <input type="text" id="email" name="email">
    <label for="password">password:</label>
    <input type="text" id="password" name="password">
    <input type="submit" value="Submit">
</form>

<h1>get teacher:</h1>
<form action="http://localhost/PHP/public/getTeacher/" method="get" onsubmit="getTeacher()">
    <label for="idTeachers">id teacher:</label><br>
    <input type="text" id="idTeachers" name="idTeachers"><br>
    <input type="submit" value="Submit">
</form>






</body>
</html>