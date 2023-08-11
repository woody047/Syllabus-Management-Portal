$(document).ready(function () {
    // Handle the "Remove" button click event
    $('#remove-row').click(function () {
        // Remove the last row from the table body
        $('#table-body tr:last-child').remove();
    });
});
