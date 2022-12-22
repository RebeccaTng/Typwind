<?= $this->extend('/templates/kids_default') ?>

<?= $this->section('content') ?>



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


        for (const lessonId of lessonsMap.keys()) {
            let lessonGroup = lessonsMap.get(lessonId)
            if (typeof lessonGroup !== 'undefined') {
                console.log(lessonGroup)
                let exercisesText = "<br><br><div>"
                lessonGroup.forEach(element => exercisesText = exercisesText + "<p>" + element.name + "</p><br>");
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
