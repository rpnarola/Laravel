<?php
use Symfony\Component\HttpKernel\Exception\HttpException;
namespace App\Http\Controllers\admin;

use App\Models\Projects;
use App\Models\ProjectCategories;
use App\Models\Galleries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Session;
/**
 * Description of ProjectsController
 *
 * @author rp
 */
class ProjectsController extends Controller
{

    /**
     * call by defaul
     * 
     * @return view of project
     */
    public function index()
    {
        
        $searchterm = Input::get('searchterm');
        if ($searchterm)
        {
            Session::put('search', $searchterm);
            $projects = DB::table('projects')
                    ->where('projects.name', 'LIKE', '%' . $searchterm . '%')
                    ->orWhere('projects.web_link', 'LIKE', '%' . $searchterm . '%')
                    ->orWhere('projects.technology', 'LIKE', '%' . $searchterm . '%')
                    ->orWhere('projects.features', 'LIKE', '%' . $searchterm . '%')
                    ->where('projects.is_deleted', '=', 0)
                    ->orderBy('projects.id', 'DESC')
                    ->leftJoin('project_categories', 'projects.category_id', '=', 'project_categories.id')
                    ->select('projects.*', 'project_categories.category')
                    ->paginate(5);
            //$projects = Projects::where('name', 'LIKE', '%' . $searchterm . '%')->orWhere('web_link', 'LIKE', '%' . $searchterm . '%')->orWhere('technology', 'LIKE', '%' . $searchterm . '%')->orWhere('features', 'LIKE', '%' . $searchterm . '%')->where('is_deleted', '=', 0)->orderBy('id', 'DESC')->paginate(3);
        }
        else
        {
            $value = Session::forget('search');
            $projects = DB::table('projects')
                            ->where('projects.is_deleted', '=', 0)
                            ->leftJoin('project_categories', 'projects.category_id', '=', 'project_categories.id')
                            ->select('projects.*', 'project_categories.category')
                            ->orderBy('projects.id', 'DESC')->paginate(5);
            //$projects = Projects::where('is_deleted', '=', 0)->orderBy('id','DESC')->paginate(3);
        }

        return view('admin/projects')->with('projects', $projects);
    }



   

}
