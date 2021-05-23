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
    //MainController all the logic of the web application is implemented here. Main crud functions for 3 models like User, Book, Author
    //return the main view/ home page/Booksource 
    public function showMain()
    {
        return view('welcome');
    }
    //returns a view with the list of authors and books listed foreach author
    public function showData()
    {

        $authors = Author::with('books')->orderBy('created_at', 'asc')->paginate(6);
        return view('booksource.index')->with(['authors' => $authors]);
    }

    //returns the view to add new author and book
    public function addData()
    {
        return view('booksource.insert');
    }
    //stores the data of the book and author on database
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
    //get book list & returns view with records
    public function getBooks(){
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        return view('booksource.books_index')->with(['books' => $books]);
    }
    //get authors list & returns view with records
    public function getAuthors(){
        $authors = Author::orderBy('created_at', 'desc')->paginate(10);
        return view('booksource.authors_index')->with(['authors' => $authors]);
    }

    //get users list & returns view with records
    public function getUsers(){
        $users = User::orderBy('name', 'asc')->get();
        return view('booksource.users_index')->with(['users' => $users]);
    }
    //get edit form view with user details
    public function editUser(Request $request, $id){
        $user = User::find($id);
        return view('booksource.user_edit')->with(['user' => $user]);
    }
    //stores the updated values on the database from the form/view
    public function updateUser(Request $request, $id){
        $user = User::find($id)->update($request->all());  
        return redirect('/booksource/users')->with(['message'=>'User updated successfully']);
    }
    //deletes a user from database
    public function deleteUser(Request $request, $id){
        $user = User::find($id);
        $user->delete();
    }
    //returns the view/from to create a new user
    public function addUser(Request $request){
        return view('booksource.insert_user');
    }
    //stores the details of the user from the form
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
    //get books list and return the view with the records
    public function getAllBooks(){
        $books = Book::orderBy('created_at', 'desc')->paginate(6);
        return view('booksource.books_list')->with(['books' => $books]);
    }
    //get edit form view with user details
    public function editBook(Request $request, $id){
        $book = Book::find($id);
        return view('booksource.book_edit')->with(['book' => $book]);
    }
    //stores the updated values for book record on the database from the form/view
        $book = Book::find($id)->update($request->all());  
        return redirect('/booksource/books')->with(['message'=>'Book updated successfully']);
    }
    //delete a book record from the database
    public function deleteBook(Request $request, $id){
        $book = Book::find($id);//find book to delete
        $book->delete();
    }
    //get the list of all authors and return the view to display them
    public function getAllAuthors(){
        $authors = Author::orderBy('created_at', 'desc')->paginate(6);
        return view('booksource.authors_list')->with(['authors' => $authors]);
    }
    //get edit form view with author details
    public function editAuthor(Request $request, $id){
        $author = Author::find($id);
        return view('booksource.author_edit')->with(['author' => $author]);
    }
    //stores the updated values from the form/view
    public function updateAuthor(Request $request, $id){
        $author = Author::find($id)->update($request->all());  
        return redirect('/booksource/authors')->with(['message'=>'Author updated successfully']);
    }
    //deletes a single author
    public function deleteAuthor(Request $request, $id){
        $author = Author::find($id);
        $author->delete();
    }
}
