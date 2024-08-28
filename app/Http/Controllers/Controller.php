<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function parsePhoneNumber($phoneNumber)
    {
        if (isset($phoneNumber) && !empty($phoneNumber)) {
            $phoneNumber = str_replace('+620','0',$phoneNumber);
            $phoneNumber = str_replace('+62','0',$phoneNumber);
            $phoneNumber = str_replace('-','',$phoneNumber);
            $phoneNumber = preg_replace('/^62/','0',$phoneNumber);
            $phoneNumber = preg_replace("/\s+/",'',$phoneNumber);
        }

        return $phoneNumber;
    }

    protected function get_data_from_table($request, $model, $searchColumns, $paginate, $sortBy = 'id', $sortType = 'asc')
    {
        try {
            $data = $model->with([
                'author',
                'category'
            ])
                ->when($request->q, function ($q) use ($request, $searchColumns) {
                    foreach ($searchColumns as $key => $column) {
                        if ($key == 0) {
                            $q->where($column, 'LIKE', '%' . $request->q . '%');
                        } else {
                            $q->orWhere($column, 'LIKE', '%' . $request->q . '%');
                        }
                    }
                })
                ->orderBy($sortBy)
                ->paginate($paginate)
                ->withQueryString();

            return $data;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
