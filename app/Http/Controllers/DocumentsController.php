<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DownloadRequest;
use App\Models\Paper;

class DocumentsController extends Controller
{

    public function show(Paper $paper)
    {
        return view('doc_details', compact('paper'));
    }

    public function download(DownloadRequest $request, Paper $paper)
    {
        $user = \Auth::user();
        if(isset($user->degree)){
            if(in_array($user->id, $paper->professionals->pluck('id')->toArray())){
                $file = $paper -> file;
                $pathinfo = pathinfo($file);
                return response()->download(storage_path("app/public/{$file}"), substr($paper->title, 0, 30) . (array_key_exists("extension", $pathinfo) ? "." . $pathinfo["extension"] : ""));
            }
        }else{
        $plan = $user -> lastPlan();
        if(!empty($plan)){
            if ($plan -> pivot -> end_date < date('Y-m-d')) {
                session()->flash('errors',[__('site.plan-expired')]);
                return redirect()->back();
            }
            if ($plan -> downloads_limit <= $user -> downloads() -> where("student_plan_id", $plan -> pivot -> id) -> count()) {
                session()->flash('errors',[__('site.plan-download-limit-exceeded')]);
                return redirect()->back();
            }
            $paper->downloads()->create(['student_id' => auth()->id(), 'student_plan_id' => $plan -> pivot -> id]);
            $file = $paper -> file;
            $pathinfo = pathinfo($file);
            return response()->download(storage_path("app/public/{$file}"), substr($paper->title, 0, 30) . (array_key_exists("extension", $pathinfo) ? "." . $pathinfo["extension"] : ""));
        }
    }
        session()->flash('errors',[__('site.do-not-have-plan')]);
         return redirect()->back();
    }
}