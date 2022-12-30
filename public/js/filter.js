


function filterStudents(array, name) {
    var URL = document.getElementById("URL").value;

    if (name == "disable filter")
    {
        html_students="";
        for (var i = 0; i < array.length; i++) {
            html_students= html_students+ "<li class=\"studentListItem\"> <a href= \"" + URL + array[i].idStudents  +"\">"
                + " <img src=\"/public/assets/avatars/1.svg\" alt=\"User Icon\" class=\"roundProfilePic\">" +
                " <h4>" +array[i].firstname + "<br>" + array[i].lastname +"</h4>"+"</a></li>"
        }
        document.getElementById('disable filter').style.display = "none";
        document.querySelector('#filter').value="Filter";
    }
    else{
        const result = array.filter(student => student.teacherFirstname === name);
        html_students="";
        if(result.length===0)
        {
            html_students= "<h3>This teacher has no students assigned</h3>";
        }
        else{
            for (var i = 0; i < result.length; i++) {
                html_students= html_students+ "<li class=\"studentListItem\"> <a href= \"" + URL + result[i].idStudents  +"\">"
                    + " <img src=\"/public/assets/avatars/1.svg\" alt=\"User Icon\" class=\"roundProfilePic\">" +
                    " <h4>" +result[i].firstname + "<br>" + result[i].lastname +"</h4>"+"</a></li>"
            }
        }

        document.getElementById('disable filter').style.display = "block";
    }


    //html= html+"
    document.getElementById("list").innerHTML = html_students;
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