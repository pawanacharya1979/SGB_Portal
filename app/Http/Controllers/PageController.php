<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Upload;
use App\Models\Course_Program;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Models\Course_Detail;
/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public $bs_url;
	public $temp_path;
    public function __construct()
    {
        $this->bs_url='http://dai.avedemos.uk';
        $this->temp_path='/home/sites/avedemos.uk/public_html/dai';
    }
	
	public function getPage($sPage) {
		$oContent = new Page();
		$Data = $oContent->getPage($sPage);
		
		if(empty($Data)){ 
		return view('course404');
		} else {
			return view('page',compact('Data'));
		}
	
		
	}
	
	public function courseMaterial() {
		$oContent = new Page();
		$Data = $oContent->getPage('course-materials');
		//echo"<pre>";print_r($Data);
		$bs_url=$this->bs_url;
		//$oCourses = new Course_Program();
		//$aCourses = $oCourses->getCourses();
		$user=Auth::user();
		//print_r($user->course);
		if($user){
			$course=Course_Detail::find($user->course);
			if(!empty($course)){
				if(!empty($course->courseprogram)){
					$courseprogram=Upload::find($course->courseprogram);
					$path=str_replace('/home/sites/avedemos.uk/public_html/dai','',$courseprogram->path);
					if($courseprogram->extension=='pdf' || $courseprogram->extension=='docx' || $courseprogram->extension=='doc' || $courseprogram->extension=='xlsx'){
						$file=$bs_url.$path;
						$course->courseprogram=$file;
					} else if($courseprogram->extension=='png'){
						$file=$bs_url.$path;
						$course->courseprogram=$file;
					}
				} else {
					$course->courseprogram='0';
				}
				if(!empty($course->traveldetails)){
					$traveldetails=Upload::find($course->traveldetails);
					$path=str_replace('/home/sites/avedemos.uk/public_html/dai','',$traveldetails->path);
					if($traveldetails->extension=='pdf' || $traveldetails->extension=='docx'  || $traveldetails->extension=='doc'|| $traveldetails->extension=='xlsx'){
						$file=$bs_url.$path;
						$course->traveldetails=$file;
					} else if($traveldetails->extension=='png'){
						$file=$bs_url.$path;
						$course->traveldetails=$file;
					}
				} else {
				$course->traveldetails='0';
				}
			}
			else {
				$course='';
			}
		} else {
			//die('aaa');
			$course='';
		}
		// foreach($course->materials as $key=>$value){
		// 	echo $value.'<br>';
		// }
		//echo '<pre>';print_r($course);echo '</pre>'; die;
		if(empty($Data)){
			return view('course404');
		} else {
			return view('course',compact('Data', 'aCourses','course'));
		}
	}

	public function courseRegistration() {
		$oContent = new Page();
		$Data = $oContent->getPage('registration');
		
		//$oCourses = new Course_Program();
		//$aCourses = $oCourses->getCourses();
		
		if(empty($Data)){
			return view('course404');
		} else {
	
		return view('registration',compact('Data', 'aCourses'));
		}
	}

	public function masterClasses() {
		$oContent = new Page();
		$Data = $oContent->getPage('master-class');
		$bs_url=$this->bs_url;
		if(!empty($Data)){
			if(!empty($Data->coursebrochure)){
				$coursebrochure=Upload::find($Data->coursebrochure);
				if($coursebrochure){
					$path=str_replace('/home/sites/avedemos.uk/public_html/dai','',$coursebrochure->path);
					if($coursebrochure->extension=='pdf' || $coursebrochure->extension=='docx'  || $coursebrochure->extension=='doc' || $coursebrochure->extension=='xlsx'){
						$file=$bs_url.$path;
						$Data->coursebrochure=$file;
					} else if($coursebrochure->extension=='png'){
						$file=$bs_url.$path;
						$Data->coursebrochure=$file;
					}
				}
			} else {
				$Data->coursebrochure='#';
			}
			if(!empty($Data->exampleprogram)){
				$exampleprogram=Upload::find($Data->exampleprogram);
				if($exampleprogram){
					$path=str_replace('/home/sites/avedemos.uk/public_html/dai','',$exampleprogram->path);
					if($exampleprogram->extension=='pdf' || $exampleprogram->extension=='docx'  || $exampleprogram->extension=='doc'|| $exampleprogram->extension=='xlsx'){
						$file=$bs_url.$path;
						$Data->exampleprogram=$file;
					} else if($exampleprogram->extension=='png'){
						$file=$bs_url.$path;
						$Data->exampleprogram=$file;
					}
				}
			} else {
				$Data->exampleprogram='#';
			}
			if(!empty($Data->registration)){
				$registration=Upload::find($Data->registration);
				$path=str_replace('/home/sites/avedemos.uk/public_html/dai','',$registration->path);
				if($registration->extension=='pdf' || $registration->extension=='docx'  || $registration->extension=='doc'|| $registration->extension=='xlsx'){
					$file=$bs_url.$path;
					$Data->registration=$file;
				} else if($registration->extension=='png'){
					$file=$bs_url.$path;
					$Data->registration=$file;
				}
			} else {
				$Data->registration='#';
			}
		} else{
			$Data = new \stdClass();
			$Data->deleted_at = '';
			$Data->created_at = '';
			$Data->updated_at = '';
			$Data->pagetitle = '';
			$Data->pagesubtitle = '';
			$Data->bannerbackground1 = '';
			$Data->bannerbackground2 = '';
			$Data->contentblock1 = '';
			$Data->contentblock2 = '';
			$Data->contentblock3 = '';
			$Data->status = '';
			$Data->bannerheader1 = '';
			$Data->bannerheader2 = '';
			$Data->coursebrochure = '';
			$Data->exampleprogram = '';
			$Data->registration = '';
		}
		//echo '<pre>';print_r($Data);echo '</pre>';die;
		//$oCourses = new Course_Program();
		//$aCourses = $oCourses->getCourses();
		if(empty($Data)){
			return view('course404');
		} else {
			return view('master-class',compact('Data', 'aCourses'));
		}
	}

	public function communityofPractice() {
		$oContent = new Page();
		$Data = $oContent->getPage('community-of-practice');
		
		if(empty($Data)){
			return view('course404');
		} else {
	
		return view('community-of-practice',compact('Data', 'aCourses'));
		}
	}

}