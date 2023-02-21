<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller {
    public function index() {
        return view('rating');
    }

    public function store(Request $request, $book_id) {
        dd([
            $request->input('star-1'),
            $request->input('star-2'),
            $request->input('star-3'),
            $request->input('star-4'),
            $request->input('star-5'),
        ]);
        $validatedData = $request->validate([
            'rating' => 'required|numeric'
        ]);

        $book = Book::find($book_id);
        if ($book == NULL) {
            abort(404);
        }

        $user_id = Auth::user()['id'];
        $record = Rating::where('user_id', $user_id)->where('book_id', $book_id);

        if ($record == NULL) {
            $rating = new Rating();
            $rating->user_id = $user_id;
            $rating->book_id = $book_id;
            $rating->rating = $request->rating;
        } else {
            $data = [
                'rating' => $request->rating,
            ];
            $record->update($data);
        }

        return redirect()->intended("/book/$book_id/rating");
    }

    public static function getAvg($book_id) {
        $avg = Rating::where('book_id', $book_id)->avg('rating');
        return $avg;
    }
    public static function getTotal($book_id) {
        $total = Rating::where('book_id', $book_id)->count();
        return $total;
    }
    public static function getRatingByUserId($book_id, $user_id) {
        $rating = Rating::where('book_id', $book_id)->firstWhere('user_id', $user_id);
        return $rating;
    }
    public static function getStat($book_id) {
        $total = self::getTotal($book_id);
        if ($total == 0) {
            return [
                '1' => [0, 0],
                '2' => [0, 0],
                '3' => [0, 0],
                '4' => [0, 0],
                '5' => [0, 0],
            ];
        }

        /* Total of rating 1 = a, rating 2 = b, and so on... */
        $a = Rating::where('book_id', $book_id)->where('rating', 1)->count();
        $b = Rating::where('book_id', $book_id)->where('rating', 2)->count();
        $c = Rating::where('book_id', $book_id)->where('rating', 3)->count();
        $d = Rating::where('book_id', $book_id)->where('rating', 4)->count();
        $e = Rating::where('book_id', $book_id)->where('rating', 5)->count();

        $stat = [
            '1' => [$a, ($a / $total) * 100],
            '2' => [$b, ($b / $total) * 100],
            '3' => [$c, ($c / $total) * 100],
            '4' => [$d, ($d / $total) * 100],
            '5' => [$e, ($e / $total) * 100],
        ];
        return $stat;
    }
}
