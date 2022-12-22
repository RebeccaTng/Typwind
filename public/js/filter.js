


function filterStudents(array, name) {
    const result = array.filter(student => student.teacherFirstname === name);
    html = "<div id='list'>";
    for (var i = 0; i < result.length; i++) {
        html= html+ "<li> <a href= \"http://localhost/UXWD/experts/studentOverview/" + result[i].idStudents + "\">"+ result[i].firstname +"<br>" + result[i].lastname + "</a></li>"
    }
    html =html+ "</div>";
    document.getElementById("list").innerHTML = html;
    //return console.log(result);
}

function search() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("list");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}