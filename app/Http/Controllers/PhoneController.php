<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Http\ResponseFactory;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Phone[]
     */
    public function index()
    {
        return Phone::all()->jsonSerialize();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function store(Request $request)
    {
        $phone = new Phone();
        $phone->name = $request->input('name');
        $phone->save();
        return response('Telefono creado.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return array|Response|ResponseFactory
     */
    public function show($id)
    {
        $phone = Phone::find($id);
        if($phone)
            return $phone->jsonSerialize();
        return response('No se encontró en telefono.', 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $phone = Phone::find($id);
        if(!$phone)
            return response('No se encontró en telefono.', 404);
        $phone->name = $request->input('name');
        $phone->save();
        return response('Telefono actualizado.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response|ResponseFactory
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);
        if($phone) {
            $phone->delete();
            return response('Telefono eliminado.', 200);
        }
        return response('No se encontró en telefono.', 404);
    }
}
