// Script needed to include Firebase services for Google-Authentication
// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
import { getAuth, signInWithPopup, GoogleAuthProvider } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-auth.js";

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
    apiKey: "AIzaSyBfCfQIoh2y1wzWxJld3oAAx925v5fh7dk",
    authDomain: "login-api-1729e.firebaseapp.com",
    projectId: "login-api-1729e",
    storageBucket: "login-api-1729e.appspot.com",
    messagingSenderId: "22487131292",
    appId: "1:22487131292:web:9539e6fe2e08542971b959",
    measurementId: "G-1VBSFVEFVL"
};

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);
    const analytics = getAnalytics(app);
    const provider = new GoogleAuthProvider(app);

const baseURLcookieValue = document.cookie
    .split('; ')
    .find((row) => row.startsWith('baseURL'))
    ?.split('=')[1];

const baseURLString = baseURLcookieValue.toString().replace(/%2F/gi, "/").replace(/%3A/gi, ":");
document.getElementById('googleJSOutput').value = baseURLString+'/public/PHP/jQueryStoreUserInDB.php';


    document.getElementById('login').addEventListener('click',(e) =>
    {
        signInWithPopup(auth, provider)
            .then((result) => {
                // This gives you a Google Access Token. You can use it to access the Google API.
                const credential = GoogleAuthProvider.credentialFromResult(result);
                const token = credential.accessToken;
                // The signed-in user info.
                const user = result.user;

                var names = user.displayName.split(' ');

/*                $.post(baseURLString+'/public/PHP/jQueryStoreUserInDB.php', { firstname:names[0],lastname:names[1],email:user.email}, function(result) {
                    alert(result);
                });

                $.post(baseURLString+'/public/PHP/jQueryStoreUserInDB.php', {action: 'typer'}, function( data ) {
                    // do something with data, e.g.
                    console.log(data);
                });*/

/*                $.ajax({
                    type: "POST",
                    cache:false,
                    url: baseURLString+'/public/PHP/jQueryStoreUserInDB.php',
                    data: {firstname:names[0],lastname:names[1],email:user.email},
                    dataType: String
                });*/


            }).catch((error) => {
            // Handle Errors here.
            const errorCode = error.code;
            const errorMessage = error.message;
            // The email of the user's account used.
            const email = error.customData.email;
            // The AuthCredential type that was used.
            const credential = GoogleAuthProvider.credentialFromError(error);
            // ...
            alert(errorMessage);
        });

    });

