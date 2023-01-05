<?php
namespace Vitruvius\Project\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Vitruvius\Notification\Services\NotificationService;
use Vitruvius\Project\Models\Project;
use Vitruvius\Project\Requests\ProjectRequest;
use Illuminate\Database\Eloquent\Model;
use Vitruvius\Project\Repository\ProjectRepository;

class ProjectService
{
    private $NotificationService;
    public function __construct(NotificationService $NotificationService)
    {
        $this->NotificationService = $NotificationService;
    }

    public function upload(ProjectRequest $request) {

        // Store Project data && save File 2D
        try{
            $project_id = Project::latest()->first()->id;

            if($request->file() && $request->two != null) {
                $file2DName = time().'_'.$request->two->getClientOriginalName();
                $request->file('two')->move('storage/images/files_2D/',$file2DName);
            }

            if($request->file() && $request->three != null) {
                $file3DName = time().'_'.$request->three->getClientOriginalName();
                $request->file('three')->move('storage/images/files_3D/',$file3DName);
                $arch = null;
            }else {
                $arch = $request->arch;
                $file3DName = null;
            }

            $project = new Project;
            $project->arch = $arch;
            $project->file2D_path = $file2DName;
            $project->file3D_path = $file3DName;
            $project->user_id = Auth::user()->id;
            $project->save();

            $this->NotificationService->AddNotifiaction($project_id);

        } catch (\Exception $e) {

            return redirect()->route('upload');
        }
    }



}
