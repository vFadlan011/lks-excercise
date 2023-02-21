<?php

namespace App\Helpers;

class ValidationHelpers {
    public static function validateISBN($isbn) {
        if (strlen($isbn) != 10) {
            return redirect('store')->withErrors(['isbn' => 'Invalid ISBN']);
        }

        $sum = 0;

        $x = 10;
        for ($i = 0; $i < 10; $i++) {
            $num = (int) $isbn[$i];
            $sum += $num * $x;
            $x--;
        }

        if ($sum % 11 == 0) {
            return true;
        } else {
            return redirect('store')->withErrors(['isbn' => 'Invalid ISBN']);
        }
    }
}
