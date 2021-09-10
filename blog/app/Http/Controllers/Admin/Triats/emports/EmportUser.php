<?php 
namespace App\Http\Controllers\Admin\Triats\emports ;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

trait EmportUser{
    public function emportView(){
       return view('admin.user.import');

    }
    public function emport(){
       $data = request()->file('file') ;
        Excel::import(new UsersImport,$data);
             
        return back() ;
    }
}