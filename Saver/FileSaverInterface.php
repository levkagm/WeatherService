<?php

/**
 * Interface FileSaverInterface
 */
interface FileSaverInterface
{
    /**
     * @param WeatherModel $model
     * @param string $pathName
     * @return bool
     */
	public function save(WeatherModel $model, string $pathName): bool;			
}