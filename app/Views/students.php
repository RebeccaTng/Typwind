<table id="students">



    <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Birthday</th>
    </tr>
    <?php foreach ($students as $st): ?>
        <tr>
            <td><?=$st->idStudents?></td>
            <td><?=$st->firstname?></td>
            <td><?=$st->lastname?></td>
            <td><?=$st->email?></td>
            <td><?=$st->birthday?></td>
        </tr>
    <?php endforeach; ?>

</table>

