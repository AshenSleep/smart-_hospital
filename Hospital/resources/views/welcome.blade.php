<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель тестирования API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f3f3f3;
        }
        h1 {
            color: #333;
        }
        .section {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        a.button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Панель API</h1>

    <div class="section">
        <h2>Измерения пациента</h2>
        <p>Позволяет получить пульс и давление пациентов, у которых повышенные показатели после обеда</p>
        <a class="button" href="{{ url('/patient-measurements') }}">Перейти к измерениям</a>
    </div>

    <div class="section">
        <h2>Донорство</h2>
        <p>Рассчитать общий объём сданной крови за выбранный промежуток времени.</p>
        <a class="button" href="{{ url('/blood-donations') }}">Перейти к кроводачам</a>
    </div>

    <div class="section">
        <h2>Работа с товарами</h2>
        <p>Показать товары и обновить цены по цвету.</p>
        <a class="button" href="{{ url('/products') }}">Перейти к товарам</a>
    </div>

</body>
</html>
