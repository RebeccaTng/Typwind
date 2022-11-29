<h3 class="text-center">
    <img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle">
</h3>
<section>
    <h2 class="text-center">Welcome Back</h2>
    <h3 class="text-center">
        <?php
        $session = session();
        echo $session->firstname; echo "!";
        ?>

        <br>
        <br>
        Your next exercise is waiting for you!
        <br>
        <br>
        The Adventure of the Dog.
        <br>
        <br>
        <button type="button">Start new exercise</button>

    </h3>

</section>
