<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:44
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This is the base Teacher controller from which each Teacher controller inherits. Use this to define generic Teacher
 * utility methods.
 *
 * Class TeacherController
 * @package App\Controller\Teacher
 */
abstract class TeacherController extends AbstractController
{
    private const TRANS_DOMAIN = 'teacher';
    private const TRANS_ERROR_DOMAIN = 'error_message';

    /**
     * @var object|\Symfony\Component\Translation\DataCollectorTranslator|\Symfony\Component\Translation\IdentityTranslator
     */
    protected $teacherTranslator;

    /**
     * TeacherController constructor.
     */
    public function __construct()
    {
        $this->teacherTranslator = $this->get( 'translator' );
    }

    protected function getMessage( string $translationKey, string $domain = null ): string
    {
        return $this->teacherTranslator->trans( $translationKey, [],
            $domain ? self::TRANS_DOMAIN : $domain
        );
    }


}