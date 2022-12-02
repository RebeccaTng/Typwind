//***On Load***//
// text to be used
let text = "push. Failure. Wake up with determination. Go to bed with satisfaction. It's going to be hard, but hard does not mean impossible. Learning never exhausts the mind. The only way to do great work is to love what you do.";
let textArray = text.split(". ");
textArray.forEach(addDotFucntion);
let textArrayChar =textArray[0].split('');

//variables
let indexSentence = 0;
let correctCharactersTypedSentence = 0;
let correctCharactersNeededSentence = 0;
let correctAnswers = 0;
let mistakes = 0;
const startDate = Date();

//select elements that will be used
let exerciseBoxInput = document.getElementById("exerciseBoxInput");
let exerciseBoxText = document.getElementById("exerciseBoxText");
let stopButton = document.getElementById("stopButton");
let currentInputFeedBack = document.getElementById("currentInputFeedBack");

//events
stopButton.onclick = function (){stopButtonFunction()};
exerciseBoxInput.oninput = function (){processInputFunction()};

//do at start
//exerciseBoxInput.style.visibility = "hidden";
exerciseBoxInput.focus();
//***On Load***//
//functions
function processInputFunction() {
    currInput = exerciseBoxInput.value;
    currentInputFeedBack.textContent=currInput;
    if (currInput == null) {
    // correct character
    } else if (currInput == textArrayChar[correctCharactersTypedSentence]) {
        // correct character
        correctCharactersTypedSentence++;
        if(correctCharactersTypedSentence==correctCharactersNeededSentence){
            displayNextSentenceFunction();
        }

    } else {

    }
    console.log("trigger "+textArrayChar[(correctCharactersTypedSentence)]+" "+textArrayChar);
    exerciseBoxInput.value="";
}

function displayNextSentenceFunction() {
    if (textArray.length==indexSentence){
        exerciseFinishedFunction();
        return;
    }
    console.log(textArray);
    exerciseBoxText.textContent = textArray[indexSentence];
    const str = exerciseBoxText.textContent;
    exerciseBoxText.textContent = str.charAt(0).b + str.slice(1);

    correctCharactersTypedSentence = 0;
    correctCharactersNeededSentence = textArray[indexSentence].length;
    textArrayChar = textArray[indexSentence].split('');
    indexSentence++;

}

function exerciseFinishedFunction(){
    exerciseBoxText.textContent = "The exercise is finished!";
    stopButton.disabled = true;
}

function stopButtonFunction(){
    // indexSentence++
    // textArrayChar = textArray[indexSentence].split('');
    displayNextSentenceFunction();
}

function addDotFucntion(item, index, arr){
    if (arr.slice(-1)!=arr[index]){
        arr[index] = item +".";
    }
}