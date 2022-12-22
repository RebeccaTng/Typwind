//Translation data
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

const langEl = document.querySelector('.langWrap');
const link = document.querySelectorAll('a');
const homeEl = document.querySelector('.home');
const exercisesEl = document.querySelector('.exercises');
const logoutEl = document.querySelector('.download');
const studentsEl = document.querySelector('.students');
const profileEl = document.querySelector('.profile');

// BASIC Cookie function
// for now we use this one

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// ADVANCED Cookie function
// if more options would be required
// (secure cookies for secure HTTP connection, samesite to prevent XSRF attacks, ...)

function setCookie2(name, value, options = {}) {

    options = {
        path: '/',
        // add other defaults here if necessary
        ...options
    };

    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }

    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }
    document.cookie = updatedCookie;
}

link.forEach(el => {
    el.addEventListener('click', () => {

        langEl.querySelector('.active').classList.remove('active');
        el.classList.add('active');
        const attr = el.getAttribute('language');

        if(attr === 'nederlands') {
            setCookie('nederlandsActief',"active", 30);
            setCookie('englishActive',"not active", 30);
        }

        if(attr === 'english') {
            setCookie('nederlandsActief',"not active", 30);
            setCookie('englishActive',"active", 30);
        }
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