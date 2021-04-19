<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    function index()
    {
        return Book::all();
    }



    function getBooksById($id)
    {
        return  preg_match("/^[0-9]+$/", $id) ? Book::find($id) : Book::where("title",$id)->get();
    }




    function add(Request $req)
    {
        $book = new Book;
        $book->title = $req->title;
        $book->description = $req->description;
        $result = $book->save();

        if ($result) {
            return ["result" => "book has been created successfuly"];
        } else {
            return ["result" => "book not updated"];
        }


    }
    function update(Request $req){
        $book =  Book::find($req->id);
        $book->title = $req->title;
        $book->description = $req->description;
        $result = $book->save();

        if ($result) {
            return ["result" => "book has been updated successfully"];
        } else {
            return ["result" => "book has not been updated"];
        }
    }
    function remove($id){
        $book =  Book::find($id);
    
        $result = $book->delete();

        if ($result) {
            return ["result" => "book has been deleted"];
        } else {
            return ["result" => "book has not been deleted"];
        }
    } 
}