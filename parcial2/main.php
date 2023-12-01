<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatoria API Consumer</title>
</head>
<body>

<h1>Sumatoria API Consumer</h1>

<form id="sumForm">
    <label for="valorN">Enter N:</label>
    <input type="number" id="valorN" name="valorN" required>
    <button type="button" onclick="sendValue()">Calculate Sumatoria</button>
</form>
<button type="button" onclick="updateTable()">Update Table</button>

<table border="1">
    <thead>
        <tr>
            <th>N</th>
            <th>Factorial</th>
            <th>Sumatoria</th>
        </tr>
    </thead>
    <tbody id="resultTableBody"></tbody>
</table>

<script>
    function sendValue() {
        var valorN = document.getElementById('valorN').value;
        fetch('http://localhost/DS7/parcial2/sumatoria.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'valor=' + valorN,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('La respuesta de la red no fue exitosa');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => console.error('Error:', error.message));
    }

    function updateTable() {
        fetch('http://localhost/DS7/parcial2/sumatoria.php?operation=getValues')
        .then(response => response.json())
        .then(data => {
            var tableBody = document.getElementById('resultTableBody');
            tableBody.innerHTML = '';

            data.forEach(result => {
                var row = document.createElement('tr');
                row.innerHTML = '<td>' + result.N + '</td><td>' + result.Factorial + '</td><td>' + result.Sumatoria + '</td>';
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>
