<?php 
namespace App\Http\Controllers\Admin\Triats ;

use App\Models\User;
use PDF;
trait PDFGenrator{
    public function userPdf(){
        $users = User::all();
        $pdf = PDF::loadView('admin.user.userpdf',  compact('users'));
        return $pdf->download('users.pdf');
    }

}