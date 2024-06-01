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
    <title>Карта маршрутов СПб</title>
    <style>
        /* body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        } */
        #main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            text-align: center;
        }
        .title-container {
            margin-bottom: 20px;
        }
        .legend-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .legend-container .title {
            margin-right: 10px;
        }
        .legend span {
            display: inline-block;
            margin-right: 15px;
        }
        .legend .tram {
            color: red;
        }
        .legend .trolleybus {
            color: blue;
        }
        .legend .city-bus {
            color: green;
        }
        .legend .suburban-bus {
            color: green;
        }
        .legend .commercial-bus {
            color: orange;
        }
        iframe {
            width: 100%;
            height: 75vh;
        }
    </style>
</head>
<body>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <div class="title-container">
                <h1>Карта маршрутов СПб</h1>
            </div>
            <div class="legend-container">
                <span class="title">УСЛОВНЫЕ ОБОЗНАЧЕНИЯ (легенда):</span>
                <div class="legend">
                    <span class="tram">ТРАМВАЙ</span>
                    <span class="trolleybus">ТРОЛЛЕЙБУС</span>
                    <span class="city-bus">АВТОБУС ГОРОДСКОЙ</span>
                    <span class="suburban-bus">ОБЛАСТНОЙ</span>
                    <span class="commercial-bus">КОММЕРЧЕСКИЙ</span>
                </div>
            </div>
            <iframe src="https://transportmap.ru/maps/SPb/leaflet.html"></iframe>
        </div>
    </main>
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
