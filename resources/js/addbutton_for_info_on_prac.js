$(document).ready(function () {
    let rowCount=0;
    // Handle the "Add" button click event
    $('#add-row-for-info-on-prac').click(function () {
        rowCount++;
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
});
