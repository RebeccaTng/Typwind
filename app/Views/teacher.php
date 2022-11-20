
<table id="teacher">



    <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
    </tr>
    <?php foreach ($teacher as $te): ?>
        <tr>
            <td><?=$te->idTeachers?></td>
            <td><?=$te->firstname?></td>
            <td><?=$te->lastname?></td>
            <td><?=$te->email?></td>
        </tr>
    <?php endforeach; ?>
</table>