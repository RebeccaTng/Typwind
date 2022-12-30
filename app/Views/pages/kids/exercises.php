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
                lessonsMap.get(lessonsList[i].lesson).push(lessonsList[i])
            }
        }


        for (const lessonId of lessonsMap.keys()) {
            let lessonGroup = lessonsMap.get(lessonId)
            if (typeof lessonGroup !== 'undefined') {
                console.log(lessonGroup)
                let exercisesText = "<div class='card lessonCardChild'> <h2>"+"Lesson "+lessonId +"</h2>"
                lessonGroup.forEach(element => exercisesText =
                    exercisesText
                    + "<a style = 'text-decoration: none;'href= \"" + URL + element.idExercises + "\">"
                    +"<button class='exerciseButton'>"+ element.name
                    +"<div class = 'stars_on_exercise'>"
                    +"<div class = 'wrapper_for_stars'>"
                    +"<div class ='checked_stars small'></div>"
                    +"<div class ='checked_stars small'></div>"
                    +"<div class ='checked_stars small'></div>"
                    +"<div class ='unchecked_stars small'></div>"
                    +"<div class ='unchecked_stars small'></div>"
                    +"</div>"
                    +"</div>"
                    +"</button>"
                    + "</a>");
                exercisesText = exercisesText + "</div>"

                $(".exerciseContainer").append(exercisesText);
            }
            console.log("LESSON")
        }
    });
</script>

<h1>Exercises</h1>


<div class="exerciseContainer">
</div>

<?= $this->endSection() ?>
