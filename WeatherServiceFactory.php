<?php

/**
 * Class WeatherServiceFactory
 */
class WeatherServiceFactory
{

    /**
     * @var array
     */
	private $allowedAdapters = ['openweathermap'];

    /**
     * @param string $typeOfWeatherService
     * @return WeatherService
     * @throws Exception
     */
	public function create(string $typeOfWeatherService): WeatherService
	{
		switch ($typeOfWeatherService)
		{
			case 'openweathermap':
				$adapter = new OpenweathermapAdapter();
				break;
			default :
				throw new Exception('Can not create adapter');
				break;
		}
		
		return new WeatherService($adapter);
	}
}
