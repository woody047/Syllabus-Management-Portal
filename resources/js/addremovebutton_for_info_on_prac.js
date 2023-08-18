$(document).ready(function () {
    let rowCount = $('#table-body-info-on-prac tr').length; // Get the initial number of rows

    // Function to update button visibility based on row count
    function updateButtonVisibility() {
        if (rowCount <= 1) {
            $('#remove-row-for-info-on-prac').hide();
        } else {
            $('#remove-row-for-info-on-prac').show();
        }
    }

    // Initial button visibility setup
    updateButtonVisibility();

    // Handle the "Add" button click event
    $('#add-row-for-info-on-prac').click(function () {
        rowCount++;
        updateButtonVisibility();

        // Create a new row with input fields
        let row = `
        <tr>
            <td><input type="text" name="lab[]" style="width:20px" required></input></td>
            <td><input type="text" name="co[]" style="width:100px" required></input></td>
            <td><textarea type="text" name="activity[]" rows="5" cols="50" style="width:900px; height:200px;float:left;" required></textarea></td>           
            <td><input type="text" name="contact_hours[]" style="width:20px" required></input></td>
        </tr>
        `;

        // Append the new row to the table body
        $('#table-body-info-on-prac').append(row);
    });

    // Handle the "Remove" button click event
    $('#remove-row-for-info-on-prac').click(function () {
        if (rowCount > 1) { // Ensure there's at least one row
            rowCount--;
            updateButtonVisibility();

            // Remove the last row from the table body
            $('#table-body-info-on-prac tr:last-child').remove();
        }
    });
});
