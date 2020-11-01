<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = ['msg' => 'Ambil Data',
            'href' => "api/trisatria/v1/employee",
            'method' => 'GET'
        ];


        if ($request->input('jenis_kelamin')) {
            $employees = Employee::all()->where('jenis_kelamin', '=', trim($request->input('jenis_kelamin'), '"'));

            $response = [
                'properties' => $properties,
                'jumlah_data' => $employees->count(),
                'data' => $employees,
            ];
            return response()->json($response, 200);

        } else {
            $employees = Employee::all();
            $response = [
                'properties' => $properties,
                'jumlah_data' => $employees->count(),
                'data' => $employees,
            ];
            return response()->json($response, 200);
        }


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'nama' => 'required',
                'usia' => ['required ', 'integer'],
                'jenis_kelamin' => 'required']
        );

        $employee = new Employee();
        $employee->create($request->all());


        $properties = ['msg' => 'Input Data',
            'href' => "api/trisatria/v1/employee",
            'method' => 'POST'
        ];

        $response = ['properties' => $properties,
            'pesan' => 'Data berhasil di Input',
            'data' => $request->all()];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


}
