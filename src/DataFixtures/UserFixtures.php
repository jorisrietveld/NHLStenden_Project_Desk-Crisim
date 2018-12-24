<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @var string The available roles.
     */
    private const USER_ROLES
        = [
            [ 'ROLE_USER' ],
            [ 'ROLE_USER', 'ROLE_STUDENT' ],
            [ 'ROLE_USER', 'ROLE_SPECTATOR' ],
            [ 'ROLE_USER', 'ROLE_TEACHER' ],
            [ 'ROLE_USER', 'ROLE_LOGGER' ],
            [ 'ROLE_USER', 'ROLE_ADMIN' ],
        ];

    /**
     * @var int The amount of dummy records to generate for each user role
     */
    private $fixtureAmountOfEachType = 2;

    /**
     * @var UserPasswordEncoderInterface The password encoder for password
     *      hashing.
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct( UserPasswordEncoderInterface $passwordEncoder )
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load( ObjectManager $manager )
    {
        $manager->persist(
            $this->createUser(
                'admin',
                'password',
                [
                    'ROLE_USER',
                    'ROLE_ADMIN',
                ]
            )
        );
        $manager->persist(
            $this->createUser(
                'student',
                'password',
                [
                    'ROLE_USER',
                    'ROLE_STUDENT',
                ]
            )
        );
        $manager->persist(
            $this->createUser(
                'teacher',
                'password',
                [
                    'ROLE_USER',
                    'ROLE_TEACHER',
                ]
            )
        );

        // Save all created users in 1 go to the database.
        $manager->flush();
    }

    /**
     * @param string $username
     * @param string $password
     * @param array  $roles
     * @return \App\Entity\User
     */
    private function createUser(
        string $username,
        string $password,
        array $roles
    ): User {
        $user = new User();
        $user->setUsername( $username );
        $user->setRoles( $roles );

        // Set the plain password only for development and testing.
        $user->setPlainPassword( $password );

        // Encode the password and add it to the account.
        $user->setPassword(
            $this->passwordEncoder->encodePassword( $user, $password )
        );
        return $user;
    }
}
