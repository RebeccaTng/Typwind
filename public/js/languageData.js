//Translation JS files to be adapted at the end

const langEl = document.querySelector('.langWrap');
const link = document.querySelectorAll('a');
const homeEl = document.querySelector('.home');
const exercisesEl = document.querySelector('.exercises');
const logoutEl = document.querySelector('.download');
const studentsEl = document.querySelector('.students');
const profileEl = document.querySelector('.profile');

link.forEach(el => {
    el.addEventListener('click', () => {
        langEl.querySelector('.active').classList.remove('active');
        el.classList.add('active');
        const attr = el.getAttribute('language');

        //In both Student & Expert Pages
        homeEl.textContent = mainData[attr].home;
        exercisesEl.textContent = mainData[attr].exercises;
        logoutEl.textContent = mainData[attr].download;

        //Only in Expert Pages
        studentsEl.textContent = mainData[attr].students;
        profileEl.textContent = mainData[attr].profile;

    });
});

$("document").ready(function() {
    document. getElementById('active').click();

});

var mainData = {
    "nederlands":
        {
            "home" : "Startpagina",
            "students" : "Studenten",
            "exercises" : "Oefeningen",
            "profile" : "Mijn Profiel",
            "download" : "Uitloggen"
        },

"english":
{
    "home" : "Home",
    "students" : "Students",
    "exercises" : "Exercises",
    "profile" : "My Profile",
    "download" : "Log Out"
}
}


