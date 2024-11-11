$(document).ready(function() {
    $(".fav").on("click", function() {
        const akapit = $(this);
        $.post("changeFav.php", { idWyscig: akapit.data("wyscig") }, function(data) {
            if (data == "sukces") {
                const img = akapit.find("img");
                const newSrc = (img.attr("src") == "dodaj.jpg") ? "usun.png" : "dodaj.jpg";
                img.attr("src", newSrc);
            }
        });
    });
});