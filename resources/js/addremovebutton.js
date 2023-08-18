$(document).ready(function () {
    let rowCount = $('#table-body tr').length; // Get the initial number of rows

    // Function to update button visibility based on row count
    function updateButtonVisibility() {
        if (rowCount <= 1) {
            $('#remove-row').hide();
        } else {
            $('#remove-row').show();
        }
    }

    // Initial button visibility setup
    updateButtonVisibility();

    // Handle the "Add" button click event
    $('#add-row').click(function () {
        rowCount++;
        updateButtonVisibility();

        // Create a new row with input fields
        let row = `
        <tr>
            <td><textarea type="text" name="courseOutline[]" rows="5" cols="50" style="width:500px; height:200px;" required></textarea></td>           
            <td><input type="text" name="CO[]" style="width:100px" required></input></td>
            <td><input type="text" name="L[]" style="width:20px" required></input></td>
            <td><input type="text" name="T[]" style="width:20px" required></input></td>
            <td><input type="text" name="P[]" style="width:20px" required></input></td>
            <td><input type="text" name="O[]" style="width:20px" required></input></td>
            <td><input type="text" name="GuidedLearning[]" style="width:20px" required></input></td>
            <td><input type="text" name="IndependentLearning[]" style="width:20px" required></input></td>
            <td><input type="text" name="TotalSLT[]" style="width:20px" required></input></td>
        </tr>
        `;

        // Append the new row to the table body
        $('#table-body').append(row);
    });

    // Handle the "Remove" button click event
    $('#remove-row').click(function () {
        if (rowCount > 1) { // Ensure there's at least one row
            rowCount--;
            updateButtonVisibility();

            // Remove the last row from the table body
            $('#table-body tr:last-child').remove();
        }
    });
});
