<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TableController extends Controller
{
    public function index()
    {
        //sesson data

        // $Array["arrayName"]["key"]="value"; 
        // session(['sd' => $Array]);
        // session(['key1' => 'value1']);
        // $data =session()->all();

        //($data['sd']['arrayName']['key']);

        // session()->pull('key1');
        // dd(session()->all());

        //sesson data
        
        //$columns = DB::getSchemaBuilder()->getColumnListing('bank');
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current',$tables);
        //dd($tables);
        return view('table', compact('tables'));
    }

    public function show(Request $request)
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current',$tables);

        $name = $request->name;
        $columns = DB::getSchemaBuilder()->getColumnListing($name);
        $table_data = DB::table($name)->get();
        //dd($table_data);
        return view('table')->with( compact('tables','name','columns','table_data'));;
       
        
    }

    public function add(Request $request)
    {
        //return $request->tb_name;
        return $request->all();
        $columns = DB::getSchemaBuilder()->getColumnListing($request->tb_name);
        foreach ($columns as $key => $value) {
           
                $data[$value] = $request->$value;
           
            
        }
        //dd($data);
         DB::table('bank')->insert($data);
         //echo "okay";
         
         return redirect()->back();
         
    }
}
