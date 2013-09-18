<?php
/*
 * This file is part of the Cqrs package.
 * (c) Manfred Weber <manfred.weber@gmail.com> and Alexander Miertsch <kontakt@codeliner.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cqrs\Bus;

use Test\Mock;
use Cqrs\Gate;
use Cqrs\Command\ClassMapCommandHandlerLoader;
use Cqrs\Event\ClassMapEventListenerLoader;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-09-16 at 23:33:58.
 */
class AbstractBusTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AbstractBus
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $classMapCommandHandlerLoader = new ClassMapCommandHandlerLoader();
        $classMapEventListenerLoader = new ClassMapEventListenerLoader();
        $this->object = new Mock\Bus\BusMock($classMapCommandHandlerLoader, $classMapEventListenerLoader);
        Gate::getInstance()->pipe($this->object);
    }

    /**
     * @covers Cqrs\Bus\AbstractBus::invokeCommand
     */
    public function testInvokeCommand__withCommandHandlerDefinition()
    {
        $this->object->mapCommand(
            'Test\Mock\Command\MockCommand', 
            array(
                'alias' => 'Test\Mock\Command\MockCommandHandler',
                'method' => 'handleCommand'
            )
        );
        
        $mockCommand = new Mock\Command\MockCommand();
        
        Gate::getInstance()->getBus('mock_bus')->invokeCommand($mockCommand);
        
        //The MockCommandHandler should call $mockCommand->edit(), otherwise
        //$mockCommand->isEdited() returns false
        $this->assertTrue($mockCommand->isEdited());
    }
    
    /**
     * @covers Cqrs\Bus\AbstractBus::invokeCommand
     */
    public function testInvokeCommand__withCallableCommandHandler()
    {
        $this->object->mapCommand(
            'Test\Mock\Command\MockCommand', 
            function($command, $gate) {
                $command->edit();
            }
        );
        
        $mockCommand = new Mock\Command\MockCommand();
        
        Gate::getInstance()->getBus('mock_bus')->invokeCommand($mockCommand);
        
        //The MockCommandHandler should call $mockCommand->edit(), otherwise
        //$mockCommand->isEdited() returns false
        $this->assertTrue($mockCommand->isEdited());
    }

    /**
     * @covers Cqrs\Bus\AbstractBus::registerEventListener
     * @todo   Implement testRegisterEventListener().
     */
    public function testRegisterEventListener()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Cqrs\Bus\AbstractBus::dispatchEvent
     * @todo   Implement testDispatchEvent().
     */
    public function testPublishEvent()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

}