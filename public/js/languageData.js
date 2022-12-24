//Translation data
var mainData = {
    "nederlands":
        {
            "Home" : "Startpagina",
            "Students" : "Studenten",
            "Exercises" : "Oefeningen",
            "Profile" : "Mijn Profiel",
            "logout" : "Uitloggen",
            "two" : "Welkom Terug",
            "three" : "Jouw volgende oefening wacht op je!",
            "four" : "Start nieuwe oefening",
            "five" : "Het avontuur van de hond",
            "six" : ""
        },

    "english":
        {
            "Home" : "Home",
            "Students" : "Students",
            "Exercises" : "Exercises",
            "Profile" : "My Profile",
            "logout" : "Log Out",
            "two" : "Welcome Back",
            "three" : "Your next exercise is waiting for you!",
            "four" : "Start new exercise",
            "five" : "The Adventure of the Dog.",
            "six" : ""
        }
}

const langEl = document.querySelector('.langWrap');
const link = document.querySelectorAll('a');
const homeEl = document.querySelector('.Home');
const exercisesEl = document.querySelector('.Exercises');
const logoutEl = document.querySelector('.logout');
const studentsEl = document.querySelector('.Students');
const profileEl = document.querySelector('.Profile');
const two = document.querySelector('.two');
const three = document.querySelector('.three');
const four = document.querySelector('.four');
const five = document.querySelector('.five');
const six = document.querySelector('.six');


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
        homeEl.textContent = mainData[attr].Home;
        exercisesEl.textContent = mainData[attr].Exercises;
        logoutEl.textContent = mainData[attr].logout;

        //Only in Expert Pages
        studentsEl.textContent = mainData[attr].Students;
        profileEl.textContent = mainData[attr].Profile;

        //Only in Student Pages
        two.textContent = mainData[attr].two;
        three.textContent = mainData[attr].three;
        four.textContent = mainData[attr].four;
        five.textContent = mainData[attr].five;
        /*six.textContent = mainData[attr].six;*/
        
    });
});

$("document").ready(function() {
    document. getElementById('active').click();
});