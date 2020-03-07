<?php


namespace App\Repo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

/**
 * Class MsgRepo
 * This does not claim to be a definitive Repository Pattern, so I call it repo
 * Some purists say that a repository should read only.
 * @package App\Repo
 */
class MsgRepo
{
    private $model;

    /**
     * MsgRepo constructor injecction.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Persist & Validate input
     * @param array $query
     * @return RedirectResponse
     */
    public function create(array $query): RedirectResponse
    {
        $validator = Validator::make($query, [
            'email' => 'required|email',
            'name' => 'required|between:4,80',
            'phone' => 'digits:10|min:100000000',
            'sent' => 'boolean',
            'message' => 'required|between:4,4096',
        ]);

        if ($validator->failed()) {
            print_r($query);
            echo "FAIL!!!\n";
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $this->model->save($query);

        echo "success!!!\n";
        return redirect('/');
    }


}
