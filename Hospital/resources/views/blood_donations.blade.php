<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Подсчёт объёма крови</title>
</head>
<body>
    <h1>Общий объём сданной крови</h1>
    <label for="dateFrom">Дата от:</label>
    <input type="date" id="dateFrom">
    <br>
    <label for="dateTo">Дата до:</label>
    <input type="date" id="dateTo">
    <br>
    <button onclick="getTotal()">Показать объём</button>
    <div id="result"></div>

    <script>
        function getTotal(){
            const dateFrom = document.getElementById('dateFrom').value;
            const dateTo = document.getElementById('dateTo').value;
            fetch(`/api/blood-donations/total?date_from=${dateFrom}&date_to=${dateTo}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerHTML = `Общий объём сданной крови: ${data.total_volume} мл`;
                })
                .catch(error => {
                    document.getElementById('result').innerHTML = 'Ошибка получения данных';
                    console.error(error);
                });
        }
    </script>
</body>
</html>
