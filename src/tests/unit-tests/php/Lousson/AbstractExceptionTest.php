<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 textwidth=75: *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Copyright (c) 2013, The Lousson Project                               *
 *                                                                       *
 * All rights reserved.                                                  *
 *                                                                       *
 * Redistribution and use in source and binary forms, with or without    *
 * modification, are permitted provided that the following conditions    *
 * are met:                                                              *
 *                                                                       *
 * 1) Redistributions of source code must retain the above copyright     *
 *    notice, this list of conditions and the following disclaimer.      *
 * 2) Redistributions in binary form must reproduce the above copyright  *
 *    notice, this list of conditions and the following disclaimer in    *
 *    the documentation and/or other materials provided with the         *
 *    distribution.                                                      *
 *                                                                       *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   *
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     *
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS     *
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE        *
 * COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,            *
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES    *
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR    *
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)    *
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,   *
 * STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)         *
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED   *
 * OF THE POSSIBILITY OF SUCH DAMAGE.                                    *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
 *  Lousson\AbstractExceptionTest class definition
 *
 *  @package    org.lousson.error
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson;

/** Dependencies: */
use Lousson\AnyException;
use Exception;
use PHPUnit_Framework_TestCase;

/**
 *  An abstract test case for exceptions
 *
 *  @since      lousson/error-0.1.0
 *  @package    org.lousson.error
 */
abstract class AbstractExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     *  Obtain the exception to test
     *
     *  The getException() method returns the exception instance to be
     *  tested, according to the given $args - e.g. as provided by the
     *  provideExceptionParameters() method).
     *
     *  @param  array               $args       The exception arguments
     *
     *  @return \Exception
     *          An exception instance is returned on success
     */
    abstract public function getException(array $args);

    /**
     *  Obtain a list of implemented interfaces
     *
     *  The getExpectedInterfaces() method returns a list of zero or more
     *  interface names, each referring to an interface the exception that
     *  is returned by the getException() method is expected to implement.
     *
     *  @return array
     *          A list of interface names is returned on success
     */
    public function getExpectedInterfaces()
    {
        return array("Lousson\\AnyException");
    }

    /**
     *  Obtain a list of base classes
     *
     *  The getExpectedClasses() method returns a list of zero or more
     *  class names, each referring to a class the exception returned by
     *  the getException() method is expected to be derived from.
     *
     *  @return array
     *          A list of class names is returned on success
     */
    public function getExpectedClasses()
    {
        return array();
    }

    /**
     *  Provide parameters to create exception instances
     *
     *  The provideExceptionParameters() method is a data provider for
     *  e.g. the testExceptionClass() method. It returns an array of many
     *  items, each of whose is an array itself, where the first (and only)
     *  item is a valid input for the getException() method.
     *
     *  @return array
     *          A list of exception parameters is returned on success
     */
    public function provideExceptionParameters()
    {
        $p[][] = array(null);
        $p[][] = array(null, null);
        $p[][] = array(null, null, new Exception());
        $p[][] = array(null, 0);
        $p[][] = array(null, 0, new Exception());
        $p[][] = array(null, 123);
        $p[][] = array(null, 123, new Exception());
        $p[][] = array("");
        $p[][] = array("", null);
        $p[][] = array("", null, new Exception());
        $p[][] = array("", 0);
        $p[][] = array("", 0, new Exception());
        $p[][] = array("", 123);
        $p[][] = array("", 123, new Exception());
        $p[][] = array("foo");
        $p[][] = array("foo", null);
        $p[][] = array("foo", null, new Exception());
        $p[][] = array("foo", 0);
        $p[][] = array("foo", 0, new Exception());
        $p[][] = array("foo", 123);
        $p[][] = array("foo", 123, new Exception());
        $p[][] = array();

        return $p;
    }

    /**
     *  Test exception classes
     *
     *  The testExceptionClass() method is a test case that attempts to
     *  obtain exception instances from the tests getException() method
     *  (using the $parameters provided), and also verifies the instance
     *  being a descendant of the expected classes and interfaces.
     *
     *  @param  array               $parameters The exception parameters
     *
     *  @dataProvider               provideExceptionParameters
     *  @test
     *
     *  @throws \PHPUnit_Framework_AssertionFailedError
     *          Raised in case any of the test's assertions failed
     *
     *  @throws \Exception
     *          Raised in case of an internal error
     */
    public function testExceptionClass(array $parameters)
    {
        $error = $this->getException($parameters);
        $testClass = get_class($this);

        $this->assertInstanceOf(
            "Exception", $error,
            "The $testClass::getException() method must return an ".
            "instance of PHP's Exception class"
        );

        $errorClass = get_class($error);

        foreach ($this->getExpectedInterfaces() as $i) {
            $message = "The $errorClass must implement the $i interface";
            $this->assertInstanceOf($i, $error, $message);
        }

        foreach ($this->getExpectedClasses() as $c) {
            $message = "The $errorClass must extend the $c class";
            $this->assertInstanceOf($i, $error, $message);
        }
    }
}

