<?php

/**
 * Class FileSaverFactory
 */
class FileSaverFactory
{
	
	public const FORMAT_XML = 'xml';
	public const FORMAT_JSON = 'json';


    /**
     * @param string $format
     * @return FileSaverJson|FileSaverXml
     */
	public static function create(string $format) {
		switch ($format)
		{
			case self::FORMAT_XML:
				$object = new FileSaverXml();
				break;
			case self::FORMAT_JSON:
			default :
				$object = new FileSaverJson();
				break;
		}
		return $object;
	}
}