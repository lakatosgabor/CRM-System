<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\DB;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('employees')
        ->selectRaw('companies.*')
        ->selectRaw('count(employees.id) as count_emp')
        ->join('companies', 'companies.name', '=', 'employees.company')
        ->groupby('employees.company','companies.id', 'companies.id', 'companies.name',
                  'companies.email', 'companies.logo', 'companies.website',
                  'companies.created_at', 'companies.updated_at')
        ->get()->toArray(); 
        return view('companies.companies', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.companies-create');
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
            'name'    =>  'required',
            'logo'   =>  'image|max:2048'
        ]);

        $logo = $request->file('logo');

        $new_name = rand() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('images'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'email'      =>   $request->email,
            'logo'       =>   $new_name,
            'website'    =>   $request->website
        );

        Company::create($form_data);

        return redirect('companies')->with('success', 'Data Added successfully.');
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
        $data = Company::findOrFail($id);
        return view('companies.companies-edit', compact('data'));
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
        $logo_name = $request->hidden_logo;

        $logo = $request->file('logo');        
        if($logo != '')
        {
            $request->validate([
                'name'    =>  'required',
                'logo'    =>  'image|max:2048'
            ]);

            $logo_name = rand() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images'), $logo_name);
        }
        else
        {
            $request->validate([
                'name'       =>   'required'
            ]);
        }


        $form_data = array(
            'name'       =>   $request->name,
            'email'      =>   $request->email,
            'logo'       =>   $logo_name,
            'website'    =>   $request->website
        );
  
        Company::whereId($id)->update($form_data);

        return redirect('companies')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::findOrFail($id);
        $data->delete();
        return redirect('companies')->with('success', 'Data is successfully deleted');
    }
}
