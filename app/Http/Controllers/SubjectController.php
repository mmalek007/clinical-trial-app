<?php
namespace App\Http\Controllers;

use App\Http\Requests\SubjectScreeningRequest;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(SubjectScreeningRequest $request)
    {
        $validatedData = $request->validated();

        $subject = Subject::create($validatedData);

        // Determine eligibility
        if (strtotime($validatedData['date_of_birth']) > strtotime('-18 years')) {
            // Under 18
            $message = 'Participants must be over 18 years of age';
            $eligible = false;
            $cohort = null;
        } elseif ($validatedData['migraine_frequency'] == 'Monthly' || $validatedData['migraine_frequency'] == 'Weekly') {
            // Monthly or Weekly migraine frequency
            $message = 'Participant ' . $validatedData['first_name'] . ' is assigned to Cohort A';
            $eligible = true;
            $cohort = 'A';
        } else {
            // Daily migraine frequency
            $message = 'Candidate ' . $validatedData['first_name'] . ' is assigned to Cohort B';
            $eligible = true;
            $cohort = 'B';
        }

        // Save the cohort information
        $subject->update(['cohort' => $cohort]);

        return view('subjects.results', compact('eligible', 'message', 'cohort'));
    }
}
