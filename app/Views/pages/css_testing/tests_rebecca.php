<?= $this->extend('/templates/css_default') ?>

<?= $this->section('content') ?>
    <!--START OF PAGE CONTENT-->
    <!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->

    <!-- SYSTEM DESIGN + CARD + WAVE BACKGROUND -->
    <div class="card wave">
        <h1>Title</h1>
        <h2>Heading 1</h2>
        <h3>Heading 2</h3>
        <h4>Heading 4</h4>
        <p class="smallText">Small text</p>
        <p class="bodyExText">Body explanatory text</p>
        <p class="bodyText">Body text</p>
        <p class="emphasisExText">Emphasis explanatory text</p>
        <p class="emphasisText">Emphasis text</p>
        <p class="subTitle">Subtitle</p>
        <p class="navText">Navigation text</p>
        <p class="navEmphasisText">Navigation emphasis text</p>
    </div>

    <!-- BUTTONS -->
    <button class="button buttonPrimary buttonExpert">Button Label</button>
    <button class="button buttonSecondary buttonExpert">Button Label</button>
    <button class="button buttonPrimary buttonChild">Button Label</button>
    <button class="button buttonSecondary buttonChild">Button Label</button>

    <!-- BREADCRUMB -->
    <ul class="breadcrumb bodyText">
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        <li class="emphasisText">Page 4</li>
    </ul>

    <!-- BOTTOM BAR -->
    <div class="bottomBar">
        <button class="button buttonPrimary buttonExpert">Button Label</button>
        <button class="button buttonSecondary buttonExpert">Button Label</button>
    </div>

    <!-- INPUT FIELD -->
    <input type="text" placeholder="Type Here" class="bodyText">

    <!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>