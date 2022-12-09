textInput = "TeSt"
    // "Internationale connecties" +
    // "De volledige opleiding tot Master in de Industriële Wetenschappen kan vanaf het eerste bachelorjaar naast in het Nederlands ook in het Engels gevolgd worden. Daarbij kunnen studenten die zich in het Nederlandstalige programma inschrijven naar keuze ook vakken in het Engels volgen. De Campus Groep T telde in het academiejaar 2019-2020 meer dan 150 eerstejaarsstudenten in de Engelstalige richting. Deze komen uit China, de landen van Zuidoost-Azië (Laos, Vietnam, Cambodja), India, het Midden-Oosten, Afrika, maar ook uit verschillende Europese landen, in het bijzonder landen uit het voormalige oostblok en landen van de voormalige Sovietunie. Docenten van IIW geven regelmatig gastcursussen aan verschillende universiteiten in het verre oosten, waarmee de faculteit samenwerkingsverbanden heeft, zoals de Beijing Jiaotong Universiteit en de Technische Universiteit Zhejiang." +
    //  +
    // "Formula Student Competitions" +
    // "Formula Electric Belgium (FEB) is een team van een 25-tal ingenieurs studenten dat ieder jaar meedoet aan de grootste engineering competities ter wereld. In deze competitie moet er een Formula Student wagen gebouwd worden. Het FEB team neemt deel aan de EV categorie. Deze wagen wordt ontworpen en gebouwd in negen maanden, waarna de competities gedurende de zomervakanties georganiseerd worden over heel Europa; van de Hockenheimring in Duitsland tot de Hungaroring in Hongarije. In 2021-2022 behaalde het team een 2de plaats op Efficiency, een 5de plaats op endurance met de nieuwste elektrische racewagen, Titan." +
    // +
    // "Solar Challenge" +
    // "Met het Solar Team neemt een team van studenten om de twee jaar deel aan de World Solar Challenge, het officieuze wereldkampioenschap voor zonnewagens." +
    //  +
    // "De geschiedenis van deze wedstrijden kan teruggevonden worden op de pagina van het Solar Team." +
    //  +
    // "In 2018 behaalde het team de eerste plaats in de Carrera Solar Atacama met de Punch Two." +
    // +
    // "In 2019 ontwikkelde het team de achtste Belgische zonnewagen, genaamd BluePoint. In datzelfde jaar werd het Belgische team met de nieuwe wagen voor het eerst in de geschiedenis wereldkampioen op de Bridgestone World Solar Challenge in Australië. De Belgen konden op het laatste traject het Vattenfal Solar Team (TU Delft), voormalig wereldkampioen en tevens hun enige voorligger, inhalen. Die laatsten moesten noodgedwongen stoppen nadat hun wagen uitbrandde.[1]";
    //"push Failure. wake up with determination push Failure. wake up with determination";
    //"abcdefghijklmnopqrstuvwxyz,;:";
    //" Go to bed with satisfaction. It's going to be hard, but hard does not mean impossible. Learning never exhausts the mind. The only way to do great work is to love what you do.";
textArray = textInput.split(". ");
textArray.forEach(addDotFucntion);
textArrayChar =textArray[0].split('');

textChar = textInput.split(""); //Every char is a separeted element in an array


