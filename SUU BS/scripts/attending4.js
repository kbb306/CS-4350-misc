OK = false
already = false

function getPrevForms() {
    var prevs = window.location.search
    const prevdata = new URLSearchParams(prevs)
    form = document.getElementById("form4")
    for(var [key,value] of prevdata) {
        entry = document.createElement("input")
        entry.setAttribute("type","hidden")
        entry.setAttribute("name",key)
        entry.setAttribute("value",value)
        form.appendChild(entry)
        
    }

}

function passwordcheck() {
    var OK = false
    var password = document.getElementById("password")
    var repeat = document.getElementById("checkpassword")
    if (!password.value) {
        if (!already) {
        alert("Enter password in both fields")
        }
        OK = false
        already = true
    }

    else if (!repeat.value) {
        if (!already) {
        alert("Enter password in both fields")
        }
        OK = false
        already = true
    }

    else {
        if (password.value === repeat.value) {
            OK = true
        }
        else {
            alert("Passwords do not match!")
            OK = false
        }
    }
    return OK
}

function validate(form) {
    for (var i= 0;i<form;i++) {
    if (thing.type == "label") {
        thing = thing.firstElementChild
    }

    if (!thing.value) {
        alert("Invalid Input at: " + String(thing.parent.innerHTML).split("<")[0])
        OK = false
    }
    
    
    }
    OK = passwordcheck()
    return OK
}


