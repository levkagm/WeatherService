<?php

require_once 'Autoloader.php';

// setup incoming params
$params = [
	'city' => 'Kiev',
	'country' => 'ua',
	'format' => 'json',
	'language' => 'en',
	'tempconv' => 'C' // must be 'C' or 'F'
];
$pathName = __DIR__.'/Results/weather_'.$params['city'].'_'.date('Y-m-d_H:i:s');

$weatherServiceFactory = new WeatherServiceFactory();

$weatherService = $weatherServiceFactory->create('openweathermap');
$weatherModel = $weatherService->getWeather($params);

$saverServiceFactory = new FileSaverFactory();

$saverService = $saverServiceFactory->create($params['format']);
$result = $saverService->save($weatherModel, $pathName);

if ($result) {
	echo 'Success';
} else {
	echo 'Failed';
}

// TODO: проверить соответствие заданию полное!
// TODO: переделать в условиях 'imperial' и 'metric' на 'F' и 'С' соответсвтенно