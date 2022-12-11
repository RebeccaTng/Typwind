<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>
<br>
<br>
<br>

<div class="dropdown" style="float:right;">
    <button class="dropbtn" ><img class="arw_img" alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/down.png"> Select Lesson</button>
    <div class="dropdown-content">
        <?php if (! empty($exercises) && is_array($exercises)):
        $lesson = 0;
        ?>

        <?php foreach ($exercises as $exercise_item):
        if ($exercise_item->lesson != $lesson) {
        echo "<a href=#Lesson " .$exercise_item->lesson. ">". "Lesson ".$exercise_item->lesson. "</a>";
        }
        $lesson = $exercise_item->lesson;?>

        <?php endforeach ?>

    </div>
</div>

<br><br><br><br>

<div>
    <section id="section1">
        <div>
            <div>
                <h2>Lesson 1</h2>
                <p>Exercises Y</p>
            </div>
    </section>

    <section id="section2">
        <div>
            <div>
                <h2>Lesson 2</h2>
                <p>Exercises Y</p>
            </div>
    </section>

    <section id="section3">
        <div>
            <div>
                <h2>Lesson 3</h2>
                <p>Exercises Y</p>
            </div>
    </section>

    <section id="section4">
        <div>
            <div>
                <h2>Lesson 4</h2>
                <p>Exercises Y</p>
            </div>
    </section>

    <section id="section5">
        <div>
            <div>
                <h2>Lesson 5</h2>
                <p>Exercises Y</p>
            </div>
    </section>
</div>

<section>

    <?php if (! empty($exercises) && is_array($exercises)):
        $lesson = 0;
        ?>

        <?php foreach ($exercises as $exercise_item): ?>

        <ul>

            <?php
            if ($exercise_item->lesson != $lesson) {
                echo '<br>';
                echo '<br>';
                echo '<h3>Lesson'.$exercise_item->lesson.'</h3>';
                echo "<a href= Lesson " .$exercise_item->lesson. ">". "Lesson ".$exercise_item->lesson. "</a>";
                echo '<br>';

            }
            $lesson = $exercise_item->lesson;
            ?>

            <?= esc($exercise_item->name) ?>
        </ul>
    <?php endforeach ?>

    <?php else: ?>

        <h3>No Exercises</h3>

        <p>Unable to find any exercises for you.</p>

    <?php endif ?>
</section>

<br>
<br>
<br>
<br>


<?= $this->endSection() ?>
