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
 *  Definition of the Lousson\Error\InvalidArgumentError class
 *
 *  @package    org.lousson.error
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson\Error;

/** Dependencies: */
use Lousson\AnyException;
use Exception;
use InvalidArgumentException;

/**
 *  An exception class for invalid argument errors
 *
 *  The InvalidArgumentError is an exception class to be raised when an
 *  invalid argument has been provided. It extends the Standard Library's
 *  InvalidArgumentException and implements the AnyException interface.
 *
 *  @since      lousson/error-0.1.0
 *  @package    org.lousson.error
 *  @link       http://php.net/manual/en/class.invalidargumentexception.php
 *  @link       http://php.net/manual/en/spl.exceptions.php
 */
class InvalidArgumentError
    extends InvalidArgumentException
    implements AnyException
{
    /**
     *  Create an exception instance
     *
     *  The constructor provides the exact same interface as PHP's native
     *  Exception class, but defines a custom code to be used by default.
     *
     *  @param  string      $message    The exception's message
     *  @param  int         $code       The exception's code
     *  @param  Exception   $previous   The previous exception, if any
     *
     *  @link   http://php.net/manual/en/exception.construct.php
     *  @link   http://php.net/manual/en/language.exceptions.extending.php
     */
    public function __construct(
        $message = null,
        $code = self::E_INVALID,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}

