<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 10-12-2018 16:20
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Utils;

interface MessageDomain
{
    public const TEACHER = 'teacher';
    public const STUDENT = 'student';
    public const VALIDATORS = 'validators';
    public const WELCOME = 'welcome';
    public const AUTHENTICATION = 'authentication';
    public const ERROR = 'error';

}