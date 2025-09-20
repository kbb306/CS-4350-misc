document.getElementById("date").min = new Date().toISOString().split("T")[0];
// Found this here: https://stackoverflow.com/questions/74585566/set-date-input-fields-minimum-date-to-today

majors = ["Accounting",
"Agriculture",
"Anthropology",
"Area/Group Studies",
"Art &amp; Art History",
"Arts Administration",
"Aviation",
"Biology",
"Business",
"Chemistry",
"Communication",
"Computer Science",
"Construction",
"Criminal Justice",
"Cybersecurity",
"Dance",
"Data Science",
"Economics",
"Education",
"Engineering",
"English",
"Environmental Studies",
"Exercise Science",
"Family Life &amp; Human Development",
"Film",
"Finance",
"General Studies",
"Geography",
"Geology",
"Graphic Design",
"Health Sciences",
"History",
"Hospitality Management",
"Information Technology",
"Interdisciplinary Studies",
"Languages",
"Leadership",
"Library Media/School Library",
"Management",
"Marketing",
"Mathematics",
"Military Science",
"Music",
"Nursing",
"Nutrition",
"Outdoor Recreation",
"Philosophy",
"Physical Education",
"Physics",
"Political Science",
"Psychology",
"Public Administration",
"Secondary Education",
"Social Studies",
"Social Work",
"Sociology",
"Software Development",
"Sports",
"Theatre"];

fNames = ["Ainslee",
"Alysa",
"Berrie",
"Cami",
"Deirdre",
"Devon",
"Dora",
"Elaina",
"Genia",
"Godiva",
"Jerrylee",
"Karyn",
"Nolana",
"Perrine",
"Rachel"];

lNames = ["Cartmill",
"Cherrington",
"Ellington",
"Gascho",
"Hellums",
"Landesberg",
"Lehtonen",
"Mankins",
"Melchior",
"Molpus",
"Sangalli",
"Shehane",
"Stinebaugh",
"Willigar",
"Wiser"
];

var majorsel = document.getElementById("majors");
for(var i=0; i<majors.length; i++) {
    var major = majors[i];
    var entry = document.createElement("option");
    entry.textContent = major;
    entry.value = major;
    majorsel.appendChild(entry);
}


name1 = document.getElementById("fName")
name2 = document.getElementById("lName")


function randomize() {
    name1.value = fNames[Math.floor(Math.random()*fNames.length)]
    name2.value = lNames[Math.floor(Math.random()*lNames.length)]
}

