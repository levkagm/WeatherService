<?php

/**
 * Class WeatherService
 */
class WeatherService
{
	/**
	 *
	 * @var WeatherAdapterInterface
	 */
	private $adapter;

    /**
     * WeatherService constructor.
     * @param WeatherAdapterInterface $adapter
     */
	function __construct(WeatherAdapterInterface $adapter) {
		$this->adapter = $adapter;
	}

    /**
     * @param array $params
     * @return WeatherModel
     */
	public function getWeather(array $params): WeatherModel
	{
		return $this->adapter->getWeather($params);
	}
}