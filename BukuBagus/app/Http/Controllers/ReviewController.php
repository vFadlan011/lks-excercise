<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Models\Review;

class ReviewController extends Controller {
    public function index() {
        return view('review');
    }

    public function store(Request $request, $book_id) {
        $validatedData = $request->validate([
            'review' => 'required'
        ]);

        $book = Book::find($book_id);
        if ($book == NULL) {
            abort(404);
        }

        $user_id = Auth::user()['id'];
        $record = Review::where('user_id', $user_id)->where('book_id', $book_id);

        if ($record == NULL) {
            $rating = new Review();
            $rating->user_id = $user_id;
            $rating->book_id = $book_id;
            $rating->review = $request->review;
        } else {
            $data = [
                'review' => $request->review,
            ];
            $record->update($data);
        }

        return redirect()->intended("/book/$book_id/review");
    }

    public static function getTotal($book_id) {
        $totalReviews = Review::where('book_id', $book_id)->count();
        return $totalReviews;
    }
    public static function getReviews($book_id) {
        $reviews = Review::where('book_id', $book_id)->orderByDesc('id')->cursorPaginate(20);
        return $reviews;
    }
}
