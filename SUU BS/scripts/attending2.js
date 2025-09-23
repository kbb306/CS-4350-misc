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
for (var i = 0; i < characters.length; i++) {
    who = characters[i];
    
}