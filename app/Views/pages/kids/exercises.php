
<!-- "esc(...) "It’s a global function provided by CodeIgniter to help prevent XSS attacks.-->
<br>
<br>
<br>
<?php if (! empty($exercises) && is_array($exercises)): ?>

    <?php foreach ($exercises as $exercise_item): ?>

        <h3><?= esc($exercise_item['name']) ?></h3>

        <div class="main">
            <?= esc($exercise_item['text']) ?>
        </div>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Exercises</h3>

    <p>Unable to find any exercises for you.</p>

<?php endif ?>
<br>
<br>
<br>
<br>