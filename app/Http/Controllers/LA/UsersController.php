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
use Mail;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Dwij\Laraadmin\Models\LAConfigs;

use App\Models\User;

class UsersController extends Controller
{
	public $show_action = true;
	public $view_col = 'email';
	public $listing_cols = ['id', 'email', 'password', 'firstname', 'lastname', 'notes', 'course', 'userappform'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Users', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Users.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Users');
		
		if(Module::hasAccess($module->id)) {
			
			foreach($module->fields as $key => $value) {
				
				if($key == 'notes'){
					$default_emailbody = '';
					$configs = LAConfigs::getAll();
					
					if(isset($configs->default_emailbody)){
						$default_emailbody = $configs->default_emailbody;
					}
				
					$module->fields['notes']['defaultvalue'] = $default_emailbody;
				}
			}
			//echo '<pre>'; print_r($module); echo '</pre>'; die;
			return View('la.users.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created user in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Users", "create")) {
		
			$rules = Module::validateRules("Users", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$request->request->add(['role' => 3]);

			$insert_id = Module::insert("Users", $request);

			$configs = LAConfigs::getAll();

			$templateHtml = "<!DOCTYPE html><html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head> <meta charset='utf-8'> <meta name='viewport' content='width=device-width'> <meta http-equiv='X-UA-Compatible' content='IE=edge'> <meta name='x-apple-disable-message-reformatting'> <title>DAI - Account Created</title> <style>/* What it does: Remove spaces around the email design added by some email clients. */ /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */ html, body{margin: 0 auto !important; padding: 0 !important; height: 100% !important; width: 100% !important;}/* What it does: Stops email clients resizing small text. */ *{-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}/* What it does: Centers email on Android 4.4 */ div[style*='margin: 16px 0']{margin: 0 !important;}/* What it does: Stops Outlook from adding extra spacing to tables. */ table, td{mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;}/* What it does: Fixes webkit padding issue. */ table{border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;}/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */ a{text-decoration: none; color: #ff6d22;}/* What it does: Uses a better rendering method when resizing images in IE. */ img{-ms-interpolation-mode: bicubic;}/* What it does: A work-around for email clients meddling in triggered links. */ a[x-apple-data-detectors], /* iOS */ .unstyle-auto-detected-links a, .aBn{border-bottom: 0 !important; cursor: default !important; color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}/* What it does: Prevents Gmail from changing the text color in conversation threads. */ .im{color: inherit !important;}/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */ .a6S{display: none !important; opacity: 0.01 !important;}/* If the above doesn't work, add a .g-img class to any image in question. */ img.g-img + div{display: none !important;}/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89 */ /* Create one of these media queries for each additional viewport size you'd like to fix */ /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */ @media only screen and (min-device-width: 320px) and (max-device-width: 374px){u ~ div .email-container{min-width: 320px !important;}}/* iPhone 6, 6S, 7, 8, and X */ @media only screen and (min-device-width: 375px) and (max-device-width: 413px){u ~ div .email-container{min-width: 375px !important;}}/* iPhone 6+, 7+, and 8+ */ @media only screen and (min-device-width: 414px){u ~ div .email-container{min-width: 414px !important;}}</style> <style>/* What it does: Hover styles for buttons */ .button-td, .button-a{transition: all 100ms ease-in;}.button-td-primary:hover, .button-a-primary:hover{background: #93b9dc !important; border-color: #93b9dc !important;}/* Media Queries */ @media screen and (max-width: 600px){.email-container{width: 100% !important; margin: auto !important;}/* What it does: Forces table cells into full-width rows. */ .stack-column, .stack-column-center{display: block !important; width: 100% !important; max-width: 100% !important; direction: ltr !important;}/* And center justify these ones. */ .stack-column-center{text-align: center !important;}/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */ .center-on-narrow{text-align: center !important; display: block !important; margin-left: auto !important; margin-right: auto !important; float: none !important;}table.center-on-narrow{display: inline-block !important;}/* What it does: Adjust typography on small screens to improve readability */ .email-container p{font-size: 17px !important;}}</style></head><body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;'> <center style='width: 100%; background-color: #fff;'> <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'> <tr> <td style='padding: 20px 0; text-align: center; background-color:#f2f0ed;'> <img src='http://129.213.78.114/public/logo.png' width='112' height='28' alt='alt_text' border='0' style='height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;'> </td></tr><tr> <td style='background-color: #ffffff;'> <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'> <tr> <td style='padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'> <p>Dear Masterclass Participant,</p> <p>".$request->input('notes')."</p><p>To access the Course Program and Travel Details, please enter the following credentials on the Training Portal: http://dai.avedemos.uk/public/index.php/course-materials</p><p><b>Username</b> : ".$request->input('email')."</p><p><b>Password</b> : ".$request->input('password')."</p><p>Please note that the training materials will be made available just before the course commences and not immediately. This is to ensure that you can access the most up-to-date version of the presentations and handouts.</p><br><p>Kind regards,</p><p>The DAI Training Team</p></td></tr></table> </td></tr><tr> <td valign='middle' style='text-align: center; background-image: url(' https://via.placeholder.com/600x230/222222/666666 '); background-color: #222222; background-position: center center !important; background-size: cover !important;'> </td></tr></table> <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto; background-color:#785200;' class='email-container'> <tr> <td style='padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #fff;'> Company Name, <span class='unstyle-auto-detected-links'>123 Fake Street, SpringField, OR, 97477 US, (123) 456-7890</span> </td></tr></table> </center></body></html>";
			
			//$to = "kbshaik@aveitsolutions.com"; 
			$to = trim($request->input('email')); 
			$subject = "DAI Account Created";
			
			$fromemail = $configs->default_email;

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: DAI <'.$fromemail.'>' . "\r\n";

			mail($to, $subject, $templateHtml ,$headers);
			return redirect()->route(config('laraadmin.adminRoute') . '.users.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Users", "view")) {
			
			$user = User::find($id);
			if(isset($user->id)) {
				$module = Module::get('Users');
				$module->row = $user;
				
				return view('la.users.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('user', $user);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("user"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Users", "edit")) {			
			$user = User::find($id);
			if(isset($user->id)) {	
				$module = Module::get('Users');
				
				$module->row = $user;
				
				return view('la.users.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('user', $user);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("user"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Users", "edit")) {
			
			$rules = Module::validateRules("Users", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$request->request->add(['role' => 3]);

			$insert_id = Module::updateRow("Users", $request, $id);
			

			$configs = LAConfigs::getAll();
			$templateHtml = "<!DOCTYPE html><html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head> <meta charset='utf-8'> <meta name='viewport' content='width=device-width'> <meta http-equiv='X-UA-Compatible' content='IE=edge'> <meta name='x-apple-disable-message-reformatting'> <title>DAI - Account Created</title> <style>/* What it does: Remove spaces around the email design added by some email clients. */ /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */ html, body{margin: 0 auto !important; padding: 0 !important; height: 100% !important; width: 100% !important;}/* What it does: Stops email clients resizing small text. */ *{-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}/* What it does: Centers email on Android 4.4 */ div[style*='margin: 16px 0']{margin: 0 !important;}/* What it does: Stops Outlook from adding extra spacing to tables. */ table, td{mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;}/* What it does: Fixes webkit padding issue. */ table{border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;}/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */ a{text-decoration: none; color: #ff6d22;}/* What it does: Uses a better rendering method when resizing images in IE. */ img{-ms-interpolation-mode: bicubic;}/* What it does: A work-around for email clients meddling in triggered links. */ a[x-apple-data-detectors], /* iOS */ .unstyle-auto-detected-links a, .aBn{border-bottom: 0 !important; cursor: default !important; color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}/* What it does: Prevents Gmail from changing the text color in conversation threads. */ .im{color: inherit !important;}/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */ .a6S{display: none !important; opacity: 0.01 !important;}/* If the above doesn't work, add a .g-img class to any image in question. */ img.g-img + div{display: none !important;}/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89 */ /* Create one of these media queries for each additional viewport size you'd like to fix */ /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */ @media only screen and (min-device-width: 320px) and (max-device-width: 374px){u ~ div .email-container{min-width: 320px !important;}}/* iPhone 6, 6S, 7, 8, and X */ @media only screen and (min-device-width: 375px) and (max-device-width: 413px){u ~ div .email-container{min-width: 375px !important;}}/* iPhone 6+, 7+, and 8+ */ @media only screen and (min-device-width: 414px){u ~ div .email-container{min-width: 414px !important;}}</style> <style>/* What it does: Hover styles for buttons */ .button-td, .button-a{transition: all 100ms ease-in;}.button-td-primary:hover, .button-a-primary:hover{background: #93b9dc !important; border-color: #93b9dc !important;}/* Media Queries */ @media screen and (max-width: 600px){.email-container{width: 100% !important; margin: auto !important;}/* What it does: Forces table cells into full-width rows. */ .stack-column, .stack-column-center{display: block !important; width: 100% !important; max-width: 100% !important; direction: ltr !important;}/* And center justify these ones. */ .stack-column-center{text-align: center !important;}/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */ .center-on-narrow{text-align: center !important; display: block !important; margin-left: auto !important; margin-right: auto !important; float: none !important;}table.center-on-narrow{display: inline-block !important;}/* What it does: Adjust typography on small screens to improve readability */ .email-container p{font-size: 17px !important;}}</style></head><body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;'> <center style='width: 100%; background-color: #fff;'> <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'> <tr> <td style='padding: 20px 0; text-align: center; background-color:#f2f0ed;'> <img src='http://129.213.78.114/public/logo.png' width='112' height='28' alt='alt_text' border='0' style='height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;'> </td></tr><tr> <td style='background-color: #ffffff;'> <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'> <tr> <td style='padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'> <p>Dear Masterclass Participant,</p> <p>".$request->input('notes')."</p><p>To access the Course Program and Travel Details, please enter the following credentials on the Training Portal: http://dai.avedemos.uk/public/index.php/course-materials</p><p><b>Username</b> : ".$request->input('email')."</p><p><b>Password</b> : ".$request->input('password')."</p><p>Please note that the training materials will be made available just before the course commences and not immediately. This is to ensure that you can access the most up-to-date version of the presentations and handouts.</p><br><p>Kind regards,</p><p>The DAI Training Team</p></td></tr></table> </td></tr><tr> <td valign='middle' style='text-align: center; background-image: url(' https://via.placeholder.com/600x230/222222/666666 '); background-color: #222222; background-position: center center !important; background-size: cover !important;'> </td></tr></table> <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto; background-color:#785200;' class='email-container'> <tr> <td style='padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #fff;'> Company Name, <span class='unstyle-auto-detected-links'>123 Fake Street, SpringField, OR, 97477 US, (123) 456-7890</span> </td></tr></table> </center></body></html>";
			
			//$to = "kbshaik@aveitsolutions.com"; 
			$to = trim($request->input('email')); 
			$subject = "Dai-Account Updated";
			
			$fromemail = $configs->default_email;

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: DAI <'.$fromemail.'>' . "\r\n";

			mail($to, $subject, $templateHtml ,$headers);


			return redirect()->route(config('laraadmin.adminRoute') . '.users.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Users", "delete")) {
			//die($id);
			User::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.users.index');
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
		$values = DB::table('users')->select($this->listing_cols)->whereNull('deleted_at')->where('role','3');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Users');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/users/'.$data->data[$i][0]).'/edit">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Users", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/users/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Users", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.users.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline','id'=>'deleteuser'.$data->data[$i][0]]);
					$output .= ' <button class="btn btn-danger btn-xs" onclick="deleteRow(deleteuser'.$data->data[$i][0].')"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
