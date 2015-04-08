<?php
namespace Prototype\DBClasses\Eloquent;

use Prototype\Interfaces\UserRepository;
use Prototype\BaseClasses\AbstractEloquentRepository;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    public function __construct(\User $model)
    {
        $this->model = $model;
    }
    
    public function updateProfile($id, $data)
    {
        $profile = $this->getById($id);
        $profile->update($data);
    }
    
    public function updatePassword($id, $password)
    {
        $profile = $this->getById($id);
        $profile->update($password);
    }
}
