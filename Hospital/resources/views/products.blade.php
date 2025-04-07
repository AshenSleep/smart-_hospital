<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Работа с товарами</title>
</head>
<body>
    <h1>Товары</h1>
    <button onclick="getExpensiveProducts()">Получить товары</button>
    <div id="productResults"></div>

    <h2>Обновление цен</h2>
    <label for="increaseColor">Цвет для повышения цены:</label>
    <input type="text" id="increaseColor" placeholder="Введите цвет для повышения">
    
    <label for="decreaseColor">Цвет для понижения цены:</label>
    <input type="text" id="decreaseColor" placeholder="Введите цвет для понижения">
    
    <button onclick="updatePrices()">Обновить цены</button>
    <div id="updateResult"></div>

    <script>
    
        function getExpensiveProducts() {
            fetch('/api/products/expensive')
                .then(response => response.json())
                .then(data => {
                    let html = '<ul>';
                    data.forEach(item => {
                        html += `<li>ID: ${item.id}, ${item.name} – ${item.price} (${item.color})</li>`;
                    });
                    html += '</ul>';
                    document.getElementById('productResults').innerHTML = html;
                })
                .catch(error => {
                    document.getElementById('productResults').innerHTML = 'Ошибка получения данных';
                    console.error(error);
                });
        }

        function updatePrices() {
            const increaseColor = document.getElementById('increaseColor').value;
            const decreaseColor = document.getElementById('decreaseColor').value;

            fetch('/api/products/update-prices', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    increaseColor: increaseColor,
                    decreaseColor: decreaseColor
                })
            })
                .then(response => response.json())
                .then(data => {

                    if (data.error) {
                        document.getElementById('updateResult').innerHTML = data.error;
                    } else {
                        document.getElementById('updateResult').innerHTML = data.message;

                        getExpensiveProducts(); 
                    }
                })
                .catch(error => {
                    document.getElementById('updateResult').innerHTML = 'Ошибка обновления цен';
                    console.error(error);
                });
        }
    </script>
</body>
</html>
