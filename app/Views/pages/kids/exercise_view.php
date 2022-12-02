
<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<div onload="displayNextSentenceFunction()">
    <div class="container">
        <h1>Title</h1>
        <button id="stopButton">STOP & EXIT</button>
    </div>
    <div class="exercise">
        <div id="exerciseBoxText"></div>
        <img src="<?=base_url()?>/app/Views/keyboard.jpg" alt="Keyboard">
        <input id="exerciseBoxInput">
        <p id="currentInputFeedBack"></p>
    </div>
    <script type="text/javascript" src="<?=base_url()?>/js/exercise_view.js"></script>
</div>
<?= $this->endSection() ?>
