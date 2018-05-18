<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Filters\Study\SubjectFilters;
use Illuminate\Foundation\Console\Presets\React;
use App\{Task, Group, Study, Subject, Experiment};

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mappings = SubjectFilters::mappings();
        
        $subjects = Subject::filter($request)->paginate(50);
        
        return view('subject.index', compact('subjects','mappings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $subject = new Subject;
        $subject->ime = $request->ime;
        $subject->prezime = $request->prezime;
        $subject->srednje = $request->srednje;
        $subject->rodjen = $request->rodjen;
        $subject->pol = $request->pol == 'm' ? 'm' : 'f';
        $subject->komentar = $request->komentar;
        $subject->save();
           
        $ids = array_values(array_filter($request->studije));
        
        $subject->studies()->attach($ids);

        $subject->groups()->attach($request->grupe);

        return redirect()->route('subject.index')->with('flash', 'Novi korisnik je kreiran.');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject, Request $request)
    {
        // $experiments = DB::table('subjects')
        //     ->join('experiments', 'subjects.id', '=', 'experiments.subject_id')
        //     ->join('tasks', 'experiments.task_id', '=', 'tasks.id')
        //     ->select('experiments.vreme', 'experiments.komentar', 'tasks.name')
        //     ->where('subjects.id', $subject->id)
        //        ->paginate(10);
           
        $experiments = $subject->experiments()->with('task')->filter($request)->paginate(10);
        // $g=Study::find(1);
        // dd($g->experiments()->count());
        $studyGroups = DB::table('subjects')
            ->join('group_subject', 'subjects.id', '=', 'group_subject.subject_id')
            ->join('groups', 'group_subject.group_id', '=', 'groups.id')
            ->join('studies', 'groups.study_id', '=', 'studies.id')
            ->selectRaw('studies.name  as studyName')
            ->selectRaw('groups.name  as groupName')
            ->where('subjects.id', $subject->id)
            ->get();
        //$studyGroups = $subject->studies()->with('tasks')->get();

        $subject = $subject->where('id',$subject->id)->with('studies.tasks')->first();
        
        return view('subject.show', compact('subject','experiments','studyGroups'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $this->authorize('admin');
        
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $this->authorize('admin');

        if($request->has('ime')){
            $subject->ime = $request->ime;
            $subject->prezime = $request->prezime;
            $subject->srednje = $request->srednje;
            $subject->pol = $request->pol == 'm' ? 'm' : 'f';
            $subject->komentar = $request->komentar;
            $subject->save();
        } else {

            $ids = array_values(array_filter($request->studije));

            $subject->studies()->attach($ids);
        
            $subject->groups()->attach($request->grupe);
        }
        
        return redirect()->route('subject.show',$subject->id)->with('flash', 'Profile info has been changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        //
    }
}
