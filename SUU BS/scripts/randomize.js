function randomize() {
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
    name1 = document.getElementById("first_name")
    name2 = document.getElementById("last_name")
    name1.value = fNames[Math.floor(Math.random()*fNames.length)]
    name2.value = lNames[Math.floor(Math.random()*lNames.length)]
}