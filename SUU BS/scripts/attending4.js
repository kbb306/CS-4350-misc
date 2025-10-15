OK = false

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

function validate(thing,index) {
    var passwords = []
    
    if (thing.type == "label") {
        thing = thing.firstElementChild
    }

    if (!thing.value) {
        alert("Invalid Input at: " + String(thing.parent.innerHTML).split("<")[0])
        OK = false
    }
    
    if (thing.type == "password"){
        passwords.push(thing)
    }
    
    for (var i, j=0; i < passwords.length; i++) {
        j = i + 1
        if (passwords[i].value === passwords[j].value) {
            OK = true
        }
        else {
            alert ("Passwords do not match!")
            OK = false
        }

    }
}

function check() {
    form = Array.from(document.getElementById("form4").elements)
    console.log(form)
    form.forEach(validate())
    console.log(OK)
    return OK
}


