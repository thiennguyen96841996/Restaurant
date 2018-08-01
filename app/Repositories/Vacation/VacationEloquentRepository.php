<?php
namespace App\Repositories\Vacation;

use App\Repositories\EloquentRepository;
use Auth;

class VacationEloquentRepository extends EloquentRepository implements VacationRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        
        return \App\Vacation::class;
    }

    /**
     * Get all vacation only user
     * @return mixed
     */
    public function getVacationUser()
    {
        $result = $this->_model->where('user_id', Auth::user()->id)->get();

        return $result;
    }
}
