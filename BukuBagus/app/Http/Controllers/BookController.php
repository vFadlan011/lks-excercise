<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\ValidationHelpers;
use App\Models\Book;


class BookController extends Controller {

    public function index() {
        $books = Book::orderByDesc('id')->cursorPaginate(20);
        return view('home', [
            'title' => 'home',
            'books' => $books
        ]);
    }

    public function showDetail($book_id) {
        $book = Book::find($book_id);
        if ($book == NULL) {
            abort(404);
        }

        $book->avgRating = floatval(substr(RatingController::getAvg($book->id), 0, 3));
        $book->totalRating = RatingController::getTotal($book_id);
        $book->ratingStat = RatingController::getStat($book_id);

        $book->totalReviews = ReviewController::getTotal($book_id);
        $book->reviews = ReviewController::getReviews($book_id);


        return view('book', [
            'title' => $book->title,
        ], compact('book'));
    }

    public function create() {
        return view('create');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'pages' => 'required|numeric',
            'authors' => 'required'
        ]);

        if (ValidationHelpers::validateISBN($request->isbn)) {
            $book = new Book();
            $book->title = $request->title;
            $book->pages = $request->pages;
            $book->authors = $request->authors;
            $book->isbn = $request->isbn;
            $book->save();
        }
    }
}
