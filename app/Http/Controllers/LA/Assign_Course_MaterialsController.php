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

use App\Models\Assign_Course_Material;

class Assign_Course_MaterialsController extends Controller
{
	public $show_action = true;
	public $view_col = 'username';
	public $listing_cols = ['id', 'username', 'coursename', 'status'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Assign_Course_Materials', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Assign_Course_Materials', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Assign_Course_Materials.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Assign_Course_Materials');
		
		if(Module::hasAccess($module->id)) {
			return View('la.assign_course_materials.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new assign_course_material.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created assign_course_material in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Assign_Course_Materials", "create")) {
		
			$rules = Module::validateRules("Assign_Course_Materials", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			echo $request->coursename;die();
			$insert_id = Module::insert("Assign_Course_Materials", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.assign_course_materials.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified assign_course_material.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Assign_Course_Materials", "view")) {
			
			$assign_course_material = Assign_Course_Material::find($id);
			if(isset($assign_course_material->id)) {
				$module = Module::get('Assign_Course_Materials');
				$module->row = $assign_course_material;
				
				return view('la.assign_course_materials.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('assign_course_material', $assign_course_material);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("assign_course_material"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified assign_course_material.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Assign_Course_Materials", "edit")) {			
			$assign_course_material = Assign_Course_Material::find($id);
			if(isset($assign_course_material->id)) {	
				$module = Module::get('Assign_Course_Materials');
				
				$module->row = $assign_course_material;
				
				return view('la.assign_course_materials.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('assign_course_material', $assign_course_material);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("assign_course_material"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified assign_course_material in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Assign_Course_Materials", "edit")) {
			
			$rules = Module::validateRules("Assign_Course_Materials", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			//print_r($request->coursename);die();
			$insert_id = Module::updateRow("Assign_Course_Materials", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.assign_course_materials.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified assign_course_material from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Assign_Course_Materials", "delete")) {
			Assign_Course_Material::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.assign_course_materials.index');
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
		$values = DB::table('assign_course_materials')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Assign_Course_Materials');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/assign_course_materials/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Assign_Course_Materials", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/assign_course_materials/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Assign_Course_Materials", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.assign_course_materials.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
