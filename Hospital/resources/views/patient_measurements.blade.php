<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Измерения пациента</title>
</head>
<body>
    <h1>Пациенты, у которых после обеда превышены нормы пульса и давления</h1>
    <button onclick="getExceedingMeasurements()">Получить данные</button>

    <div id="results"></div>

    <script>
        function getExceedingMeasurements(){
            fetch('/api/patients/measurements/after-noon')
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        document.getElementById('results').innerHTML = 'Нет превышений норм.';
                    } else {
                        let html = '<ul>';
                        data.forEach(item => {
                            html += `<li>Пациент ID: ${item.patient_id}, Время измерения: ${item.formatted_date}, Пульс – ${item.pulse}, Давление – ${item.pressure_systolic}/${item.pressure_diastolic}</li>`;
                        });
                        html += '</ul>';
                        document.getElementById('results').innerHTML = html;
                    }
                })
                .catch(error => {
                    document.getElementById('results').innerHTML = 'Ошибка получения данных';
                    console.error(error);
                });
        }
    </script>
</body>
</html>
