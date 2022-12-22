<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<?php //if (! empty($exercises) && is_array($exercises)):
//    $lesson = 0;
//    ?>
<!---->
<!--    --><?php //foreach ($exercises as $exercise_item): ?>
<!---->
<!--    <ul>-->
<!---->
<!--        --><?php
//        if ($exercise_item->lesson != $lesson) {
//            $exercise_above_index=$exercise_item->lesson+1;
//            $exercise_under_index=$exercise_item->lesson-1;
//
//            if($exercise_above_index>2) {
//                echo '<p><a href="#lesson' . $exercise_item->lesson . '"><img alt="Arrow Down Icon" src="' . base_url() . '/public/assets/icons/down.png"></a></p>';
//            }
//
//            if($exercise_above_index>2){
//                echo '<section id="lesson' . $exercise_item->lesson . '">' .
//                    '<p><a href="#lesson' . $exercise_under_index . '">' .
//                    '<img alt="Arrow Up Icon" src="' . base_url() . '/public/assets/icons/up.png"></a></p>
//                    </section>';
//            }
//
//            if($exercise_above_index=2){
//                echo '<section id="lesson' . $exercise_item->lesson . '">' .'
//                        </section>';
//            }
//
//            echo '<section id=Lesson'.$exercise_item->lesson. '>'.
//                "<h2>". "Lesson ".$exercise_item->lesson. "</h2>".
//                "</section>";
//        }
//        $lesson = $exercise_item->lesson;
//        ?>
<!---->
<!--        --><?php //= esc($exercise_item->name);
//        echo '<br>';
//
//         if (isset($exercise_item->score)) {
//            echo ' Score:' . $exercise_item->score;
//        }
//        ?>
<!--    </ul>-->
<!---->
<?php //endforeach ?>
<?php //else: ?>
<!---->
<!--    <h3>No Exercises</h3>-->
<!--    <p>Unable to find any exercises for you.</p>-->
<!---->
<?php //endif ?>

<script>
    $(document).ready(function(){

        let lessonsList = <?php echo $exercises; ?>;

        const lessonsMap = new Map();

        for (let i = 0; i < lessonsList.length; i++) {
            if(lessonsMap.has(lessonsList[i].lesson)){
                lessonsMap.get(lessonsList[i].lesson).push(lessonsList[i])
            }
            else{
                lessonsMap.set(lessonsList[i].lesson,[])
            }
        }

        console.log(lessonsMap.get("1"))
        const iterator1 = lessonsMap.keys();
        for (const item of iterator1) {
            const lessonGroup = item.get()
            console.log(typeof lessonGroup)
            let exercisesText =  "<br><br><div>"
            lessonGroup.forEach(element =>exercisesText= exercisesText+ "<p>"+element.name+"</p><br>");
            exercisesText= exercisesText+ "<br><br><div>"
            $(".mainContent").append(exercisesText);
        }


        // var txt1 = "<p>"+lessonsList[0].idExercises+"</p>";               // Create element with HTML 
        // var txt2 = $("<p></p>").text("Text.");   // Create with jQuery
        // var txt3 = document.createElement("p");  // Create with DOM
        // txt3.innerHTML = "Text.";


    });
</script>

<?php
$_SESSION["selectedExercise"] = 2; // @loic you need to set this variable in the session to select the correct exercise!
?>

<?= $this->endSection() ?>
