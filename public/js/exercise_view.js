/***VARIABLES***/

let textInput = "No input from DB test tEsT tést têst tëst";
let textChar;
let currentKey = null;
let previousKey = null;
let wrongAnswered = false;
let distance = 250;
let indexSentence = 0;
let correctCharactersTyped = 0;
let correctCharactersNeeded = 0;
let correctAnswers = 0;
let mistakes = 0;
let score = 0;
let imageMap = new Map([
    [",","/public/assets/pictures/,.jpg"],
    ["=","/public/assets/pictures/=.jpg"],
    [":","/public/assets/pictures/Dubbelpunt.jpg"],
    ["a","/public/assets/pictures/Avond.jpg"],
    ["b","/public/assets/pictures/Banaan.jpg"],
    ["c","/public/assets/pictures/Circus.jpg"],
    ["d","/public/assets/pictures/Draak.jpg"],
    ["e","/public/assets/pictures/Eenwieler.jpg"],
    ["f","/public/assets/pictures/Fuut.jpg"],
    ["g","/public/assets/pictures/Gorilla.jpg"],
    ["h","/public/assets/pictures/Haas.jpg"],
    ["i","/public/assets/pictures/Insect.jpg"],
    ["j","/public/assets/pictures/Joke.jpg"],
    ["k","/public/assets/pictures/Kat.jpg"],
    ["l","/public/assets/pictures/Luipaard.jpg"],
    ["m","/public/assets/pictures/Matroos.jpg"],
    ["n","/public/assets/pictures/Natuur.jpg"],
    ["o","/public/assets/pictures/Olifant.jpg"],
    ["p","/public/assets/pictures/Pelikaan.jpg"],
    ["q","/public/assets/pictures/Quiz.jpg"],
    ["r","/public/assets/pictures/Riet.jpg"],
    ["s","/public/assets/pictures/Slang.jpg"],
    ["t","/public/assets/pictures/Tamtam.jpg"],
    ["u","/public/assets/pictures/Ufo.jpg"],
    ["v","/public/assets/pictures/Vis.jpg"],
    ["w","/public/assets/pictures/Winter.jpg"],
    ["x","/public/assets/pictures/Xylofoon.jpg"],
    ["y","/public/assets/pictures/Yogamat.jpg"],
    ["z","/public/assets/pictures/Zigzaggende.jpg"]]);


//select elements that will be used
let movableExerciseBoxText = document.getElementById("movableExerciseBoxText");
let stopButton = document.getElementById("stopButton");
let container = document.getElementById("effect");
let textBox = document.getElementById("textBox");
let imageContainer = document.getElementById("imageContainer");
let textInputDB = document.getElementById("textInput");
let handSelection = document.getElementById("handSelection");
let formDB = document.getElementById("form");
let idStudent_fkDB = document.getElementById("idStudent_fk");
let idExercise_fkDB = document.getElementById("idExercise_fk");
let scoreDB = document.getElementById("score");
let dateDB = document.getElementById("date");




/***EVENTS***/

stopButton.onclick = function (){stopButtonFunction()};
window.addEventListener('keydown', (event) =>{
    previousKey = currentKey;
    currentKey = event;
    processInputFunction()
});
window.onload = atStart;   //runs the function when the page is loaded


/***FUNCTIONS***/

/*What needs to happen when the page is loaded*/
function atStart(){
    if(textInputDB.innerText !== null) {
        textInput = textInputDB.innerText;
    }
    textChar = textInput.split("");
    correctCharactersTyped = 0;
    correctCharactersNeeded =  textChar.length;
    createSpanSentence();
    highlightCurrentLetter();
    keyboardColorsFunction(parseInt(handSelection.innerText));
}

/*Create a span element of every character*/
function createSpanSentence(){
    for(i=0;textChar.length>i;i++) {
        var s = document.createElement("SPAN");//.attributes("class","letter");
        s.setAttribute("class","letter");
        var txt = document.createTextNode(textChar[i]);
        s.appendChild(txt);
        movableExerciseBoxText.appendChild(s);
    }
    moveSentence();
}

/*Moves the sentence after being called*/
function moveSentence(){
    var valueClass = textBox.getAttribute("class");
    var value = (((document.querySelector("."+valueClass.toString())).clientWidth/4)-(correctCharactersTyped*50));
    movableExerciseBoxText.style.transform="translateX("+value+"px)";
}

/*Highlight stroked key. Currently not used but still leave it here*/
/*function highlightKey(bool){
    if(previousKey!=null){
        document.getElementById(previousKey.code).style.backgroundColor = "";
    }
    if (bool){ //in case correct input
        document.getElementById(currentKey.code).style.backgroundColor = "rgb(0, 255, 0)";
    }else{  //in case wrong input
        document.getElementById(currentKey.code).style.backgroundColor = "rgb(255, 0, 0)";
    }
}*/

