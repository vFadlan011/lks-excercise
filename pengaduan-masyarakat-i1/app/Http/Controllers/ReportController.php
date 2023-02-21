<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller {
    public function index() {
        return view('dashboard', [
            'title' => 'dashboard'
        ]);
    }

    public function showReports() {
        $results = Report::orderBy('id')->where('status', 'BARU')->cursorPaginate(20);
        return view('reports', [
            'title' => 'Daftar Aduan'
        ], compact('results'));
    }

    public function showResponses() {
        $results = Report::orderBy('response_timestamp', 'desc')->where('status', '!=', 'BARU')->cursorPaginate(20);
        return view('responses', [
            'title' => 'Daftar Respon'
        ], compact('results'));
    }

    public function showReport(Request $request, $report_id) {
        $report = Report::firstWhere('id', $report_id);

        if ($report == NULL) {
            abort(404);
        }

        $respondent = '';
        if ($report->status != 'BARU') {
            $respondent = User::firstWhere('id', $report->respondent_id)['username'];
        }

        $view = 'report';

        if ($request->is('admin/*')) {
            $view = 'respond';
        }

        return view($view, [
            'title' => 'Data aduan',
            'respondent' => $respondent
        ], compact('report'));
    }

    public function search(Request $request) {
        $reports = Report::all();
        $results = $reports->where('nik', '=', $request->nik)->sortByDesc('id');
        return view('search', [
            'title' => 'Hasil Pencarian'
        ], compact('results'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'nik' => 'required|numeric|digits:16',
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'report_msg' => 'required',
            'report_img_1' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'report_img_2' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'report_img_3' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'report_img_4' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'report_img_5' => 'nullable|mimes:jpg,png,jpeg|max:1000',
        ]);

        $report = new Report();
        $report->nik = $request->nik;
        $report->name = $request->name;
        $report->email = $request->email;
        $report->phone = $request->phone;
        $report->report_msg = $request->report_msg;
        if ($request->file('report_img_1') != null) {
            $report->report_img_1 = $request->file('report_img_1')->store('report-images');
        }
        if ($request->file('report_img_2') != null) {
            $report->report_img_1 = $request->file('report_img_2')->store('report-images');
        }
        if ($request->file('report_img_3') != null) {
            $report->report_img_1 = $request->file('report_img_3')->store('report-images');
        }
        if ($request->file('report_img_4') != null) {
            $report->report_img_1 = $request->file('report_img_4')->store('report-images');
        }
        if ($request->file('report_img_5') != null) {
            $report->report_img_1 = $request->file('report_img_5')->store('report-images');
        }
        $report->report_timestamp = Carbon::now()->timestamp;
        $report->save();
        return redirect()->back();
    }

    public function respond(Request $request, $report_id) {
        $validatedData = $request->validate([
            'status' => 'required',
            'response_msg' => 'required',
            'response_img_1' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'response_img_2' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'response_img_3' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'response_img_4' => 'nullable|mimes:jpg,png,jpeg|max:1000',
            'response_img_5' => 'nullable|mimes:jpg,png,jpeg|max:1000',
        ]);

        $data = [
            'status' => $request->status,
            'response_msg' => $request->response_msg,
            'respondent_id' => Auth::user()['id'],
            'response_timestamp' => Carbon::now()->timestamp,
        ];

        if ($request->file('report_img_1') != null) {
            $data['report_img_1'] = $request->file('report_img_1')->store('report-images');
        }
        if ($request->file('report_img_2') != null) {
            $data['report_img_2'] = $request->file('report_img_2')->store('report-images');
        }
        if ($request->file('report_img_3') != null) {
            $data['report_img_3'] = $request->file('report_img_3')->store('report-images');
        }
        if ($request->file('report_img_4') != null) {
            $data['report_img_4'] = $request->file('report_img_4')->store('report-images');
        }
        if ($request->file('report_img_5') != null) {
            $data['report_img_5'] = $request->file('report_img_5')->store('report-images');
        }

        $report = Report::firstWhere('id', $report_id);
        $report->update($data);
        return redirect()->intended('/admin/reports');
    }
}
