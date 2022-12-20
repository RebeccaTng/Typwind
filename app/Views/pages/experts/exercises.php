<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>


<?php if (! empty($exercises) && is_array($exercises)):
$lesson = 0;
?>

<div style="float:right;">
    <button ><img class="arw_img" alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/down.png"> Select Lesson</button>
    <div>

        <?php foreach ($exercises as $exercise_item):
        if ($exercise_item->lesson != $lesson) {
        echo "<a href=#Lesson" .$exercise_item->lesson. ">". "Lesson ".$exercise_item->lesson. "</a>";
        }
        $lesson = $exercise_item->lesson;?>

        <?php endforeach ?>

        <?php else: ?>

            No Lessons To Show

        <?php endif ?>

    </div>
</div>

<br><br><br><br>

<section>

    <?php if (! empty($exercises) && is_array($exercises)):
        $lesson = 0;
        ?>


        <?php foreach ($exercises as $exercise_item): ?>

        <ul>

            <?php
            if ($exercise_item->lesson != $lesson) {
                echo '<section id=Lesson'.$exercise_item->lesson. '>'.
                      "<h2>". "Lesson ".$exercise_item->lesson. "</h2>".
                    "</section>";

            }
            $lesson = $exercise_item->lesson;

            ?>

            <?= esc($exercise_item->name); ?>

        </ul>

    <?php endforeach ?>

    <?php else: ?>

        <h3>No Exercises</h3>

        <p>Unable to find any exercises for you.</p>

    <?php endif ?>

</section>

<?= $this->endSection() ?>
