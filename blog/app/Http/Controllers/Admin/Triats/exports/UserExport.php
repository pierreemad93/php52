<?php 
namespace App\Http\Controllers\Admin\Triats\exports ;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

trait UserExport{
    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');

    }
}