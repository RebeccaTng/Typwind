<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>

<input type="hidden" id="URL" name="testURL" value="<?php echo base_url();?>/kids/intro/">

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
                let exercisesText = "<br><br><div>"
                lessonGroup.forEach(element => exercisesText = exercisesText + "<p><a href= \"" + URL + element.idExercises + "\">" +"<h4>"+ element.name
                    +"</h4></a>"
                    + "<div class = \"wrapper_for_stars\">"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div>"
                    +    "<div class =\"unchecked_stars\"></div></div>"
                    + "</p><br>");

                exercisesText = exercisesText + "<br><br><div>"
                $(".mainContent").append(exercisesText);
            }
            console.log("LESSON")
        }
    });
</script>

<?php
$_SESSION["selectedExercise"] = 2; // @loic you need to set this variable in the session to select the correct exercise!
?>

<?= $this->endSection() ?>
