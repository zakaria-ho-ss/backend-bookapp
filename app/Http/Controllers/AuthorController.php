<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    function getBooks($id)
    {

        return Author::find($id)->books;
    }
}
