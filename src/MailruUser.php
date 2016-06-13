<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11/06/16
 * Time: 01:44
 */

namespace Max107\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class MailruUser implements ResourceOwnerInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param  array $response
     */
    public function __construct(array $response)
    {
        $this->data = array_pop($response);
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->data['uid'];
    }

    public function getName()
    {
        return $this->data['first_name'] . ' ' . $this->data['last_name'];
    }

    public function getFirstName()
    {
        return $this->data['first_name'];
    }

    public function getLastName()
    {
        return $this->data['last_name'];
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getImageUrl()
    {
        return $this->data['pic'];
    }

    public function getGender()
    {
        return $this->data['sex'];
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}