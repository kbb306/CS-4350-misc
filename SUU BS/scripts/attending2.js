total = 0
already = false
already2 = false
already3 = false
var Hogwarts = document.getElementById("Hogwarts");
var Hat = ["Gryffindor","Hufflepuff","Slytherin","Ravenclaw"];
for (var i = 0; i<Hat.length; i++) {
    var House = Hat[i];
    var option = document.createElement("option");
    option.textContent = House;
    option.value = House;
    Hogwarts.appendChild(option);
}

var characters = [ "Harry Potter",
        "Hermione Granger",
        "Albus Dumbledore",
        "Cho Chang",
        "Luna Lovegood",
        "Draco Malfoy",
        "A character not listed"]

var formsection = document.getElementById("chars")
for (i in characters) {
    who = characters[i];
    var newbutton = document.createElement("input");
    var newlabel = document.createElement("label")
    newbutton.type = "radio"
    newbutton.setAttribute("name","character")
    newbutton.id = who
    newbutton.value = who;
    newbutton.setAttribute("onchange","tally(this)");
    newlabel.for = who
    newlabel.textContent = who
    x = document.createElement("br");
    formsection.append(newbutton);
    formsection.append(newlabel);
    formsection.append(x);
}

function getFirstForm() {
    var basics = window.location.search
    const basicData = new URLSearchParams(basics);
    fname = basicData.get("fname");
    lname = basicData.get("lname");
    movein = basicData.get("date");
    major = basicData.get("major");
    return [fname,lname,movein,major];
}

results = getFirstForm()
var form = document.getElementById("checklist")
var fname = document.createElement("input");
fname.setAttribute("type","hidden");
fname.setAttribute("value",results[0]);
fname.setAttribute("name","fname");
form.appendChild(fname)

var lname = document.createElement("input");
lname.setAttribute("type","hidden");
lname.setAttribute("value",results[1]);
lname.setAttribute("name","lname");
form.appendChild(lname)

var date = document.createElement("input");
date.setAttribute("type","hidden");
date.setAttribute("value",results[2]);
date.setAttribute("name","date");
form.appendChild(date)

var major = document.createElement("input");
major.setAttribute("type","hidden");
major.setAttribute("value",results[3]);
major.setAttribute("name","major")
form.appendChild(major)

function addpoints(points) {
    total = total + points;
    var output = document.getElementById("total");
    output.innerHTML = "Total Points: " + total +"/60";

}



function tally(caller) {
    if (caller.type == "checkbox") {
        if (caller.checked) {
            addpoints(5)
        }
        else {
            addpoints(-5)
        }
    }
    else if (caller.name == "degree") {
        if (already == false) {
            addpoints(20)
            already = true
        }
    }
    else if (caller.name == "character") {
        if (already2 == false) {
            addpoints(10)
            already2 = true
        }
    }
    else if (caller.id == "Hogwarts") {
        var House = caller.value
        console.log("House is", House)
        if (already3 == false) {
            if (["Gryffindor","Hufflepuff","Slytherin","Ravenclaw"].includes(House)) {
                addpoints(5);
                already3 = true;
                
            }
        }
        else if (House == "Select a House") {
            addpoints(-5)
            already3 = false
            }
          
    }
    else if (caller.type == "reset") {
        total = 0
        var output = document.getElementById("total");
        output.innerHTML = "Total Points: " + total;
        already = false
        already2 = false
        already3 = false
    }
}

