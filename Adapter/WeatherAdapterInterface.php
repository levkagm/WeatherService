<?php

/**
 * Interface WeatherAdapterInterface
 */
interface WeatherAdapterInterface
{
    /**
     * @param array $params
     * @return WeatherModel
     */
	public function getWeather(array $params): WeatherModel;
}