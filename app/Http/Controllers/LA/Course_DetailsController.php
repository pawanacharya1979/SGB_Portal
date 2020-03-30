<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Course_Detail;
use App\Models\Upload;
class Course_DetailsController extends Controller
{
	public $show_action = true;
	public $view_col = 'coursename';
	public $listing_cols = ['id', 'coursename', 'coursedetails', 'startdate', 'enddate', 'courseprogram', 'traveldetails', 'materials', 'status'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Course_Details', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Course_Details', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Course_Details.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Course_Details');
		
		if(Module::hasAccess($module->id)) {
			return View('la.course_details.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new course_detail.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created course_detail in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Course_Details", "create")) {
		
			$rules = Module::validateRules("Course_Details", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Course_Details", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.course_details.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified course_detail.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Course_Details", "view")) {
			
			$course_detail = Course_Detail::find($id);
			if(isset($course_detail->id)) {
				$module = Module::get('Course_Details');
				$module->row = $course_detail;
				
				return view('la.course_details.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('course_detail', $course_detail);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("course_detail"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified course_detail.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Course_Details", "edit")) {			
			$course_detail = Course_Detail::find($id);
			$cmaterials = str_replace(array('[', ']'), '', $course_detail->materials);
			$cprogram = $course_detail->courseprogram;
			$ctraveldetails = $course_detail->traveldetails;
			$materials = explode(",", $cmaterials);
			$uploads = DB::table('uploads')->whereNotNull('deleted_at')->get();
			foreach ($uploads as $upload)
			{
			    if($cprogram == $upload->id){
					$course_detail->update(['courseprogram' => '0']);
			    }
			    if($ctraveldetails == $upload->id){
			    	$course_detail->update(['traveldetails' => '0']);
			    }
			    $key = array_search('"'.$upload->id.'"', $materials);
	            if($key===false){
	            }
	            else {
	                unset($materials[$key]);
	                $materialsString = implode(",", $materials);
	        	    $coursemeterials = "[".$materialsString."]";
			        $course_detail->update(['materials' => $coursemeterials]);
	           } 
            }        
			if(isset($course_detail->id)) {	
				$module = Module::get('Course_Details');
				
				$module->row = $course_detail;
				
				return view('la.course_details.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('course_detail', $course_detail);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("course_detail"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified course_detail in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Course_Details", "edit")) {
			
			$rules = Module::validateRules("Course_Details", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Course_Details", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.course_details.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified course_detail from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Course_Details", "delete")) {
			Course_Detail::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.course_details.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('course_details')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Course_Details');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/course_details/'.$data->data[$i][0]).'/edit">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Course_Details", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/course_details/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Course_Details", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.course_details.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button onclick="return confirm(\'Are you sure to delete?\')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
