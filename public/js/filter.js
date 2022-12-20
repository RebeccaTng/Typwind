


function filterStudents(array, name) {
    const result = array.filter(student => student.teacherFirstname === name);
    html = "<div id='list'>";
    for (var i = 0; i < result.length; i++) {
        html= html+ "<li> <a href= \"http://localhost/UXWD/experts/studentOverview/" + result[i].idStudents + "\">"+ result[i].firstname +"<br>" + result[i].lastname + "</a></li>"
    }
    //html= html+""
    document.getElementById("list").innerHTML = html;
    //return console.log(result);
}

