<?php
/*
 * This file is part of the Cqrs package.
 * (c) Manfred Weber <crafics@php.net> and Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Malocher\Cqrs\Configuration;

/**
 * Class ConfigurationException
 *
 * @author Manfred Weber <crafics@php.net>
 * @package Malocher\Cqrs\Configuration
 */
class ConfigurationException extends \Exception
{
    /**
     * Creates a new ConfigurationException describing a initialize error.
     *
     * @param string $message Exception message
     * @return ConfigurationException
     */
    public static function initializeError($message)
    {
        return new self('[Initialize Error] ' . $message . "\n");
    }

}
