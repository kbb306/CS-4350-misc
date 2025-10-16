function dataDump() {
    var previous = window.location.search
    var fullname = []
    var toParse = new URLSearchParams(previous)
    for (var [key,value] of toParse) {
        if (key.search(RegExp("/.name/"))) {
            fullname.push([key,value])
        }
        else if (key == "programmer") {
            console.log("programmed by "+ value)
        }
        place = document.getElementById(String(key))
        console.log(place.id,key,value)
        prefix = place.innerHTML
        place.innerHTML = String(prefix + value)
    }
}
dataDump()