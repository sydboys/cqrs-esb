<?php
/*
 * This file is part of the Cqrs package.
 * (c) Manfred Weber <crafics@php.net> and Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Iteration\Iteration5;

use Malocher\Cqrs\Event\EventInterface;
use Malocher\Cqrs\Message\Message;

/**
 * Class Iteration5Event
 *
 * @author Manfred Weber <crafics@php.net>
 * @package Iteration\Iteration5
 */
class Iteration5Event extends Message implements EventInterface
{
    /**
     * @var bool
     */
    protected $edited = false;

    /**
     *
     */
    public function edit()
    {
        $this->edited = true;
    }

    /**
     * @return bool
     */
    public function isEdited()
    {
        return $this->edited;
    }
}
