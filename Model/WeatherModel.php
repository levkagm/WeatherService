<?php

/**
 * Class WeatherModel
 */
class WeatherModel
{
	/**
	 *
	 * @var int
	 */
	private $windSpeed;
	
	/**
	 *
	 * @var int
	 */
	private $temperature;
	
	/**
	 *
	 * @var string
	 */
	private $tempConv;
	/**
	 *
	 * @var int
	 */
	private $windDirect;
	/**
	 *
	 * @var \DateTime
	 */
	private $date;
	
	/**
	 *
	 * @var string 
	 */
	private $city;

    /**
     * @return int
     */
	public function getWindSpeed(): int {
		return $this->windSpeed;
	}

    /**
     * @return int
     */
	public function getTemperature(): int {
		return $this->temperature;
	}

    /**
     * @return string
     */
	public function getTempConv(): string {
		return $this->tempConv;
	}

    /**
     * @return int
     */
	public function getWindDirect(): int {
		return $this->windDirect;
	}

    /**
     * @return DateTime
     */
	public function getDate(): \DateTime {
		return $this->date;
	}

    /**
     * @return string
     */
	public function getCity(): string {
		return $this->city;
	}

    /**
     * @param int $windSpeed
     * @return WeatherModel
     */
	public function setWindSpeed(int $windSpeed): WeatherModel {
		$this->windSpeed = $windSpeed;
		return $this;
	}

    /**
     * @param int $temperature
     * @return WeatherModel
     */
	public function setTemperature(int $temperature): WeatherModel {
		$this->temperature = $temperature;
		return $this;
	}

    /**
     * @param string $tempConv
     * @return WeatherModel
     */
	public function setTempConv(string $tempConv): WeatherModel {
		$this->tempConv = $tempConv;
		return $this;
	}

    /**
     * @param int $windDirect
     * @return WeatherModel
     */
	public function setWindDirect(int $windDirect): WeatherModel {
		$this->windDirect = $windDirect;
		return $this;
	}

    /**
     * @param DateTime $date
     * @return WeatherModel
     */
	public function setDate(\DateTime $date): WeatherModel {
		$this->date = $date;
		return $this;
	}

    /**
     * @param string $city
     * @return WeatherModel
     */
	public function setCity(string $city): WeatherModel {
		$this->city = $city;
		return $this;
	}
	
}