<?php

/**
 * Class FileSaverXml
 */
class FileSaverXml implements FileSaverInterface
{
    /**
     * @param WeatherModel $model
     * @param string $pathName
     * @return bool
     */
	public function save(WeatherModel $model, string $pathName): bool
	{
		
		try {
			$xml = new DOMDocument("1.0", "UTF-8");
			$xml->formatOutput = TRUE;

			// Create and append elements.
			$root = $xml->createElement('root');
			
			$root->appendChild($xml->createElement('windSpeed', $model->getWindSpeed()));
			$root->appendChild($xml->createElement('temperature', $model->getTemperature()));
			$root->appendChild($xml->createElement('tempConv', $model->getTempConv()));
			$root->appendChild($xml->createElement('windDirect', $model->getWindDirect()));
			$root->appendChild($xml->createElement('date', $model->getDate()->format('Y-m-d H:i:s')));
			$root->appendChild($xml->createElement('city', $model->getCity()));
			
			$xml->appendChild($root);
			
			$file = $pathName.'.xml';
			if (!$xml->save($file)) {
				throw new Exception("Сan't write to the XML file");
			}
			
			return TRUE;
		} catch (Exception $ex) {
			echo $ex;
			return FALSE;
		}
		
	}
	
}