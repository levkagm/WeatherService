<?php

/**
 * Class FileSaverJson
 */
class FileSaverJson implements FileSaverInterface
{
    /**
     * @param WeatherModel $model
     * @param string $pathName
     * @return bool
     */
	public function save(WeatherModel $model, string $pathName): bool
	{
		$json = json_encode([
			'date' => $model->getDate()->format('Y-m-d H:i:s'),
			'temperature' => $model->getTemperature(),
			'windDirection' => $model->getWindDirect(),
			'windSpeed' => $model->getWindSpeed(),
			'temperatureConversion' => $model->getTempConv(),
			'city' => $model->getCity()
		]);
		
		try {
			if (!$file = fopen($pathName.'.json', 'a+')) {
				throw new Exception ("Can't create JSON file for writing");
			}
			if (!fwrite($file, $json)) {
				throw new Exception("Сan't write to the JSON file");
			}
			fclose($file);
			return TRUE;
		} catch (Exception $ex) {
			echo $ex;
			return FALSE;
		}
		
	}
	
}