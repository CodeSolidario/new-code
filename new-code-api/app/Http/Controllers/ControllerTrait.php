<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\User;

trait ControllerTrait
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = $this->model::all();
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
        
    }
    public function store(Request $request) {
        try{
            $data = $this->model::create($request->toArray());
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = $this->model::findOrFail($id);
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $this->model::findOrFail($id);
            $RequestData = $request->all();
            $data->fill($RequestData)->save();
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = $this->model::findOrFail($id);
            $data->delete();
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }
    public function sendMail($mail)
    {
        //aqui será implementada a função de envio de email
        return $mail;
    }
}