/*Highlight the key that's being stroked. Undo highlight the previous one*/
function highlightKey(){
    if (currentKey!== null && document.getElementById(currentKey.code) !== null) {
        document.getElementById(currentKey.code).setAttribute("Class", (document.getElementById(currentKey.code).getAttribute("class") + " thickBorder"));
    }
    if (previousKey!== null && document.getElementById(previousKey.code) !== null){
        document.getElementById(previousKey.code).setAttribute("Class", (document.getElementById(previousKey.code).getAttribute("class").slice(0,-12)));
    }
    distance += -30;
    document.getElementById("movableExerciseBoxText").style.left = (distance+"px");
}

/*Processes the input generated by the keyboard*/
function processInputFunction() {
    let currInput = currentKey.key;
    //Input checker
    //If shift or bracketleft is pressed, it isn't processed as wrong
    if (currInput == null || currInput === "Shift" || currentKey.code === "BracketLeft") {
        highlightKey();
        // correct character
    //If input is according to needed inut
    } else if (currInput === textInput[correctCharactersTyped]) {
        correctCharactersTyped++;
        highlightKey();
    //If input is correct but previous was wrong
        if(wrongAnswered){
            highlightLetterWrong();
            mistakes++;
            wrongAnswered = false;
    //If input is correct but previous was also correct
        }else{
            highlightLetterRight();
        }
    //Checks if we're at the end of the exercise
        if(correctCharactersTyped===correctCharactersNeeded){
            exerciseFinishedFunction();
        }
   //Given input is wrong
    } else {
        highlightKey();
        wrongAnswered = true;
    }
    highlightCurrentLetter();
}

/*Function for when the exercise is finished*/
function exerciseFinishedFunction(){
    score = ((correctCharactersNeeded-mistakes)/correctCharactersNeeded);
    submit()
    stopButton.disabled = true;
}

/*Function to submit the code to the DB*/
function submit() {
    idStudent_fkDB.value = document.getElementById("idStudent_fkDB").innerText;
    idExercise_fkDB.value = document.getElementById("idExercise_fkDB").innerText;
    scoreDB.value = score;
    date = new Date()
    dateDB.value = date.getFullYear() +"-"+(date.getMonth()+1)+"-"+date.getDate();
    sessionStorage.setItem("score",score);
    formDB.submit();
}

/*Function for when the exit button is pressed*/
function stopButtonFunction(){
    window.location = window.location.origin + "/kids/home";
}

/*Function for setting the correct image. If keystroke has no image nothing happens*/
function setImage(key){
    if(key!==undefined){key = key.toLowerCase();}
    var curr = imageContainer.getElementsByTagName("img")[0];
    var s;
   if (imageMap.has(key)) {
       if (curr === undefined) {
           s = document.createElement("IMG");//.attributes("class","letter");
           s.setAttribute("class", "image");
           //s.setAttribute("src", "<?=base_url()?>"+imageMap.get(key));
           s.setAttribute("alt", key);
           s.setAttribute("src",  window.location.origin + imageMap.get(key));
           // var txt = document.createTextNode(textChar[i]);
           // s.appendChild(txt);
           imageContainer.appendChild(s);
       } else {
           s = curr;
           s.setAttribute("src", imageMap.get(key));
           s.setAttribute("alt", key);
       }
   }else if (curr !== undefined){
        curr.remove();
   }
}

/*Function for adjusting the CSS class of the given key*/
function highlightCurrentLetter() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped];
    span.setAttribute("class","letter focus");
    setImage(textInput[correctCharactersTyped])
}

/*Function for adjusting the CSS class of the given key*/
function highlightLetterWrong() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped-1];
    span.setAttribute("class","letter wrong");
    moveSentence();
}

/*Function for adjusting the CSS class of the given key*/
function highlightLetterRight() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped-1];
    span.setAttribute("class","letter");
    moveSentence();
}

