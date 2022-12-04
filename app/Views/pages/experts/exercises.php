<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>

<header>
    <div id="logo">
        <h1 class="title">Exercises</h1>
    </div>
</header>

<section>
    <?php if (! empty($exercises) && is_array($exercises)):
        $lesson = 0;
        ?>

        <?php foreach ($exercises as $exercise_item): ?>

        <ul>

            <?php
            if ($exercise_item['lesson'] != $lesson) {
                echo '<br>';
                echo '<br>';
                echo '<h3>Lesson'.$exercise_item['lesson'].'</h3>';
            }
            $lesson = $exercise_item['lesson'];
            ?>

            <li><?= esc($exercise_item['name']) ?></li>
        </ul>
    <?php endforeach ?>

    <?php else: ?>

        <h3>No Exercises</h3>

        <p>Unable to find any exercises for you.</p>

    <?php endif ?>
</section>

<?= $this->endSection() ?>
