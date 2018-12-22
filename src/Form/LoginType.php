<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 22-12-2018 06:41
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( '_username', TextType::class )
            ->add( '_password', PasswordType::class );
    }
}
