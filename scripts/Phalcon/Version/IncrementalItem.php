<?php

/*
  +------------------------------------------------------------------------+
  | Phalcon Developer Tools                                                |
  +------------------------------------------------------------------------+
  | Copyright (c) 2011-2016 Phalcon Team (http://www.phalconphp.com)       |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file docs/LICENSE.txt.                        |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Andres Gutierrez <andres@phalconphp.com>                      |
  |          Eduar Carvajal <eduar@phalconphp.com>                         |
  +------------------------------------------------------------------------+
*/

namespace Phalcon\Version;

/**
 * Item Class
 *
 * Allows to manipulate version texts
 *
 * @package Phalcon\Version
 */
class IncrementalItem implements ItemInterface
{
    /**
     * @var string
     */
    private $_version;

    /**
     * @var int|string
     */
    private $_versionStamp = 0;

    /**
     * @var array
     */
    private $_parts = array();

    /**
     * @var array
     */
    private $_options = array();


    /**
     * @param string $version String representation of the version
     * @param array  $options Item specific options
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($version, array $options = [])
    {
        if (1 !== preg_match('#[a-z0-9](\.[a-z0-9]+)*#', $version, $matches)) {
            throw new \InvalidArgumentException('Wrong version number provided');
        }

        // Keep options
        $this->_options = $options;

        // Version partials
        $numberParts = isset($options['numberParts']) ? $options['numberParts'] : 3;

        $n = 9;
        $versionStamp = 0;
        $version = trim($matches[0]);
        $this->_parts = explode('.', $version);
        $nParts = count($this->_parts);
        if ($nParts < $numberParts) {
            for ($i = $numberParts; $i >= $nParts; $i--) {
                $this->_parts[] = '0';
                $version .= '.0';
            }
        } else {
            if ($nParts > $numberParts) {
                for ($i = $nParts; $i <= $numberParts; $i++) {
                    if (isset($this->_parts[$i - 1])) {
                        unset($this->_parts[$i - 1]);
                    }
                }
                $version = join('.', $this->_parts);
            }
        }
        foreach ($this->_parts as $part) {
            if (is_numeric($part)) {
                $versionStamp += $part * pow(10, $n);
            } else {
                $versionStamp += ord($part) * pow(10, $n);
            }
            $n -= 3;
        }
        $this->_versionStamp = $versionStamp;
        $this->_version = $version;
    }

    /**
     * Get integer payload of the version
     *
     * @return integer
     */
    public function getStamp()
    {
        return (int) $this->_versionStamp;
    }

    /**
     * Return string representation of the increased minor version
     *
     * @param integer $number Increment
     *
     * @return string
     */
    public function addMinor($number = 1)
    {
        $parts = array_reverse($this->_parts);
        if (isset($parts[0])) {
            if (is_numeric($parts[0])) {
                $parts[0] += $number;
            } else {
                $parts[0] = ord($parts[0]) + $number;
            }
        }

        return new self(join('.', array_reverse($parts)), $this->_options);
    }

    /**
     * Get the string representation of the version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * Get the string representation of the version
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getVersion();
    }
}
