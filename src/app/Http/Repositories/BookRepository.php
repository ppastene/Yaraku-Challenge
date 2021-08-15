<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Repositories\Contracts\BookContract;
use App\Models\Book;

class BookRepository implements BookContract
{
    public function getBooks()
    {
        return Book::all();
    }

    public function addBook($data)
    {
        $book = new Book;
        $book->title = $data['title'];
        $book->author = $data['author'];

        return $book->save();
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);

        return $book->delete();
    }

    public function searchBook($data)
    {
        $book = Book::where('title', 'LIKE', '%'.$data->title.'%')->
                    Where('author', 'LIKE', '%'.$data->author.'%')->get();

        return $book;
    }
}