//variables
indexSentence = 0;
correctCharactersTyped = 0;
correctCharactersNeeded = 0;
mistakes = 0;
startDate = Date();
endDate = null;
score = null;
currentKey = null;
previousKey = null;
wrongAnswered = false;
distance = 250;
keyboard = 0;
imageMap = new Map([
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
movableExerciseBoxText = document.getElementById("movableExerciseBoxText");
exerciseBoxText = document.getElementById("exerciseBoxText");
stopButton = document.getElementById("stopButton");
currentInputFeedBack = document.getElementById("currentInputFeedBack");
container = document.getElementById("effect");
textBox = document.getElementById("textBox");
imageContainer = document.getElementById("imageContainer");

//events
stopButton.onclick = function (){stopButtonFunction()};
window.addEventListener('keydown', (event) =>{
    previousKey = currentKey;
    currentKey = event;
    processInputFunction()
});

//do at start
//exerciseBoxText.textContent = textInput;
correctCharactersTyped = 0;
correctCharactersNeeded =  textChar.length;
createSpanSentence();
highlightCurrentLetter();
keyboardColorsFunction(keyboard);
loadTextFromDB();

//***On Load***//

//functions
function loadTextFromDB(id = 2){
       //get('/student_model/getExercise/' + id, function(data) {console.log(data);});
}


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

function moveSentence(){
    var valueClass = textBox.getAttribute("class");
    var value = (((document.querySelector("."+valueClass.toString())).clientWidth/4)-(correctCharactersTyped*50));
    movableExerciseBoxText.style.transform="translateX("+value+"px)";
}

//I don't think we will use this but please leave it for now here
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



function highlightKey(bool){
    if (currentKey!== null && document.getElementById(currentKey.code) !== null) {
        document.getElementById(currentKey.code).setAttribute("Class", (document.getElementById(currentKey.code).getAttribute("class") + " thickBorder"));
    }
    if (previousKey!== null && document.getElementById(previousKey.code) !== null){
        document.getElementById(previousKey.code).setAttribute("Class", (document.getElementById(previousKey.code).getAttribute("class").slice(0,-12)));
    }
    distance += -30;
    document.getElementById("movableExerciseBoxText").style.left = (distance+"px");
}

function processInputFunction() {
    let currInput = currentKey.key;
    let currInputCode = currentKey.code
    currentInputFeedBack.textContent=currInputCode;

    //Checker if input is correct
    //If input is null or shift key or ^¨ key is pressed this counts not as mistake
    if (currInput == null  || currInputCode === "BracketLeft" || currInput === "Shift") {
        highlightKey(false);
    // Case if input is correct
    } else if (currInput == textInput[correctCharactersTyped]) {
        correctCharactersTyped++;
        highlightKey(true);
    //Case if input was correct but it is typed wrong at least one time
        if(wrongAnswered){
            highlightLetterWrong();
            wrongAnswered = false;
    //Case if input is right typed from the first time
        }else{
            highlightLetterRight();
        }
    //Check if exercise is finished
        if(correctCharactersTyped===correctCharactersNeeded){
            exerciseFinishedFunction();
        }
    //Case if input is wrong
    } else {
        highlightKey(false);
        wrongAnswered = true;
    }
    highlightCurrentLetter();
}

function exerciseFinishedFunction(){
    exerciseBoxText.textContent = "The exercise is finished!";
    stopButton.disabled = true;
}

function stopButtonFunction(){
    if(keyboard===2){
        keyboard=1;
    } else {
        keyboard=2;
    }
    keyboardColorsFunction(keyboard);
}

function addDotFucntion(item, index, arr){
    if (arr.slice(-1)!=arr[index]){
        arr[index] = item +".";
    }
}

function setImage(key){
    if(key!==undefined){key = key.toLowerCase();}
    var curr = imageContainer.getElementsByTagName("img")[0];
    var s;
   if (imageMap.has(key)) {
       if (curr === undefined) {
           s = document.createElement("IMG");//.attributes("class","letter");
           s.setAttribute("class", "image");
           s.setAttribute("alt", key);
           s.setAttribute("src",  window.location.origin + imageMap.get(key));
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

function highlightCurrentLetter() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped];
    span.setAttribute("class","letter focus");
    setImage(textInput[correctCharactersTyped])
}
function highlightLetterWrong() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped-1];
    span.setAttribute("class","letter wrong");
    moveSentence();
}
function highlightLetterRight() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped-1];
    span.setAttribute("class","letter");
    moveSentence();
}

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