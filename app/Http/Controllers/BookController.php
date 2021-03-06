<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;

class BookController extends commonController
{

    protected function saveSetting()
    {
        parent::saveSetting(); // TODO: Change the autogenerated stub
        $this->MODEL = 'App\Book';
        //$this->middleware('jwt.auth');
    }

    public function index($id = null) {

        $modelInstance = new $this->MODEL();
        $column_name = $modelInstance->getFillable();
        array_push($column_name,'#');

        if (! $user = JWTAuth::parseToken()->authenticate()) {

            return response()->json(['user_not_found'], 404);

        } else {
            if ($id == null) {
                $data = (new $this->MODEL())->with  ('author', 'genre')->get();
                return response()->json([
                    'data' => $data,
                    'column_name' => $column_name,
                    'users' => JWTAuth::parseToken()->authenticate()
                ]);

            } else {
                $data = $this->show($id);
                return $data;
            }
        }
    }

    protected function show($id)
    {
        $data = (new $this->MODEL())->with('author', 'genre')->find($id);
        return $data;
    }

}
