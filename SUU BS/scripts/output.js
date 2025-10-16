function dataDump() {
    var previous = window.location.search
    var toParse = new URLSearchParams(previous)
    for (var [key,value] of toParse) {
        console.log(key)
        place = document.getElementById(key)
        prefix = place.innerHTML
        place.innerHTML = prefix + value
    }
}
dataDump()