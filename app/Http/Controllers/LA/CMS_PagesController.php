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

use App\Models\CMS_Page;

class CMS_PagesController extends Controller
{
	public $show_action = true;
	public $view_col = 'pagetitle';
	public $listing_cols = ['id', 'pagetitle', 'pagesubtitle', 'bannerheader1', 'bannerheader2', 'bannerbackground1', 'bannerbackground2', 'contentblock1', 'contentblock2', 'contentblock3', 'coursebrochure', 'exampleprogram', 'registration', 'status'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('CMS_Pages', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('CMS_Pages', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the CMS_Pages.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('CMS_Pages');
		
		if(Module::hasAccess($module->id)) {
			return View('la.cms_pages.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new cms_page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created cms_page in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("CMS_Pages", "create")) {
		
			$rules = Module::validateRules("CMS_Pages", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("CMS_Pages", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.cms_pages.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified cms_page.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("CMS_Pages", "view")) {
			
			$cms_page = CMS_Page::find($id);
			if(isset($cms_page->id)) {
				$module = Module::get('CMS_Pages');
				$module->row = $cms_page;
				
				return view('la.cms_pages.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('cms_page', $cms_page);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("cms_page"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified cms_page.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("CMS_Pages", "edit")) {			
			$cms_page = CMS_Page::find($id);
			if(isset($cms_page->id)) {	
				$module = Module::get('CMS_Pages');
				
				$module->row = $cms_page;
				
				return view('la.cms_pages.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('cms_page', $cms_page);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("cms_page"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified cms_page in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("CMS_Pages", "edit")) {
			
			$rules = Module::validateRules("CMS_Pages", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("CMS_Pages", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.cms_pages.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified cms_page from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("CMS_Pages", "delete")) {
			CMS_Page::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.cms_pages.index');
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
		$values = DB::table('cms_pages')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('CMS_Pages');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/cms_pages/'.$data->data[$i][0]).'/edit">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("CMS_Pages", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/cms_pages/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("CMS_Pages", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.cms_pages.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline','id'=>'deletepage'.$data->data[$i][0]]);
					$output .= ' <button class="btn btn-danger btn-xs"  onclick="deleteRow(deletepage'.$data->data[$i][0].')"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
