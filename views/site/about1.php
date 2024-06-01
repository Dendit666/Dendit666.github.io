<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Карта маршрутов СПб';
// $this->params['breadcrumbs'][] = $this->title;
?>

<!-- <div class="site-about"> -->
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <!-- <style>
        .site-about {
            justify-content: center;
            text-align: center;
        }
    </style> -->
<!-- </div> -->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание троллейбусов Горэлектротранса СПб</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Расписание троллейбусов СПб</h2>
    <table>
        <thead>
            <tr>
                <th>Маршрут</th>
                <th>Начальная остановка</th>
                <th>Конечная остановка</th>
                <th>Интервал движения</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Троллейбус №1</td>
                <td>Площадь Восстания</td>
                <td>Улица Савушкина</td>
                <td>8 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №2</td>
                <td>Улица Большевиков</td>
                <td>Улица Дыбенко</td>
                <td>12 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №3</td>
                <td>Станция метро Лесная</td>
                <td>Улица Дыбенко</td>
                <td>10 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №4</td>
                <td>Площадь Восстания</td>
                <td>Станция метро Лесная</td>
                <td>15 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №5</td>
                <td>Площадь Восстания</td>
                <td>Улица Савушкина</td>
                <td>8 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №6</td>
                <td>Улица Дыбенко</td>
                <td>Площадь Восстания</td>
                <td>10 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №7</td>
                <td>Улица Большевиков</td>
                <td>Станция метро Лесная</td>
                <td>8 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №8</td>
                <td>Улица Дыбенко</td>
                <td>Улица Большевиков</td>
                <td>12 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №9</td>
                <td>Площадь Восстания</td>
                <td>Улица Савушкина</td>
                <td>8 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №10</td>
                <td>Улица Большевиков</td>
                <td>Улица Дыбенко</td>
                <td>12 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №11</td>
                <td>Станция метро Лесная</td>
                <td>Улица Дыбенко</td>
                <td>10 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №15</td>
                <td>Станция метро Лесная</td>
                <td>Улица Дыбенко</td>
                <td>10 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №16</td>
                <td>Улица Большевиков</td>
                <td>Площадь Восстания</td>
                <td>12 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №22</td>
                <td>Площадь Восстания</td>
                <td>Станция метро Лесная</td>
                <td>15 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №29</td>
                <td>Улица Савушкина</td>
                <td>Улица Большевиков</td>
                <td>15 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №32</td>
                <td>Улица Дыбенко</td>
                <td>Площадь Восстания</td>
                <td>10 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №35</td>
                <td>Улица Большевиков</td>
                <td>Станция метро Лесная</td>
                <td>8 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №41</td>
                <td>Улица Дыбенко</td>
                <td>Улица Большевиков</td>
                <td>12 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №44</td>
                <td>Площадь Восстания</td>
                <td>Улица Савушкина</td>
                <td>8 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №45</td>
                <td>Станция метро Лесная</td>
                <td>Улица Дыбенко</td>
                <td>10 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №46</td>
                <td>Улица Большевиков</td>
                <td>Площадь Восстания</td>
                <td>12 минут</td>
            </tr>
            <tr>
                <td>Троллейбус №48</td>
                <td>Улица Савушкина</td>
                <td>Улица Большевиков</td>
                <td>15 минут</td>
            </tr>
        </tbody>
    </table>
</body>




    <!-- <p>
        This is the About page. You may modify the following file to customize its content:
    </p> -->

    <!-- <code><?= __FILE__ ?></code> -->

<!-- <link href="../site/master.css" rel="stylesheet">
<div id="FlexContainer1">
<div id="Html2">
<iframe src="https://transportmap.ru/maps/SPb/leaflet.html" style="width: 100%; height: 100%;">
</iframe></div>
</div> -->
