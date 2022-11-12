$(document).ready(function() {
    let country = $("#country");
    let lookupBtn = $("#lookup");
    let lookupCitiesBtn = $("#lookupCities");
    let searchResult = $("#result");

    lookupBtn.on("click", function() {
        $.ajax("world.php?country="+encodeURI(country.val()))
            .done(function(result) {
                searchResult.html(result);
            }).fail(function(result) {
                alert("A problem with the request occurred.");
            });
    });

    lookupCitiesBtn.on("click", function() {
        $.ajax("world.php?country="+encodeURI(country.val())+"&lookup=cities")
            .done(function(result) {
                searchResult.html(result);
            }).fail(function(result) {
                alert("A problem with the request occurred.");
            });
    });         
});