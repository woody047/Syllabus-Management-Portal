$(document).ready(function() {
    $(".section2").hide(); // Hide all sections except the first one

    $(".next-section").click(function() {
        $(".section1").hide();
        $(".section2").show();
    });

    $(".prev-section").click(function() {
        $(".section2").hide();
        $(".section1").show();
    });
});