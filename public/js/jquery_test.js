

function showStudents() {
    //  alert("you clicked me...")
    // $("#eventsplaceholder").load("events?output=table")
    const url = "events?output=json"
    $.getJSON(url, convertToList)
}


