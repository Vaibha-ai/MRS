
function showbtns(){
    let buttonAdder = document.getElementById('addBtn');
// Fires on button click
    let table = document.getElementById('userTable');
    let rows = table.rows;
    // Loop through each row(except the header)
    for (let i = 1; i < rows.length; i++) {
        let cols = rows[i].cells;
        let lastCol = rows[i]['cells'][cols.length - 1];
        // Create a new button element
        let button = document.createElement('button');
        button.innerText = 'View';
        // Attach sayHi() function to 'onclick' attribute & pass row index
        button.setAttribute('onclick', `sayHi(${i})`);   // modified
        // Append the button to the last column
        lastCol.appendChild(button);
};
// Fires on 'View' button click
function sayHi(rowIdx) {
    let table = document.getElementById('userTable');
    let rows = table.rows;
    // Extract first & last Name
    let firstName = rows[rowIdx]['cells'][0].innerText;
    let lastName = rows[rowIdx]['cells'][1].innerText;
    alert(`Hi ${firstName} ${lastName}`);
}
}

