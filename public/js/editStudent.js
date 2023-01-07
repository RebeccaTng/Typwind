function handImage() {
    var URL = document.getElementById("URL").value;
    var state = document.getElementById("handSelection");
    if (state.value == "right") {
        document.getElementById("hand image").src = URL + "/hands_right.svg";
    }
    if (state.value == "left") {
        document.getElementById("hand image").src = URL + "/hands_left.svg";
    }
    if (state.value == "both") {
        document.getElementById("hand image").src = URL + "/hands_both.svg";
    }
}

window.onload = function () {

    var characterCount = $('#notes').val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
    current.text(characterCount);
    $('#notes').val($('#notes').val().replace(/<br *\/?>/gi, ''));


    if (characterCount < 167) {
        current.css('color', '#666');
    }
    if (characterCount > 167 && characterCount < 334) {
        current.css('color', '#6d5555');
    }
    if (characterCount > 334 && characterCount < 500) {
        current.css('color', '#793535');
    }
    if (characterCount > 667 && characterCount < 834) {
        current.css('color', '#841c1c');
    }
    if (characterCount > 834 && characterCount < 1000) {
        current.css('color', '#8f0001');
    }

    if (characterCount >= 1000) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight', 'bold');
    } else {
        maximum.css('color', '#666');
        theCount.css('font-weight', 'normal');
    }
}


