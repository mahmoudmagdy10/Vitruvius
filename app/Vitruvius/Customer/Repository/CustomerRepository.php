<?php
namespace Vitruvius\Customer\Repository;

use Vitruvius\Base\Repositories\Repository;
use Vitruvius\Customer\Models\Customer;
class CustomerRepository extends Repository
{

    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }

}
