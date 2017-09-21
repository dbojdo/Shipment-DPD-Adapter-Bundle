<?php

namespace Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap\Entity;

use Webit\Addressing\Model\CountryInterface;
use Webit\Shipment\Address\DeliveryAddressInterface;
use Webit\Shipment\Address\SenderAddressInterface;

class Address implements SenderAddressInterface, DeliveryAddressInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @param string
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        // TODO: Implement getAddress() method.
    }

    /**
     * @param string
     */
    public function setAddress($address)
    {
        // TODO: Implement setAddress() method.
    }

    /**
     * @return string
     */
    public function getPost()
    {
        // TODO: Implement getPost() method.
    }

    /**
     * @param string
     */
    public function setPost($post)
    {
        // TODO: Implement setPost() method.
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        // TODO: Implement getPostCode() method.
    }

    /**
     * @param string
     */
    public function setPostCode($postCode)
    {
        // TODO: Implement setPostCode() method.
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        // TODO: Implement getContactPerson() method.
    }

    /**
     * @param string $contactPerson
     */
    public function setContactPerson($contactPerson)
    {
        // TODO: Implement setContactPerson() method.
    }

    /**
     * @return string
     */
    public function getContactPhoneNo()
    {
        // TODO: Implement getContactPhoneNo() method.
    }

    /**
     * @param string $contactPhoneNo
     */
    public function setContactPhoneNo($contactPhoneNo)
    {
        // TODO: Implement setContactPhoneNo() method.
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        // TODO: Implement getContactEmail() method.
    }

    /**
     * @param string $email
     */
    public function setContactEmail($email)
    {
        // TODO: Implement setContactEmail() method.
    }

    /**
     * @return CountryInterface
     */
    public function getCountry()
    {
        // TODO: Implement getCountry() method.
    }

    /**
     * @param CountryInterface $country
     */
    public function setCountry(CountryInterface $country = null)
    {
        // TODO: Implement setCountry() method.
    }
}