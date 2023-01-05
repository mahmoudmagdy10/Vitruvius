<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Vitruvius\Comment\Models\Comment;
use Vitruvius\Customer\Services\CustomerService;
use Vitruvius\Project\Models\Project;
use Vitruvius\Project\Requests\ProjectRequest;
use Vitruvius\Project\Services\ProjectService;
use Vitruvius\Project\Services\PropsService;

class ProjectController extends Controller
{
    private $projectService;
    private $customerService;
    private $propsService;
    public function __construct(CustomerService $customerService,ProjectService $projectService, PropsService $propsService){
        $this->customerService = $customerService;
        $this->projectService = $projectService;
        $this->propsService = $propsService;
    }

    public function showUploadProject()
    {
        return view('pages.customer.upload_building');
    }
    public function save_upload(ProjectRequest $request)
    {
        $this->projectService->upload($request);
        $this->propsService->upload($request);
        return redirect()->route('upload');

    }

    public function showProject()
    {
        try{
            $customer = User::find(Auth::user()->id);
            $projects = Project::where('user_id', '=', $customer->id)->with(['props'])->orderBy('id', 'DESC')->get();

            if (!$customer) {
                return redirect()->route('login');
            } else {
                return view('pages.customer.your_projects')->with(compact('customer','projects'));
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function customerProjectDetails($id)
    {
        try{
            $user = Auth::user();
            $project = Project::where('id', '=', $id)->with(['props'])->get();
            $project_id = $id;

            // return $user;

            if(Auth::user()->type =="Customer"){
                $comments = Comment::where('project_id',$id)->with(['users','replies'])->get();

                if (!$user && !$project) {
                    return redirect()->back();
                }
                else {
                    return view('pages.customer.details')->with(compact('user','project','comments','project_id'));
                    // return $user;
                }
            }
            if($user->type == "Contractor"){
                $comments = Comment::where('project_id',$id)->where('user_id',$user->id)->with(['users','replies'])->get();
                    // return $comments;

                if (!$project) {
                    return redirect()->back();
                }
                else {

                    return view('pages.customer.details')->with(compact('user','project','comments','project_id'));


                }
            }
            // $num_of_comments = Comment::where('user_id',"=",Auth::user()->id)->where('project_id',"=",$id)->get();

        } catch (\Exception $e) {
            // return redirect()->route('show_project')->with('هناك خطأ يرجي المحاوله في وقت اخر');
            return "No";
        }

    }

    public function contractorprojectDetails($id)
    {
        try{
            $user = Auth::user();
            $project = Project::where('id', '=', $id)->with(['props'])->get();
            $comments = Comment::where('project_id',$id)->where('user_id',$user->id)->with(['users','replies'])->get();
            $project_id = $id;
            // // $user = Comment::where('user_id',$user->id)->with(['users'])->get();
            // $num_of_comments = Comment::where('user_id',"=",Auth::user()->id)->where('project_id',"=",$id)->get();

            // return $comments;
            if (!$user && !$project) {
                return redirect()->back();
            } else {
                return view('pages.contractor.details')->with(compact('user','project','comments','project_id'));

            }
        } catch (\Exception $e) {
            // return redirect()->route('show_project')->with('هناك خطأ يرجي المحاوله في وقت اخر');
            return "No";
        }

    }
    public function DeleteProject($id)
    {
        try{

            $project = Project::findOrFail($id);

            if ($project->file2D_path && Storage::exists('public/images/files_2D/'.$project->file2D_path)) {

                Storage::delete('public/images/files_2D/'.$project->file2D_path);
                $project->delete();
                return redirect()->route('show_project')->with('success','Project Deleted Successfully');

            }


        } catch (\Exception $e) {
            // return redirect()->back();
            return "No";
        }
    }
}
