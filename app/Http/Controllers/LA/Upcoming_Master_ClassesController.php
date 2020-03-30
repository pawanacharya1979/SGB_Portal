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

use App\Models\Upcoming_Master_Class;

class Upcoming_Master_ClassesController extends Controller
{
	public $show_action = true;
	public $view_col = 'title';
	public $listing_cols = ['id', 'coursename', 'coursedetails', 'applicationform', 'status'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Upcoming_Master_Classes', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Upcoming_Master_Classes', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Upcoming_Master_Classes.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Upcoming_Master_Classes');
		
		//echo "<pre>";print_r($module);exit;
		
		if(Module::hasAccess($module->id)) {
			return View('la.upcoming_master_classes.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new upcoming_master_class.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created upcoming_master_class in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Upcoming_Master_Classes", "create")) {
		
			$rules = Module::validateRules("Upcoming_Master_Classes", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Upcoming_Master_Classes", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.upcoming_master_classes.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified upcoming_master_class.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Upcoming_Master_Classes", "view")) {
			
			$upcoming_master_class = Upcoming_Master_Class::find($id);
			if(isset($upcoming_master_class->id)) {
				$module = Module::get('Upcoming_Master_Classes');
				$module->row = $upcoming_master_class;
				
				return view('la.upcoming_master_classes.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('upcoming_master_class', $upcoming_master_class);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("upcoming_master_class"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified upcoming_master_class.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Upcoming_Master_Classes", "edit")) {			
			$upcoming_master_class = Upcoming_Master_Class::find($id);
			if(isset($upcoming_master_class->id)) {	
				$module = Module::get('Upcoming_Master_Classes');
				
				$module->row = $upcoming_master_class;
				
				return view('la.upcoming_master_classes.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('upcoming_master_class', $upcoming_master_class);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("upcoming_master_class"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified upcoming_master_class in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Upcoming_Master_Classes", "edit")) {
			
			$rules = Module::validateRules("Upcoming_Master_Classes", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Upcoming_Master_Classes", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.upcoming_master_classes.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified upcoming_master_class from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Upcoming_Master_Classes", "delete")) {
			Upcoming_Master_Class::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.upcoming_master_classes.index');
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
		$values = DB::table('upcoming_master_classes')->select($this->listing_cols)->whereNull('deleted_at');
		
		//$values = DB::table('upcoming_master_classes')
		//->leftjoin('course_details', 'course_details.id', '=', 'upcoming_master_classes.c')
		//->select($this->listing_cols)->whereNull('deleted_at');
		
		
		
		
		
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Upcoming_Master_Classes');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/upcoming_master_classes/'.$data->data[$i][0].'/edit').'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Upcoming_Master_Classes", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/upcoming_master_classes/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Upcoming_Master_Classes", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.upcoming_master_classes.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button onclick="return confirm(\'Are you sure to delete?\')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
	
	
	public function getcoursedetails($courseid)
    {
       $coursedetails = DB::table('course_details')->select('coursedetails')->where('id',$courseid)->first();
	   $details = "";
       if($coursedetails){
           $details = $coursedetails->coursedetails;
       }

       return $details;
    }
}
