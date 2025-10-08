prev = window.location.search
prevdata = URLSearchParams(prev)
var fname = prevdata.get("firstname")
var lname = prevdata.get("lastname")
fullname = document.getElementsByTagName("h2")
fullname.innerHTML = "Welcome " + fname + " " + lname

function suboption(caller) {
    var options = []
    var sweet = ["Caramel: A classic choice, often with added chocolate, peanuts, or cookie crumbs",
                 "Chocolate: Chocolate drizzles or flavors like chocolate peanut butter",
                 "Cinnamon Sugar: A sweet and simple coating.",
                 "Fruit Flavors: Such as blue raspberry, strawberry, or cherry.",
                 "Other Sweet Ideas: Peanut butter drizzle, butterscotch, or even marshmallow."
    ]

    var savory = ["Cheesy: White cheddar, nacho cheddar, Parmesan, and even truffle cheese.",
                  "Herb &amp; Garlic: Rosemary Parmesan, Italian seasoning, dill pickle, and garlic powder.",
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

    menu = document.getElementById("theFlavorSelect")
    menu.innerHTML = ""
    if (caller.id == "sweetFlavors") {
        options = sweet
    }
    else if (caller.id = "savoryFlavors") {
        options = savory
    }
    else if (caller.id = "spicyFlavors") {
        options = spicetang
    }
    else if (caller.id = "uniqueFlavors") {
        options = unique
    }

    for (var i = 0; i < options.length; i++) {
        listel = options[i]
        option = document.createElement("option")
        option.textContent = listel
        option.value = listel.split(":")[0]
        options.append(option)
    }
}

function check() {
    var OK = false
    var buttons = 0
    form = Array.Arrayfrom(document.forms)[0]
    for (var i = 0; i < form.length; i++) {
        if (form[i].type == "button") {
            if (form[i].checked) {
                buttons ++
            }
        }
        else if (form[i].type == "text") {
            regex = form[i].value.search(/[1-9]/)
            if (regex == 1) {
                OK = true
            }
            else {
                alert("Please enter a number 0-9")
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