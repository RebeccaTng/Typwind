//This JS file is what I wrote when trying out AJAX
//It is not used anywhere and can be omitted

let expert = {
    "name": "Mike",
    "password": "Mike567",
    "gender": "male",
    "email": "mike@mail.com"
}
document.write(expert.name);

let params = {
    "method": "POST",
    "headers": {
        "Content-Type": "application/json; charset=utf-8"
    },
    "body": JSON.stringify(user)
}

fetch("script.php", params)

jsonString = JSON.stringify(user);
let http = new XMLHttpRequest();

http.open('post', "homeCo.php", true);
http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
http.send(jsonString);