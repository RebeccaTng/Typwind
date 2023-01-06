function keyboard()
{
    let divColor = document.getElementById("color");
    let sliderColor = document.getElementById("keyboardColors");
    let sliderKeyboard = document.getElementById("keyboardShow");
    const visibility = window.getComputedStyle(divColor).display;
    let keyboardCopy = document.getElementById("keyboardShow");
    let colorCopy = document.getElementById("keyboardColorsCopy");
    if(visibility === "block")
    {
        divColor.style.display = "none"
        colorCopy.checked = false;
    }
    else
    {
        colorCopy.checked = sliderColor.checked;
        divColor.style.display = "block";
    }


    keyboardCopy.checked=  sliderKeyboard.checked;
    console.log("keyboard copy =" + keyboardCopy.checked);
    console.log("color copy =" + colorCopy.checked);


}

function color()
{
    let sliderColor = document.getElementById("keyboardColors");
    let colorCopy = document.getElementById("keyboardColorsCopy");
    colorCopy.checked = sliderColor.checked;
    console.log("color copy =" + colorCopy.checked);
}