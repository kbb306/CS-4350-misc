prev = window.location.search
prevdata = new URLSearchParams(prev)
var fname = prevdata.get("firstName")
var lname = prevdata.get("lastName")
fullname = document.getElementsByTagName("h2")[0]
fullname.innerHTML = ("Welcome " + fname + " " + lname)

function suboption(caller) {
    menu = document.getElementById("theFlavorSelect")
    caller.setAttribute()
    menu.innerHTML = ""
    console.log(caller)
    var options = ["Select an option first"]
    var sweet = ["Caramel: A classic choice, often with added chocolate, peanuts, or cookie crumbs",
                 "Chocolate: Chocolate drizzles or flavors like chocolate peanut butter",
                 "Cinnamon Sugar: A sweet and simple coating.",
                 "Fruit Flavors: Such as blue raspberry, strawberry, or cherry.",
                 "Other Sweet Ideas: Peanut butter drizzle, butterscotch, or even marshmallow."
    ]

    var savory = ["Cheesy: White cheddar, nacho cheddar, Parmesan, and even truffle cheese.",
                  "Herb & Garlic: Rosemary Parmesan, Italian seasoning, dill pickle, and garlic powder.",
                  "Umami Flavors: Nutritional yeast, bacon, and soy sauce.",
                  "Specialty Savory: Everything bagel seasoning, furikake, and even ketchup flavor."
    ]

    var spicytang = ["Spicy: Buffalo, chili powder, sriracha, and spicy cayenne.",
                     "Tangy: Salt and vinegar and lime zest."
    ]

    var unique = ["Cajun: A blend of savory spices.",
                  "Tex-Mex: Spicy Southwest seasoning for a fiesta.",
                  "Ranch: A creamy, cheesy flavor.",
                  'Themed Flavors: Such as "Cheeseburger," "Birthday Cake," or even seasonal gingerbread and pumpkin spice.'
    ]

    
    if (caller.id == "sweetFlavors") {
        options = sweet
    }
    else if (caller.id = "savoryFlavors") {
        options = savory
    }
    else if (caller.id = "spicyFlavors") {
        options = spicytang
    }
    else if (caller.id = "uniqueFlavors") {
        options = unique
    }

    for (var i = 0; i < options.length; i++) {
        listel = options[i]
        console.log(listel)
        option = document.createElement("option")
        option.textContent = String(listel)
        option.value = listel.split(":")[0]
        console.log(option.value)
        menu.appendChild(option)
    }
}

function check() {
    var OK = false
    var buttons = 0
    form = document.forms[0]
    for (var i = 0; i < form.length; i++) {
        if (form[i].type == "button") {
            if (form[i].checked) {
                buttons ++
            }
        }
        else if (form[i].type == "text") {
            regex = form[i].value.search(/[1-9]/)
            if (regex == 0) {
                OK = true
            }
            else {
                alert("Please enter a number 1-9")
                OK = false
            }
        }
    }
    if (buttons == 0) {
        alert("Please select an option")
    }
    return OK
}
suboption()