let textInput = "push Failure. wake up with determination";
//" Go to bed with satisfaction. It's going to be hard, but hard does not mean impossible. Learning never exhausts the mind. The only way to do great work is to love what you do.";
let textArray = textInput.split(". ");
textArray.forEach(addDotFucntion);
let textArrayChar =textArray[0].split('');

let textChar = textInput.split(""); //Every char is a separeted element in an array


//variables
let indexSentence = 0;
let correctCharactersTyped = 0;
let correctCharactersNeeded = 0;
let correctAnswers = 0;
let mistakes = 0;
const startDate = Date();
let currentKey = null;
let previousKey = null; //hardcoded, this is bad
let wrongAnswered = false;
let distance = 250;

//select elements that will be used
let movableExerciseBoxText = document.getElementById("movableExerciseBoxText");
let exerciseBoxText = document.getElementById("exerciseBoxText");
let stopButton = document.getElementById("stopButton");
let currentInputFeedBack = document.getElementById("currentInputFeedBack");
let container = document.getElementById("effect");

//events
stopButton.onclick = function (){stopButtonFunction()};
//exerciseBoxInput.oninput = function (){processInputFunction()};
window.addEventListener('keydown', (event) =>{
    previousKey = currentKey;
    currentKey = event;
    processInputFunction()
    //highlightKey();

});

//do at start
console.log(textInput+"\n"+textChar);
exerciseBoxText.textContent = textInput;
correctCharactersTyped = 0;
correctCharactersNeeded =  textChar.length;
createSpanSentence();
highlightCurrentLetter();
keyboardColorsFunction(0);


//exerciseBoxInput.style.visibility = "hidden";
//exerciseBoxInput.focus();
//***On Load***//

//functions
function createSpanSentence(){
    for(i=0;textChar.length>i;i++) {
        var s = document.createElement("SPAN");//.attributes("class","letter");
        s.setAttribute("class","letter");
        var txt = document.createTextNode(textChar[i]);
        s.appendChild(txt);
        movableExerciseBoxText.appendChild(s);

    }
}


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
    let currShift = currentKey.shiftKey;
    console.log(currentKey);
    currentInputFeedBack.textContent=currentKey.code;
    if (currInput == null || currInput === "Shift") {
        highlightKey(false);
        // correct character
    } else if (currInput === textInput[correctCharactersTyped]) {
        correctCharactersTyped++;
        highlightKey(true);
        if(wrongAnswered){
            highlightLetterWrong();
            wrongAnswered = false;
        }else{
            highlightLetterRight();
        }

        if(correctCharactersTyped===correctCharactersNeeded){
            exerciseFinishedFunction();
        }

    } else {
        highlightKey(false);
        wrongAnswered = true;

    }
    highlightCurrentLetter();
    //console.log("trigger "+textInput[(correctCharactersTyped)]);
}

/*function displayNextSentenceFunction() {
    if (textArray.length==indexSentence){
        exerciseFinishedFunction();
        return;
    }
    console.log(textArray);
    exerciseBoxText.textContent = textArray[indexSentence];
    const str = exerciseBoxText.textContent;
    //exerciseBoxText.textContent = str.charAt(0).b + str.slice(1);

    correctCharactersTyped = 0;
    correctCharactersNeeded = textArray[indexSentence].length;
    textArrayChar = textArray[indexSentence].split('');
    highlightCurrentLetter();
    indexSentence++;

}*/

function exerciseFinishedFunction(){
    exerciseBoxText.textContent = "The exercise is finished!";
    stopButton.disabled = true;
}

function stopButtonFunction(){
    // indexSentence++
    // textArrayChar = textArray[indexSentence].split('');
    //displayNextSentenceFunction();
    keyboardColorsFunction(1);

}

function addDotFucntion(item, index, arr){
    if (arr.slice(-1)!=arr[index]){
        arr[index] = item +".";
    }
}

function highlightCurrentLetter() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped];
/*    span.style.color = "blue";
    span.style.fontSize = "larger";
    span.style.fontWeight = "bold";
    span.style.border = "thick solid";
    span.style.borderColor = "black";*/
    span.setAttribute("class","letter focus");
}
function highlightLetterWrong() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped-1];
    span.setAttribute("class","letter wrong");

    /*    span.style.color = "red";
    span.style.fontSize = "";
    span.style.fontWeight = "";
    span.style.border = "";*/

}
function highlightLetterRight() {
    var span = movableExerciseBoxText.getElementsByTagName("span")[correctCharactersTyped-1];
    span.setAttribute("class","letter");
    /*    span.style.color = "";
    span.style.fontSize = "";
    span.style.fontWeight = "";
    span.style.border = "";*/

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