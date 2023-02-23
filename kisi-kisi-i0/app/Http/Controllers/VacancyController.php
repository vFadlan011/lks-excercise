<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacancyController extends Controller {
    public function search(Request $request) {
        return view('search', [
            'title' => 'Cari Loker'
        ]);
    }

    public function ShowVacancies() {
        return view('vacancies', [
            'title' => 'Daftar Loker'
        ]);
    }

    public function ShowVacancy($vacancy_id) {
        return view('vacancy');
    }

    public function apply($vacancy_id) {
    }
}
