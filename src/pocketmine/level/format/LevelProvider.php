<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

namespace pocketmine\level\format;

use pocketmine\level\Level;
use pocketmine\math\Vector3;

interface LevelProvider{

	/**
	 * @param Level  $level
	 * @param string $path
	 */
	public function __construct(Level $level, $path);

	/** @return string */
	public function getPath();

	/**
	 * Tells if the path is a valid level.
	 * This must tell if the current format supports opening the files in the directory
	 *
	 * @param string $path
	 *
	 * @return true
	 */
	public static function isValid($path);

	/**
	 * Generate the needed files in the path given
	 *
	 * @param string  $path
	 * @param string  $name
	 * @param int     $seed
	 * @param string  $generator
	 * @param array[] $options
	 */
	public static function generate($path, $name, $seed, $generator, array $options = []);

	/**
	 * Returns the generator name
	 *
	 * @return string
	 */
	public function getGenerator();

	/**
	 * @return array
	 */
	public function getGeneratorOptions();

	/**
	 * Gets the Chunk object
	 * This method must be implemented by all the level formats.
	 *
	 * @param int  $X      absolute Chunk X value
	 * @param int  $Z      absolute Chunk Z value
	 * @param bool $create Whether to generate the chunk if it does not exist
	 *
	 * @return Chunk
	 */
	public function getChunk($X, $Z, $create = false);

	public function saveChunks();

	/**
	 * @param int $X
	 * @param int $Z
	 */
	public function saveChunk($X, $Z);

	public function unloadChunks();

	/**
	 * @param int $X
	 * @param int $Z
	 *
	 * @return bool
	 */
	public function loadChunk($X, $Z);

	/**
	 * @param int  $X
	 * @param int  $Z
	 * @param bool $safe
	 *
	 * @return bool
	 */
	public function unloadChunk($X, $Z, $safe = true);

	/**
	 * @param int $X
	 * @param int $Z
	 *
	 * @return bool
	 */
	public function isChunkGenerated($X, $Z);

	/**
	 * @param int $X
	 * @param int $Z
	 *
	 * @return bool
	 */
	public function isChunkPopulated($X, $Z);

	/**
	 * @param int $X
	 * @param int $Z
	 *
	 * @return bool
	 */
	public function isChunkLoaded($X, $Z);

	/**
	 * @param int         $chunkX
	 * @param int         $chunkZ
	 * @param SimpleChunk $chunk
	 *
	 * @return mixed
	 */
	public function setChunk($chunkX, $chunkZ, SimpleChunk $chunk);

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @return int
	 */
	public function getTime();

	/**
	 * @param int $value
	 */
	public function setTime($value);

	/**
	 * @return int
	 */
	public function getSeed();

	/**
	 * @param int $value
	 */
	public function setSeed($value);

	/**
	 * @return Vector3
	 */
	public function getSpawn();

	/**
	 * @param Vector3 $pos
	 */
	public function setSpawn(Vector3 $pos);

	/**
	 * @return Chunk
	 */
	public function getLoadedChunks();

	/**
	 * @return Level
	 */
	public function getLevel();

	public function close();

}