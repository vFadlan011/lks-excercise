<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;

use App\Helpers\PaginationHelper;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller {
    // GET /
    public function create() {
        return view('welcome', [
            'title' => 'home',
        ]);
    }

    // POST /
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'nik' => 'required|numeric',
            'email' => 'email|max:320',
            'phone' => 'numeric|digits_between:10,15',
            'report_msg' => 'required',
            'img1' => 'image|file|max:5000',
            'img2' => 'nullable|image|file|max:5000',
            'img3' => 'nullable|image|file|max:5000',
            'img4' => 'nullable|image|file|max:5000',
            'img5' => 'nullable|image|file|max:5000',
        ]);

        // TODO: Redirect to `/#form-aduan` if validation failed
        if (!$validatedData) {
            return redirect(route('/') . '#form-aduan');
        }

        $report = new Report();
        $report->name = $request->name;
        $report->nik = $request->nik;

        if ($request->email != null) {
            $report->email = $request->email;
        }

        $report->phone = $request->phone;
        $report->report_msg = $request->report_msg;

        $report->report_img1 = $request->file('img1')->store('report-images');

        if ($request->file('img2') != NULL) {
            $report->report_img2 = $request->file('img2')->store('report-images');
        }
        if ($request->file('img3') != NULL) {
            $report->report_img3 = $request->file('img3')->store('report-images');
        }
        if ($request->file('img4') != NULL) {
            $report->report_img4 = $request->file('img4')->store('report-images');
        }
        if ($request->file('img5') != NULL) {
            $report->report_img5 = $request->file('img5')->store('report-images');
        }

        $report->report_timestamp = Carbon::now()->timestamp;
        $report->save();
        return redirect()->back();
    }

    // GET /search
    public function search(Request $request) {
        $reports = Report::all();
        $search = $request->input('nik');
        $results = $reports->where('nik', NULL, $search);

        return view('search', [
            'title' => 'search'
        ], compact('results'));
    }

    // GET /admin
    public function showStats() {
        $reports = Report::all();

        $totalReports = $reports->count();
        $finishedReports = $reports->where('status', NULL, 'SELESAI')->count();
        $onProgressReports = $reports->where('status', NULL, 'DIPROSES')->count();
        $newReports = $reports->where('status', NULL, 'BARU')->count();

        return view('dashboard', [
            'title' => 'dashboard',
            'totalReports' => $totalReports,
            'finishedReports' => $finishedReports,
            'onProgressReports' => $onProgressReports,
            'newReports' => $newReports
        ]);
    }

    // GET /admin/reports
    public function showReports() {
        $reports = Report::all();
        $results = PaginationHelper::paginate($reports->where('status', NULL, 'BARU'), 20);
        return view('reports', [
            'title' => 'reports',
        ], compact('results'));
    }

    // GET /admin/responses
    public function showResponses() {
        $reports = Report::orderBy('status', 'asc')->orderBy('response_timestamp', 'desc')->get();
        $respondent_id = Auth::user()['id'];
        $results = PaginationHelper::paginate($reports->where('respondent_id', NULL, $respondent_id), 20);
        return view('responses', [
            'title' => 'responses',
        ], compact('results'));
    }

    // GET /admin/reports/{report_id} and /search/{report_id}
    public function showReport($report_id) {
        $report = Report::all()->firstWhere('id', NULL, $report_id);

        if ($report == NULL) {
            abort(404);
        }

        $respondent = User::all()->firstWhere('id', NULL, $report->respondent_id);
        if ($respondent != NULL) {
            $respondent = $respondent->username;
        } else {
            $respondent = "";
        }

        /* get view name */
        $route = Route::current()->uri;
        $view = '';
        if ($route == 'search/{report_id}') {
            $view = 'report';
        } else if ($route == 'admin/reports/{report_id}') {
            $view = 'respond';
        }

        return view($view, [
            'title' => 'report',
            'respondent' => $respondent
        ], compact('report'));
    }

    // POST /admin/reports/{report_id}
    public function respond(Request $request, $report_id) {
        $validatedData = $request->validate([
            'status' => 'required',
            'response_msg' => 'required',
            'img1' => 'nullable|image|file|max:5000',
            'img2' => 'nullable|image|file|max:5000',
            'img3' => 'nullable|image|file|max:5000',
            'img4' => 'nullable|image|file|max:5000',
            'img5' => 'nullable|image|file|max:5000',
        ]);

        $data = [
            'status' => $request->status,
            'response_msg' => $request->response_msg,
            'response_timestamp' => Carbon::now()->timestamp,
            'respondent_id' => Auth::user()["id"],
        ];

        if ($request->file('img1') != NULL) {
            $data['response_img1'] = $request->file('img1')->store('response-images');
        }
        if ($request->file('img2') != NULL) {
            $data['response_img2'] = $request->file('img2')->store('response-images');
        }
        if ($request->file('img3') != NULL) {
            $data['response_img3'] = $request->file('img3')->store('response-images');
        }
        if ($request->file('img4') != NULL) {
            $data['response_img4'] = $request->file('img4')->store('response-images');
        }
        if ($request->file('img5') != NULL) {
            $data['response_img5'] = $request->file('img5')->store('response-images');
        }

        $record = Report::find($report_id);
        $record->update($data);

        return redirect()->intended('/admin/reports');
    }
}