/*Function for adjusting the CSS class depending if one handed or two handed keyboard is needed.
* 1= one handed right, 0= both hands and NULL= one handed left
* */
function keyboardColorsFunction(type){
    if (type === 1){ //Right hand typing
        document.getElementById("Digit1").setAttribute("class","key red");
        document.getElementById("Digit2").setAttribute("class","key red");
        document.getElementById("Digit3").setAttribute("class","key red");
        document.getElementById("Digit4").setAttribute("class","key red");
        document.getElementById("Digit5").setAttribute("class","key green");
        document.getElementById("Digit6").setAttribute("class","key yellow");
        document.getElementById("Digit7").setAttribute("class","key blue");
        document.getElementById("Digit8").setAttribute("class","key blue");
        document.getElementById("Digit9").setAttribute("class","key blue");
        document.getElementById("Digit0").setAttribute("class","key blue");
        document.getElementById("Minus").setAttribute("class","key blue");

        document.getElementById("KeyQ").setAttribute("class","key red");
        document.getElementById("KeyW").setAttribute("class","key red");
        document.getElementById("KeyE").setAttribute("class","key red");
        document.getElementById("KeyR").setAttribute("class","key red");
        document.getElementById("KeyT").setAttribute("class","key green");
        document.getElementById("KeyY").setAttribute("class","key yellow");
        document.getElementById("KeyU").setAttribute("class","key blue");
        document.getElementById("KeyI").setAttribute("class","key blue");
        document.getElementById("KeyO").setAttribute("class","key blue");
        document.getElementById("KeyP").setAttribute("class","key blue");

        document.getElementById("KeyA").setAttribute("class","key red");
        document.getElementById("KeyS").setAttribute("class","key red");
        document.getElementById("KeyD").setAttribute("class","key red");
        document.getElementById("KeyF").setAttribute("class","key red");
        document.getElementById("KeyG").setAttribute("class","key green");
        document.getElementById("KeyH").setAttribute("class","key yellow");
        document.getElementById("KeyJ").setAttribute("class","key blue");
        document.getElementById("KeyK").setAttribute("class","key blue");
        document.getElementById("KeyJ").setAttribute("class","key blue");
        document.getElementById("KeyL").setAttribute("class","key blue");
        document.getElementById("Semicolon").setAttribute("class","key blue");

        document.getElementById("KeyZ").setAttribute("class","key red");
        document.getElementById("KeyX").setAttribute("class","key red");
        document.getElementById("KeyC").setAttribute("class","key red");
        document.getElementById("KeyV").setAttribute("class","key red");
        document.getElementById("KeyB").setAttribute("class","key green");
        document.getElementById("KeyN").setAttribute("class","key yellow");
        document.getElementById("KeyM").setAttribute("class","key blue");
        document.getElementById("Comma").setAttribute("class","key blue");
        document.getElementById("Period").setAttribute("class","key blue");
        document.getElementById("Slash").setAttribute("class","key blue");


    }else if (type === 2){ //left hand typing
        document.getElementById("Digit1").setAttribute("class","key blue");
        document.getElementById("Digit2").setAttribute("class","key blue");
        document.getElementById("Digit3").setAttribute("class","key blue");
        document.getElementById("Digit4").setAttribute("class","key blue");
        document.getElementById("Digit5").setAttribute("class","key yellow");
        document.getElementById("Digit6").setAttribute("class","key green");
        document.getElementById("Digit7").setAttribute("class","key red");
        document.getElementById("Digit8").setAttribute("class","key red");
        document.getElementById("Digit9").setAttribute("class","key red");
        document.getElementById("Digit0").setAttribute("class","key red");
        document.getElementById("Minus").setAttribute("class","key red");

        document.getElementById("KeyQ").setAttribute("class","key blue");
        document.getElementById("KeyW").setAttribute("class","key blue");
        document.getElementById("KeyE").setAttribute("class","key blue");
        document.getElementById("KeyR").setAttribute("class","key blue");
        document.getElementById("KeyT").setAttribute("class","key yellow");
        document.getElementById("KeyY").setAttribute("class","key green");
        document.getElementById("KeyU").setAttribute("class","key red");
        document.getElementById("KeyI").setAttribute("class","key red");
        document.getElementById("KeyO").setAttribute("class","key red");
        document.getElementById("KeyP").setAttribute("class","key red");

        document.getElementById("KeyA").setAttribute("class","key blue");
        document.getElementById("KeyS").setAttribute("class","key blue");
        document.getElementById("KeyD").setAttribute("class","key blue");
        document.getElementById("KeyF").setAttribute("class","key blue");
        document.getElementById("KeyG").setAttribute("class","key yellow");
        document.getElementById("KeyH").setAttribute("class","key green");
        document.getElementById("KeyJ").setAttribute("class","key red");
        document.getElementById("KeyK").setAttribute("class","key red");
        document.getElementById("KeyJ").setAttribute("class","key red");
        document.getElementById("KeyL").setAttribute("class","key red");
        document.getElementById("Semicolon").setAttribute("class","key red");

        document.getElementById("KeyZ").setAttribute("class","key blue");
        document.getElementById("KeyX").setAttribute("class","key blue");
        document.getElementById("KeyC").setAttribute("class","key blue");
        document.getElementById("KeyV").setAttribute("class","key blue");
        document.getElementById("KeyB").setAttribute("class","key yellow");
        document.getElementById("KeyN").setAttribute("class","key green");
        document.getElementById("KeyM").setAttribute("class","key red");
        document.getElementById("Comma").setAttribute("class","key red");
        document.getElementById("Period").setAttribute("class","key red");
        document.getElementById("Slash").setAttribute("class","key red");
    }
}