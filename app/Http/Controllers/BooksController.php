<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Image;
use App\Models\User;

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
        $book_image = new Image;
        $book_image->resolution = "20";
        $book_image->url = explode("/", $req->file('image')->store('public'))[1];
        $result_img = $book_image->save();

        if ($result_img) {
            $book = new Book;
            $img = Image::where("url", explode("/", $req->file('image')->store('public'))[1])->get()[0]->id;
            $book->image_id = $img;
            $author = User::find(1);
            $book->user()->associate($author);
            $book->title = $req->title;
            $book->description = $req->description;
            $result = $book->save();

            if ($result) {
                return ["result" => "book has been created successfuly"];
            } else {
                return ["result" => "book not updated"];
            }
        } else {
            return ["result" => "book not updated Img error"];
        }

    }
    function update(Request $req,$id){
        $book =  Book::find($id);
        $book->title = $req->title;
        if ($req->image) {
            $img_url_list = explode("/", $book->image_id);
            $img =  Image::where('url', $img_url_list[sizeof($img_url_list) - 1])->get()[0];
            $img->url = explode("/", $req->file('image')->store('public'))[1];
           $img->save();
        }
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
    function searchBook($word){
        return Book::where("title","like","%".$word."%")->get();
    }

    function getAuthor($id)
    {

        return Book::find($id)->user;
    }
}

