<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Content;
use App\Category;
use App\Publication;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
