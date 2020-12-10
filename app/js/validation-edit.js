const firstName = document.getElementById("fname");
const lastName = document.getElementById("lname");
const birthDate = document.getElementById("birth");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const form1 = document.getElementById("form_personal");
const form2 = document.getElementById("form_account");
const errorElement1 = document.getElementById("error1");
const errorElement2 = document.getElementById("error2");

form1.addEventListener("submit", (e) => 
{
    validatePersonal(e);
})
form2.addEventListener("submit", (e) => 
{
    validateAccount(e);
})

function validatePersonal(currentEvent)
{
    let warning;
    let inputs = [
        birthDate,
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
        errorElement1.innerText = warning;
    }
}
function validateAccount(currentEvent)
{
    let warning;
    let inputs = [
        password,
        username,
        email
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
        errorElement2.innerText = warning;
    }
}



