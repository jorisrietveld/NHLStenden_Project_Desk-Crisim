<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 21:08
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * This class implements the UserInterface so it can be used with symfony's default authentication system.
 * See the file: `$PROJECT_ROOT:config/validator/user.yaml` for the validation constraints of this entity.
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int The natural unique identifier.
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @var array An array that defines the roles the user is allowed to perform.
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var \DateTime $addedOn
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $addedOn;

    /**
     * @var string The plain text password of the user. This should be cleared as quickly as possible with the erase
     *      credentials method! Notice that this property does not have a ORM Column anotation because this should
     *      never be saved in the database.
     * @see config/validator/user.yaml for the validation constraints.
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $locale;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->roles = [ 'ROLE_USER' ];
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param $password
     */
    public function setPlainPassword( $password )
    {
        $this->plainPassword = $password;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function setUsername( string $username ): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the roles of the user.
     *
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique( $roles );
    }

    /**
     * @param array $roles
     *
     * @return User
     */
    public function setRoles( array $roles ): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword( string $password ): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt(): ?string
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    /**
     * Removes sensitive data from the user.
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials(): void
    {
        // Nothing to remove.
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        return serialize( [ $this->id, $this->username, $this->password ] );
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize( $serialized ): void
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        [ $this->id, $this->username, $this->password ] = unserialize( $serialized, [ 'allowed_classes' => false ] );
    }

    public function getAddedOn(): ?\DateTimeInterface
    {
        return $this->addedOn;
    }

    public function setAddedOn(\DateTimeInterface $addedOn): self
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale ?: 'nl';
    }

    public function setLocale( ?string $locale ): self
    {
        $this->locale = $locale;

        return $this;
    }
}
