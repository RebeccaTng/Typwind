<?= $this->extend('/templates/experts_default') ?>

<?= $this->section('content') ?>


<header>
    <div id="logo">
        <h1 class="title">Exercises</h1>
    </div>
</header>

<div class="main">
    <section id="section1">
        <div class="container jumbo">
            <div class="jumbotron">
                <h2>Lesson X</h2>
                <p>Exercises Y</p>
                <p><a class="btn btn-primary btn-lg" href="#section2"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/down.png"></a></p>
            </div>
    </section>

    <section id="section2">
        <div class="container jumbo">
            <div class="jumbotron">
                <p><a class="btn btn-primary btn-lg" href="#section1"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/up.png"></a></p>
                <h2>Lesson X</h2>
                <p>Exercises Y</p>
                <p><a class="btn btn-primary btn-lg" href="#section3"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/down.png"></a></p>
            </div>
    </section>

    <section id="section3">
        <div class="container jumbo">
            <div class="jumbotron">
                <p><a class="btn btn-primary btn-lg" href="#section2"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/up.png"></a></p>
                <h2>Lesson X</h2>
                <p>Exercises Y</p>
                <p><a class="btn btn-primary btn-lg" href="#section4"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/down.png"></a></p>
            </div>
    </section>

    <section id="section4">
        <div class="container jumbo">
            <div class="jumbotron">
                <p><a class="btn btn-primary btn-lg" href="#section3"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/up.png"></a></p>
                <h2>Lesson X</h2>
                <p>Exercises Y</p>
                <p><a class="btn btn-primary btn-lg" href="#section5"><img alt="Arrow Down Icon" src="<?=base_url()?>/public/assets/icons/down.png"></a></p>
            </div>
    </section>

    <section id="section5">
        <div class="container jumbo">
            <div class="jumbotron">
                <h2>Lesson X</h2>
                <p>Exercises Y</p>
            </div>
    </section>
</div>

<!--<section>
    <?php /*if (! empty($exercises) && is_array($exercises)):
        $lesson = 0;
        */?>

        <?php /*foreach ($exercises as $exercise_item): */?>

        <ul>

            <?php
/*            if ($exercise_item['lesson'] != $lesson) {
                echo '<br>';
                echo '<br>';
                echo '<h3>Lesson'.$exercise_item['lesson'].'</h3>';
            }
            $lesson = $exercise_item['lesson'];
            */?>

            <li><?/*= esc($exercise_item['name']) */?></li>
        </ul>
    <?php /*endforeach */?>

    <?php /*else: */?>

        <h3>No Exercises</h3>

        <p>Unable to find any exercises for you.</p>

    <?php /*endif */?>
</section>-->

<?= $this->endSection() ?>
