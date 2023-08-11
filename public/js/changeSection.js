$(document).ready(function () {
    let currentSection = 1;
    const totalSections = 2; // Update this if you have more sections

    $(".next-section").click(function () {
        if (currentSection < totalSections) {
            $(".section" + currentSection).hide();
            currentSection++;
            $(".section" + currentSection).show();
        }
    });

    $(".prev-section").click(function () {
        if (currentSection > 1) {
            $(".section" + currentSection).hide();
            currentSection--;
            $(".section" + currentSection).show();
        }
    });
});