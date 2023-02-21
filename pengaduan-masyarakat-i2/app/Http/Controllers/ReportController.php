<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller {
    public function index() {
        return view('welcome', [
            'title' => 'Home'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'nik' => 'required|digits:16',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'report_msg' => 'required',
            'report_img_1' => 'file|mimes:jpg,jpeg,png|nullable|max:1000',
            'report_img_2' => 'file|mimes:jpg,jpeg,png|nullable|max:1000',
            'report_img_3' => 'file|mimes:jpg,jpeg,png|nullable|max:1000',
            'report_img_4' => 'file|mimes:jpg,jpeg,png|nullable|max:1000',
            'report_img_5' => 'file|mimes:jpg,jpeg,png|nullable|max:1000',
        ]);

        $report = new Report();
        $report->name = $request->name;
        $report->nik = $request->nik;
        $report->email = $request->email;
        $report->phone = $request->phone;
        $report->report_msg = $request->report_msg;

        if ($request->file('report_img_1') != null) {
            $report->report_img_1 = $request->file('report_img_1')->store('/report-images');
        }
        if ($request->file('report_img_2') != null) {
            $report->report_img_2 = $request->file('report_img_2')->store('/report-images');
        }
        if ($request->file('report_img_3') != null) {
            $report->report_img_3 = $request->file('report_img_3')->store('/report-images');
        }
        if ($request->file('report_img_4') != null) {
            $report->report_img_4 = $request->file('report_img_4')->store('/report-images');
        }
        if ($request->file('report_img_5') != null) {
            $report->report_img_5 = $request->file('report_img_5')->store('/report-images');
        }

        $report->report_timestamp = Carbon::now()->timestamp;

        $report->save();
        return redirect('/');
    }

    public function respond(Request $request, $report_id) {
        $validatedData = $request->validate([
            'status' => 'required',
            'response_msg' => 'required',
            'response_img_1' => 'nullable|file|mimes:jpg,jpeg,png|max:1000',
            'response_img_2' => 'nullable|file|mimes:jpg,jpeg,png|max:1000',
            'response_img_3' => 'nullable|file|mimes:jpg,jpeg,png|max:1000',
            'response_img_4' => 'nullable|file|mimes:jpg,jpeg,png|max:1000',
            'response_img_5' => 'nullable|file|mimes:jpg,jpeg,png|max:1000',
        ]);

        if ($request->file('response_img_1') != null) {
            $validatedData['response_img_1'] = $request->file('response_img_1')->store('report-images');
        }
        if ($request->file('response_img_2') != null) {
            $validatedData['response_img_2'] = $request->file('response_img_2')->store('report-images');
        }
        if ($request->file('response_img_3') != null) {
            $validatedData['response_img_3'] = $request->file('response_img_3')->store('report-images');
        }
        if ($request->file('response_img_4') != null) {
            $validatedData['response_img_4'] = $request->file('response_img_4')->store('report-images');
        }
        if ($request->file('response_img_5') != null) {
            $validatedData['response_img_5'] = $request->file('response_img_5')->store('report-images');
        }

        $validatedData['response_timestamp'] = Carbon::now()->timestamp;
        $validatedData['respondent_id'] = Auth::user()['id'];
        $report = Report::firstWhere('id', $report_id);
        $report->update($validatedData);

        return redirect("/admin?show=$request->status");
    }

    public function search(Request $request) {
        $reports = Report::where('nik', $request->nik)->orderBy('report_timestamp')->cursorPaginate(20);
        return view('search', [
            'title' => 'Cari Aduan'
        ], compact('reports'));
    }

    public function showReport(Request $request, $report_id) {
        $report = Report::firstWhere('id', $report_id);

        if ($report == null) {
            abort(404);
        }

        $view = 'report';
        if ($request->is('admin/*')) {
            $view = 'respond';
        }

        $respondent = '';
        if ($report->status != 'BARU') {
            $respondent = User::firstWhere('id', $report->respondent_id)['username'];
        }

        $username = "";
        if (Auth::user() != null) {
            $username = Auth::user()['username'];
        }

        return view($view, [
            'title' => 'Tinjau Aduan',
            'respondent' => $respondent,
            'username' => $username
        ], compact('report'));
    }

    public function dashboard(Request $request) {
        $username = Auth::user()['username'];
        if ($request->show == null || $request->show == "all") {
            $show = 'all';
            $reports = Report::orderBy('report_timestamp', 'asc')->cursorPaginate(20);
        } else {
            $show = $request->show;
            $reports = Report::where('status', $request->show)->orderBy('report_timestamp', ($show == "BARU") ? "asc" : "desc")->cursorPaginate(20)->appends($request->query());
        }
        return view('dashboard', [
            'title' => 'Daftar Aduan',
            'username' => $username,
            'show' => $show
        ], compact('reports'));
    }
}
