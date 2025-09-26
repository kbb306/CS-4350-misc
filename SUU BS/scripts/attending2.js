total = 0
already = false
already2 = false
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
    newbutton.setAttribute("onclick","buttoncheck()");
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
var fname = document.createElement("input");
fname.setAttribute("type","hidden");
fname.setAttribute("value",results[0]);
fname.setAttribute("name","fname");

var lname = document.createElement("input");
lname.setAttribute("type","hidden");
lname.setAttribute("value",results[1]);
lname.setAttribute("name","lname");

var date = document.createElement("date");
date.setAttribute("type","hidden");
date.setAttribute("value",results[2]);
date.setAttribute("name","date");

var major = document.createElement("input");
major.setAttribute("type","hidden");
major.setAttribute("value",results[3]);

function addpoints(points) {
    total = total + points;
    var output = document.getElementById("total");
    output.innerHTML = "Total Points: " + total;

}



function resetpoints() {
    total = 0
    var output = document.getElementById("total");
    output.innerHTML = "Total Points: " + total;
    already = false
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
    else if (caller.name == degree) {
        if (already2 == false) {
            addpoints(20)
            already2 = true
        }
    }
    else if (caller.name == characters) {

    }
    else if (caller.id == "Hogwarts") {
        var House = caller.value
        console.log("House is", House)
        if (already == false) {
            if (["Gryffindor","Hufflepuff","Slytherin","Ravenclaw"].includes(House)) {
                addpoints(5);
                already = true;
                return;
            }
        }
        else if (House == "Select a House") {
            addpoints(-5)
            already = false
            }
          
    }
}

