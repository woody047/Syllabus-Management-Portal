$(document).ready(function () {
    // Handle the "Remove" button click event
    $('#remove-row-for-info-on-prac').click(function () {
        // Remove the last row from the table body
        $('#table-body-info-on-prac tr:last-child').remove();
    });
});
