const firstName = document.getElementById("fname");
const lastName = document.getElementById("lname");
const birthDate = document.getElementById("birth");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const form = document.getElementById("form_registration");
const errorElement = document.getElementById("error");

var newUserData;

form.addEventListener("submit", (e) => 
{
    validateInput(e);
})

function validateInput(currentEvent)
{
    let warning;
    let inputs = [
        password,
        email,
        birthDate,
        username,
        lastName,
        firstName
    ];
    for(var i = 0; i < inputs.length; i++)
    {
        if(inputs[i].value == "" || inputs[i].value == null)
        {
            console.log(inputs[i].value);
            warning = inputs[i].getAttribute("placeholder") + " " + "can't be empty!";
        }
    }

    if(warning != null)
    {
        currentEvent.preventDefault();
        errorElement.innerText = warning;
    }
}
class formInput
{
    constructor(fname, lname, birth, username, email, password) 
    {
        this.fname = fname;
        this.lname = lname;
        this.birth = birth;
        this.username = username;
        this.email = email;
        this.password = password;
    }
}


