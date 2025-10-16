OK = false
already = false

const cyrb53 = (str, seed = 0) => { // Taken from https://github.com/bryc/code/blob/master/jshash/experimental/cyrb53.js
    let h1 = 0xdeadbeef ^ seed, h2 = 0x41c6ce57 ^ seed;
    for(let i = 0, ch; i < str.length; i++) {
        ch = str.charCodeAt(i);
        h1 = Math.imul(h1 ^ ch, 2654435761);
        h2 = Math.imul(h2 ^ ch, 1597334677);
    }
    h1  = Math.imul(h1 ^ (h1 >>> 16), 2246822507);
    h1 ^= Math.imul(h2 ^ (h2 >>> 13), 3266489909);
    h2  = Math.imul(h2 ^ (h2 >>> 16), 2246822507);
    h2 ^= Math.imul(h1 ^ (h1 >>> 13), 3266489909);
  
    return 4294967296 * (2097151 & h2) + (h1 >>> 0);
};

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
    if (OK) {
        password = document.getElementById("password")
        random = Math.random()*Document.getElementById("form4").length
        hash = document.createElement("input")
        hash.setAttribute("type","hidden")
        hash.setAttribute("name","password")
        hash.setAttribute("value",cyrb53(password,random))

    }
    return OK
}
getPrevForms()

