<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class commonController extends Controller
{

    protected $MODEL;

    /**
     * commonController constructor.
     * @param $MODEL
     */
    public function __construct()
    {
        $this->saveSetting();
        $this->middleware('jwt.auth');
    }

    protected function saveSetting(){}


    protected function index($id = null){
        $modelInstance = new $this->MODEL();
        $column_name = $modelInstance->getFillable();
        array_push($column_name,'#');

        if ($id == null) {
            $data = $modelInstance->all();
            return response()->json([
                'data' => $data,
                'column_name' => $column_name
            ]);

        } else {
            $data = $this->show($id);
            return $data;
        }
    }

    protected function getAll() {
        $data = (new $this->MODEL())->all();
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function show($id)
    {
        $data = (new $this->MODEL())->find($id);
        return $data;
    }

    protected function store(Request $request) {
        $modelInstance = new $this->MODEL();

        $modelInstance->fill($request->all())->save();

        return 'success';
    }

    protected function update(Request $request, $id) {

        $modelInstance = new $this->MODEL();
        $modelInstance = $modelInstance->find($id);
        $modelInstance->fill($request->all())->save();
        return 'success';
    }

    public function destroy($id) {
        $modelInstance = new $this->MODEL();

        $modelInstance->find($id)->delete();

        return 'success';
    }


}
