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
 *  Lousson\AnyException interface definition
 *
 *  @package    org.lousson.exception
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson;

/**
 *  An interface for exceptions
 *
 *  The AnyException interface serves as the base for all exceptions that
 *  are raised by implementations of the methods defined in the Lousson
 *  namespace.
 *
 *  It has been introduced in order to provide a unified interface that
 *  identifies Lousson-specific exceptions, and to define common status
 *  codes. Note that these codes are almost identical to the well-known
 *  HTTP status codes; although derived interfaces and concrete classes
 *  may define additional ones.
 *
 *  @since      lousson/Lousson_Exception-0.1.0
 *  @package    org.lousson.exception
 */
interface AnyException
{
    /**
     *  An error code to indicate unknown issues
     *
     *  @var int
     */
    const E_UNKNOWN = 000;

    /**
     *  An error code to indicate multiple choices
     *
     *  @var int
     */
    const E_MULTIPLE_CHOICES = 300;

    /**
     *  An error code to indicate invalid input or arguments
     *
     *  @var int
     */
    const E_INVALID = 400;

    /**
     *  An error code to indicate missing access credentials
     *
     *  @var int
     */
    const E_UNAUTHORIZED = 401;

    /**
     *  An error code to indicate attempts to access restricted resources
     *
     *  @var int
     */
    const E_FORBIDDEN = 403;

    /**
     *  An error code to indicate that an entity could not be found
     *
     *  @var int
     */
    const E_NOT_FOUND = 404;

    /**
     *  An error code to indicate that an operation is not allowed
     *
     *  @var int
     */
    const E_NOT_ALLOWED = 405;

    /**
     *  An error code to indicate that a callers requirements cannot be met
     *
     *  @var int
     */
    const E_NOT_ACCEPTABLE = 406;

    /**
     *  An error code to indicate timeouts in general
     *
     *  @var int
     */
    const E_TIMEOUT = 408;

    /**
     *  An error code to indicate conflicts in general
     *
     *  @var int
     */
    const E_CONFLICT = 409;

    /**
     *  An error code to indicate that an entity is not available any more
     *
     *  @var int
     */
    const E_GONE = 410;

    /**
     *  An error code to indicate that a length specification is required
     *
     *  @var int
     */
    const E_LENGTH_REQUIRED = 411;

    /**
     *  An error code to indicate unmet conditions in general
     *
     *  @var int
     */
    const E_PRECONDITION_FAILED = 412;

    /**
     *  An error code to indicate too large entities
     *
     *  @var int
     */
    const E_ENTITY_TOO_LARGE = 413;

    /**
     *  An error code to indicate types not supported
     *
     *  @var int
     */
    const E_UNSUPPORTED_TYPE = 415;

    /**
     *  An error code to indicate invalid ranges or slices
     *
     *  @var int
     */
    const E_RANGE_NOT_SATISFIABLE = 416;

    /**
     *  An error code to indicate failed expectations or assertions
     *
     *  @var int
     */
    const E_EXPECTATION_FAILED = 417;

    /**
     *  An error code to indicate internal errors in general
     *
     *  @var int
     */
    const E_INTERNAL_ERROR = 500;

    /**
     *  An error code to indicate missing implementations
     *
     *  @var int
     */
    const E_NOT_IMPLEMENTED = 501;

    /**
     *  An error code to indicate issues with available external resources
     *
     *  @var int
     */
    const E_BAD_GATEWAY = 502;

    /**
     *  An error code to indicate unavailable external resources
     *
     *  @var int
     */
    const E_UNAVAILABLE = 503;

    /**
     *  An error code to indicate external resource timeouts
     *
     *  @var int
     */
    const E_GATEWAY_TIMEOUT = 504;

    /**
     *  An error code to indicate version conflicts in general
     *
     *  @var int
     */
    const E_VERSION_NOT_SUPPORTED = 505;

    /**
     *  Obtain the exception's message
     *
     *  The getMessage() method returns the exception- or error-message of
     *  the current exception instance. This is, usually, the same message
     *  as given to the constructor.
     *
     *  @return string
     *          The exception's message is returned on success
     *
     *  @link   http://php.net/manual/en/exception.getmessage.php
     *  @link   http://php.net/manual/en/exception.construct.php
     */
    public function getMessage();

    /**
     *  Obtain the exception's code
     *
     *  The getCode() method returns the exception- or error-code that is
     *  associated with the exception instance - usually the one given to
     *  the constructor.
     *
     *  @return int
     *          The exception's code is returned on success
     *
     *  @link   http://php.net/manual/en/exception.getcode.php
     *  @link   http://php.net/manual/en/exception.construct.php
     */
    public function getCode();

    /**
     *  Obtain the previous exception,
     *
     *  The getPrevious() method returns the previous exception, the one
     *  given to the constructor, if any. NULL is returned in case no such
     *  instance is associated with the current exception.
     *
     *  @return \Exception
     *          Either an exception object or NULL is returned on success
     *
     *  @link   http://php.net/manual/en/exception.getprevious.php
     *  @link   http://php.net/manual/en/exception.construct.php
     */
    public function getPrevious();

    /**
     *  Obtain the exception's trace
     *
     *  The getTrace() method returns the exception's trace as a numeric
     *  array of one or more items, each of whose is an associative array
     *  describing a step on the stack trace.
     *
     *  @return array
     *          The exception's trace as an array is returned on success
     *
     *  @link   http://php.net/manual/en/exception.gettrace.php
     *  @link   http://php.net/manual/en/function.debug-backtrace.php
     */
    public function getTrace();

    /**
     *  Obtain the exception's trace
     *
     *  The getTraceAsString() method returns the exception's trace as a
     *  string, e.g. for logging purposes.
     *
     *  @return string
     *          The exception's trace as a string is returned on success
     *
     *  @link   http://php.net/manual/en/exception.gettraceasstring.php
     *  @link   http://php.net/manual/en/function.debug-backtrace.php
     */
    public function getTraceAsString();
}

