const username = document.getElementById("username");
const password = document.getElementById("password");
const form = document.getElementById("form_login");
const errorElement = document.getElementById("error");

var currentUserData;
form.addEventListener("submit", (e) => 
{
    validateInput(e);
})
function validateInput(currentEvent)
{
    let warning;
    if(username.value == "" || username.value == null)
    {
        warning = "Username can't be empty!";
    }
    else if(password.value == "" || password.value == null)
    {
        warning = "Password can't be empty!";
    }

    if(warning != null)
    {
        currentEvent.preventDefault();
        errorElement.innerText = warning;
    }
    else
    {
        sessionStorage.setItem("currentUsername", username);
    }
}
class formInput
{
    constructor(username, password) 
    {
        this.username = username;
        this.password = password;
    }
}


