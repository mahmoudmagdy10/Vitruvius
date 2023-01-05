<?php
namespace Vitruvius\Contractor\Repository;

use Vitruvius\Base\Repositories\Repository;
use Vitruvius\Contractor\Models\Contractor;
class ContractorRepository extends Repository
{

    public function __construct(Contractor $contractor)
    {
        $this->setModel($contractor);
    }

}
