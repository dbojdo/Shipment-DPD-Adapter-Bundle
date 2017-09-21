<?php

namespace Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap;

use Webit\Addressing\Model\Country;
use Webit\Bundle\ShipmentDpdAdapter\Tests\Bootstrap\Entity\Address;
use Webit\Shipment\Address\DefaultSenderAddressProviderInterface;
use Webit\Shipment\Address\SenderAddressInterface;

class SenderProvider implements DefaultSenderAddressProviderInterface
{

    /**
     * @return SenderAddressInterface
     */
    public function getSender()
    {
        return new Address(
            'name',
            'ul. Mokra 12',
            'Kraków',
            '30-313',
            new Country('Polska', 'PL')
        );
    }
}