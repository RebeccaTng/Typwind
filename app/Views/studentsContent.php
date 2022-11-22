<header>
    <div id="logo">
        <h1 class="test">Students</h1>
    </div>
</header>

<section>
    <h2>Welcome to the Studentspage</h2>
    <h3>Here needs to be a queried list of all the students</h3>
    <h4>The queried list now is a locally stored Array List.</h4>

    <p>
        <?php foreach ($students as &$person):?>
        <a href="<?=base_url()?>/public/student" class='studentje'><li><?=$person['name']?></li></a>
    <?php endforeach;?>
    </p>
</section>