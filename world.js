$(document).ready(function() {
    let lookupBtn = $("#lookup");
    let country = $("#country");
    let searchResult = $("#result");

    lookupBtn.on("click", function() {
        $.ajax("world.php?country="+encodeURI(country.val()))
            .done(function(result) {
                searchResult.html(result);
            }).fail(function(result) {
                alert("A problem with the request occurred.");
            });
    });
});
