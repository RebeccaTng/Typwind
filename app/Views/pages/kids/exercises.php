<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php if (! empty($exercises) && is_array($exercises)):
    $lesson = 0;
    ?>

    <?php foreach ($exercises as $exercise_item): ?>

    <ul>

        <?php
        if ($exercise_item->lesson != $lesson) {
            $exercise_above_index=$exercise_item->lesson-1;
            $exercise_under_index=$exercise_item->lesson+1;

            if($exercise_above_index>0) {
                echo '<p><a href="#lesson' . $exercise_under_index . '"><img alt="Arrow Down Icon" src="' . base_url() . '/public/assets/icons/down.png"></a></p>';
            }

            if($exercise_above_index>0){
                echo '<section id="lesson' . $exercise_item->lesson . '">' .
                    '<p><a href="#lesson' . $exercise_above_index . '">' .
                    '<img alt="Arrow Up Icon" src="' . base_url() . '/public/assets/icons/up.png"></a></p>
                    </section>';
            }

            echo '<section id=Lesson'.$exercise_item->lesson. '>'.
                "<h2>". "Lesson ".$exercise_item->lesson. "</h2>".
                "</section>";
        }
        $lesson = $exercise_item->lesson;
        ?>

        <?= esc($exercise_item->name);
        echo '<br>';

         if (isset($exercise_item->score)) {
            echo ' Score:' . $exercise_item->score;
        }
        ?>
    </ul>

<?php endforeach ?>
<?php else: ?>

    <h3>No Exercises</h3>
    <p>Unable to find any exercises for you.</p>

<?php endif ?>

<?= $this->endSection() ?>
