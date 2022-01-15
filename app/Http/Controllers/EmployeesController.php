<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use Illuminate\Database\Eloquent\Model;



class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::latest()->paginate(5);
        return view('employees.employees', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('employees.employees-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name'    =>  'required',
            'first_name'   =>  'required'
        ]);

        $form_data = array(
            'last_name'       =>   $request->last_name,
            'first_name'      =>   $request->first_name,
            'mobil'       =>   $request->mobil,
            'email'    =>   $request->email,
            'family'    =>   $request->family,
            'company'    =>  $request->company
        );

        Employee::create($form_data);

        return redirect('employees')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        return view('employees.employees-edit', compact('data'));
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

        $request->validate([
            'first_name'    =>  'required',
            'last_name'    =>  'required'
        ]);

        $form_data = array(
            'first_name'    =>   $request->first_name,
            'last_name'     =>   $request->last_name,
            'family'        =>   $request->family,
            'email'         =>   $request->email,
            'mobil'         =>   $request->mobil,
            'company'       =>   $request->company

        );
  
        Employee::whereId($id)->update($form_data);

        return redirect('employees')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);
        $data->delete();
        return redirect('employees')->with('success', 'Data is successfully deleted');
    }
}

