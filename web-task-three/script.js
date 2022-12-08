var current = 0;
var cells = ["cell-1", "cell-2", "cell-3", "cell-4"]


document.getElementById('create').addEventListener('click', сreateTable);

function сreateTable() {
    if (document.getElementById('table')) {
      alert('Таблица уже создана.');
      return;
    }

    const table = document.createElement('table');
    table.setAttribute('id', 'table');
    document.getElementById('table-holder').append(table);
    addButton.disabled = false;
    rmButton.disabled = false;
}


const addButton = document.getElementById('add');
addButton.addEventListener('click', newRow);

function newRow() {
    current++;
    const row =  document.createElement('tr');
    row.setAttribute('id', 'rowNumber'+`${current}`);
    document.getElementById('table').append(row);

    newCell(row, 'id', `${current}`)
    for (let i = 0; i < cells.length; i++) {
        newCell(row, i, cells[i]);
    }
}

function newCell(row, cellClass, content) {
    const id = document.createElement('td');
    id.setAttribute('class', cellClass);
    id.innerHTML += `${content}`;
    row.append(id);
}


const rmButton = document.getElementById('rm');
rmButton.addEventListener('click', rm);

function rm(){
    var rmId = document.getElementById('rmId').value;
    if (!rmId.match(/^[0-9]+$/)) {
        alert("Wrong input.");
        return;
    }

    var row = document.getElementById('rowNumber' + rmId);
    if (!row) {
      alert("Такой строки не существует.");
      return false;
    }
    
    row.remove();
}
