<?php
namespace App\Repositories\Overtime;

use App\Repositories\EloquentRepository;
use Auth;

class OvertimeEloquentRepository extends EloquentRepository implements OvertimeRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        
        return \App\Overtime::class;
    }

    /**
     * Get all vacation only user
     * @return mixed
     */
    public function getOvertimeUser()
    {
        $result = $this->_model->where('user_id', Auth::user()->id)->get();

        return $result;
    }
}
