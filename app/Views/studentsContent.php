<section>
    <h2>Welcome to the <?=$title?>page</h2>
    <h3>Here needs to be a queried list of all the students</h3>
    <h4>The queried list now is a locally stored Array List.</h4>

    <p>
        <?php foreach ($students as &$person):?>
    <li><?=$person['name']?></li>
    <?php endforeach;?>
    </p>
</section>