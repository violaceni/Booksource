<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Author;
use App\MainModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

        $book_data = Book::prepareData($request_data);
        $author_data = Author::prepareData($request_data);
       
        $authorDuplicateCheck = Author::checkDuplicateAuthor($author_data['name'], $author_data['age'], $author_data['address']);
        $bookDuplicateCheck = Book::checkDuplicateBook($book_data['name'], $book_data['release_date']);
        
        $authorDuplicateRecord = (int) $authorDuplicateCheck->count();
        $bookDuplicateRecord = (int) $bookDuplicateCheck->count();

        $check = MainModel::checkDuplicates($authorDuplicateRecord, $bookDuplicateRecord,$authorDuplicateCheck,$bookDuplicateCheck, $author_data, $book_data);

        return $check;
    }

    public function getBooks(){
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('booksource.books_index')->with(['books' => $books]);
    }
    public function getAuthors(){
        $authors = Author::orderBy('created_at', 'desc')->paginate(10);
        return view('booksource.authors_index')->with(['authors' => $authors]);
    }

    public function getUsers(){
        $users = User::orderBy('name', 'asc')->get();
        return view('booksource.users_index')->with(['users' => $users]);
    }

    public function editUser(Request $request, $id){
        $user = User::find($id);
        return view('booksource.user_edit')->with(['user' => $user]);
    }

    public function updateUser(Request $request, $id){
        $user = User::find($id)->update($request->all());  
        return redirect('/booksource/users')->with(['message'=>'User updated successfully']);
    }

    public function deleteUser(Request $request, $id){
        $user = User::find($id);
        $user->delete();
    }

    public function addUser(Request $request){
        return view('booksource.insert_user');
    }

    public function createUser(Request $request)
    {
        $data = $request->all();
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);

        return redirect('/booksource/users')->with(['message'=>'User created successfully']); 
    }
}
