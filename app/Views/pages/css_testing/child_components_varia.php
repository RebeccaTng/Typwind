
<?= $this->extend('/templates/css_default') ?>

<?= $this->section('content') ?>
<!--START OF PAGE CONTENT-->
<!--ADD HERE ALL THE PHP AND HTML THAT YOUR PAGE NEEDS-->


<!-- Messages depending on how many stars a child gets -->
<pre class="message_after_ex">Congrats, you completed an exercise!
        Try again to earn more stars :) </pre>
<pre class="message_after_ex">You earned 2 stars already!
    Try again to earn more stars :) </pre>
<pre class="message_after_ex">3 Stars! Well done!</pre>
<pre class="message_after_ex">Wow 4 stars!</pre>
<pre class="message_after_ex">Perfect score! You are a pro!</pre>

<!-- Star icons -->
<div class = "wrapper_for_stars">
    <span class="fi-sr-star checked_stars big"></span>
    <span class="fi-sr-star checked_stars big"></span>
    <span class="fi-sr-star checked_stars big"></span>
    <span class="fi-br-star unchecked_stars big"></span>
    <span class="fi-br-star unchecked_stars big"></span>
</div>

<!-- Progress bar -->
<div id="myProgress">
    <div id="myBar"></div>
</div>

<!-- Exercise button -->
<button class="exerciseButton ">Exercise Name</button>
<button class="exerciseButton ">Exercise Name is the following</button>

<!-- Stars on exercise button -->

<button class="exerciseButton ">Exercise Name
    <div class = "stars_on_exercise">
        <div class = "wrapper_for_stars">
            <span class="fi-sr-star checked_stars small"></span>
            <span class="fi-sr-star checked_stars small"></span>
            <span class="fi-sr-star checked_stars small"></span>
            <span class="fi-br-star unchecked_stars small"></span>
            <span class="fi-br-star unchecked_stars small"></span>
        </div>
    </div>
</button>


<!--END OF PAGE CONTENT-->
<?= $this->endSection() ?>
