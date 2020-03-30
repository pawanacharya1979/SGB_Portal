<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_Program extends Model
{
    use SoftDeletes;
	
	protected $table = 'course_programs';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
	
	public function getCourses() {
		$aResult = Course_Program::join('uploads', function ($join) {
            $join->on('uploads.id', '=', 'course_programs.course_program');
        })
		->get(['uploads.name','uploads.hash','course_programs.name as course']);
		
		foreach ($aResult as $aCourse) {
			$aCourses[] = [
				"link" => "/public/files/" . $aCourse->hash . "/" . $aCourse->name,
				"course" => $aCourse->course
			];
		}
		
		return $aCourses;
	}
}
