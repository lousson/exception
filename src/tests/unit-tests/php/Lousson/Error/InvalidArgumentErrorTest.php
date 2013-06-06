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
 *  Lousson\Error\InvalidArgumentErrorTest class definition
 *
 *  @package    org.lousson.exception
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson\Error;

/** Dependencies: */
use Lousson\AbstractExceptionTest;
use ReflectionClass;

/**
 *  A test case for the InvalidArgumentError class
 *
 *  @since      lousson/Lousson_Exception-0.1.0
 *  @package    org.lousson.exception
 */
class InvalidArgumentErrorTest extends AbstractExceptionTest
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
    public function getException(array $args)
    {
        $class = "Lousson\\Error\\InvalidArgumentError";
        $reflection = new ReflectionClass($class);
        $instance = $reflection->newInstanceArgs($args);
        return $instance;
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
        return array("ErrorException");
    }
}

