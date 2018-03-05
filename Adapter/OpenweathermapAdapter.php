<?php

/**
 * Class OpenweathermapAdapter
 */
class OpenweathermapAdapter implements WeatherAdapterInterface
{
	private const API_KEY = 'ac7c898554b92455a207f514b1b37c91';
	private const API_URL = 'http://api.openweathermap.org/data/2.5/weather';

    /**
     * @param array $params
     * @return WeatherModel
     */
	public function getWeather(array $params): WeatherModel
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_URL, $this->prepareUrl($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$res = curl_exec($curl);
		curl_close($curl);
		
		$data = json_decode($res, TRUE);
		
		$weatherModel = new WeatherModel();
		
		$weatherModel->setTempConv($params['tempconv'])
			->setTemperature(round($data['main']['temp']))
			->setWindSpeed($data['wind']['speed'])
			->setWindDirect($data['wind']['deg'])
			->setDate(new DateTime(strtotime($data['dt'])))
			->setCity($data['name']);

		return $weatherModel;
	}

    /**
     * @param array $params
     * @return string
     */
	private function prepareUrl(array $params): string {

		$preparedUrl = self::API_URL.'?';
		if ($params['city']) {
			$preparedUrl .= 'q='.ucfirst($params['city']);
			if ($params['country']) {
				$preparedUrl .= ','.$params['country']; // use ISO 3166 country codes
			}
			if ($params['language']) {
				$preparedUrl .= '&lang='.strtolower($params['language']);
			}
			if ($params['tempconv']) {
			    $tempConv = strtoupper($params['tempconv']) == 'C' ? 'metric' : 'imperial';
				$preparedUrl .= '&units='.$tempConv;
			}
		} else {
			$preparedUrl .= 'q=Moscow,ru&units=metric';
		}
		
		$preparedUrl .= '&appid='.self::API_KEY;

		return $preparedUrl;
	}
}