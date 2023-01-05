<?php
namespace Vitruvius\User\Repository;

use Vitruvius\Base\Repositories\Repository;
use App\Models\User;
class UserRepository extends Repository
{

    public function __construct(User $user)
    {
        $this->setModel($user);
    }

}
