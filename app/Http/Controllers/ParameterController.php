<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parameter;

class ParameterController extends Controller
{
    public function index()
    {
        //mengambil produk dari database
        $parameters = Parameter::get();
        return view('backoffice.parameter.index', [ 
            'parameters' => $parameters
        ]);
    }

    public function tambah_parameter()
    {
        return view('backoffice.parameter.add');
    }

    public function simpan_parameter(Request $request)
    {
        //menyimpan

        Parameter::create([
            'name'      => $request->name,
            'code'      => $request->code
        ]);

        return redirect()->route('parameter');
        
    }

    public function edit_parameter($id)
    {
        $parameter = Parameter::where('id', $id)->first();
        if ($parameter) {
            return view('backoffice.parameter.edit', [
                'parameter' => $parameter
            ]);
        } else{
            return redirect()->route('parameter');
        }
    }

    public function update_parameter(Request $request)
    {
        //menyimpan
        $parameter = Parameter::where('id', $request->id)->first();

        if ($parameter == null) {
            return redirect()->route('backoffice');
        } 

        $parameter->update([
            'name'      => $request->name,
            'code'      => $request->code
        ]);

        return redirect()->route('parameter');
        
    }

    public function hapus_parameter($id)
    {
        $parameter = Parameter::where('id', $id)->first();
        if ($parameter) {
            $parameter->delete();
            return redirect()->route('parameter');
        } else{
            return redirect()->route('parameter');
        }
    }
}
