$(document).ready(function () {
    let rowCount=0;
    // Handle the "Add" button click event
    $('#add-row').click(function () {
        rowCount++;
        // Create a new row with input fields
        let row = `
            <tr>
                <td><textarea name="" rows="5" cols="50" style="width:500px; height:200px;"></textarea></td>           
                <td><input type="text" name="" style="width:100px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
                <td><input type="text" name="" style="width:20px"></input></td>
            </tr>
        `;

        // Append the new row to the table body
        $('#table-body').append(row);
    });
});
