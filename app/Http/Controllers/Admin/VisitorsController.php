<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorsController extends Controller
{
    public function admin_visitors_detail(){
        $visitors = Visitor::paginate(10);
        return view('admin.visitors.index', compact('visitors'));
    }
}
