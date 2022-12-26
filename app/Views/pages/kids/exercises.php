<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<input type="hidden" id="URL" name="URL" value="<?php echo base_url();?>/kids/intro/">

<script>
    var URL = document.getElementById("URL").value;
    $(document).ready(function(){

        let lessonsList = <?php echo json_encode($exercises); ?>;

        let scores = <?php echo json_encode($scores); ?>;



        const lessonsMap = new Map();

        for (let i = 0; i < lessonsList.length; i++) {
            if(lessonsMap.has(lessonsList[i].lesson)){
                lessonsMap.get(lessonsList[i].lesson).push(lessonsList[i])
            }
            else{
                lessonsMap.set(lessonsList[i].lesson,[])
            }
        }


        for (const lessonId of lessonsMap.keys()) {
            let lessonGroup = lessonsMap.get(lessonId)
            if (typeof lessonGroup !== 'undefined') {
                console.log(lessonGroup)
                let exercisesText = "<div class='card lessonCard'> <h2>"+"Lesson "+lessonId +"</h2>"
                lessonGroup.forEach(element => exercisesText = exercisesText + "<a href= \"" + URL + element.idExercises + "\">" +"<h4 class='exerciseField'>"+ element.name
                    +"</h4></a>"
                    + "<div class = \"wrapper_for_stars\">"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div></div><br>");
                exercisesText = exercisesText + "</div>"

                $(".mainContent").append(exercisesText);
            }
            console.log("LESSON")
        }
    });
</script>

<h1>Exercises</h1>


<div class="exerciseContainer">

<?= $this->endSection() ?>
