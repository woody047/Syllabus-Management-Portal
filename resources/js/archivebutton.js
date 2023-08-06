$(document).ready(function () {
    // Handle the click event on the archive link
    $('.archive-link').click(function (e) {
        e.preventDefault(); // Prevent the default link behavior
        var archiveUrl = $(this).attr('href'); // Get the archive URL from the link

        // Open the modal when the link is clicked
        $('#archiveModal').modal('show');

        // Handle the click event on the "Archive" button in the modal
        $('#confirmArchive').click(function () {
            // Redirect to the archive URL
            window.location.href = archiveUrl;
        });
    });

    // Clean up the modal when it's hidden
    $('#archiveModal').on('hidden.bs.modal', function () {
        $('#confirmArchive').off('click'); // Remove the click event handler
    });
});