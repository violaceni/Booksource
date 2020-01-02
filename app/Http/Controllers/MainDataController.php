<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MainDataController extends Controller
{
    public function showMain()
    {

        return view('welcome');
    }

    public function showData()
    {

        $authors = Author::with('books')->orderBy('created_at', 'asc')->paginate(6);
        return view('booksource.index')->with(['authors' => $authors]);
    }

    public function addData()
    {
        return view('booksource.insert');
    }

    public function storeData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'address' => 'required|min:10|max:255',
            'age' => 'numeric|digits:2|not_in:0',
            'book_name' => 'required|regex:/^[\pL\s]+$/u|min:5|max:255',
            'release_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $request_data = $request->all();
        $data = self::prepareData($request_data);


        $authorDuplicateCheck = Author::where('name', $data['author']['name'])
            ->where('age', $data['author']['age'])
            ->where('address', $data['author']['address'])
            ->get();

        $bookDuplicateCheck = Book::where('name', $data['book']['name'])
            ->where('release_date', $data['book']['release_date'])
            ->get();

        $authorDuplicateRecord = (int) $authorDuplicateCheck->count();
        $bookDuplicateRecord = (int) $bookDuplicateCheck->count();

        switch (true) {
            case ($authorDuplicateRecord == 0 and $bookDuplicateRecord == 0):

                $author = Author::create($data['author']);
                $book = Book::create($data['book']);
                $author->books()->attach($book->id);

                return Redirect::to('booksource/index')->with('message', 'Records successfully saved');
                break;

            case ($authorDuplicateRecord > 0 && $bookDuplicateRecord == 0):

                $author_id = $authorDuplicateCheck[0]->id;
                $author = Author::find($author_id);
                $book = Book::create($data['book']);
                $author->books()->attach($book->id);

                return Redirect::to('booksource/index')->with('message', ' Book record successfully saved');
                break;
            case ($authorDuplicateRecord == 0 && $bookDuplicateRecord > 0):
                $book_id = $bookDuplicateCheck[0]->id;
                $author = Author::create($data['author']);
                $author->books()->attach($book_id);

                return Redirect::to('booksource/index')->with('message', 'Author record successfully saved');
                break;
            case ($authorDuplicateRecord > 0 && $bookDuplicateRecord > 0):

                return Redirect::back()->withErrors("This author and this book exists")->withInput();
                break;

            default:
                return Redirect::to('booksource/index');
                break;
        }
    }

    public static function prepareData(array $request)
    {
        $author_data = [];
        $author_data['name'] = $request['name'];
        $author_data['address'] = $request['address'];
        $author_data['age'] = $request['age'];

        $book_data = [];
        $book_data['name'] = $request['book_name'];
        $book_data['release_date'] = $request['release_date'];

        return array(
            'author' => $author_data,
            'book' => $book_data,
        );
    }

}
