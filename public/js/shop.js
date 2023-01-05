


function message(element){

    const error = document.getElementById(element);
    error.style.display = 'block'
    setTimeout(() => {

        error.style.display = 'none'


    }, 3000);
}

function post(idAvatar) {
    // The rest of this code assumes you are not using a library.
    // It can be made less verbose if you use one.
    const form = document.createElement('form');
    form.method = 'post';
    form.action = "http://localhost:8080/kids/buyAvatar/"+idAvatar;
    document.body.appendChild(form);
    form.submit();
}

function functionConfirm(msg, myYes, myNo) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function() {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(myYes);
    confirmBox.find(".no").click(myNo);
    confirmBox.show();
}

function commit() {

    const form = document.createElement('form');
    form.method = 'get';
    form.action = "http://localhost:8080/kids/avatar/confirm/";
    document.body.appendChild(form);
    form.submit();
}
function rollback() {

    const form = document.createElement('form');
    form.method = 'get';
    form.action = "http://localhost:8080/kids/avatar/cancel/";
    document.body.appendChild(form);
    form.submit();
}