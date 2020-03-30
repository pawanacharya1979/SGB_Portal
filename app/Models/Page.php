<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	
	protected $table = 'cms_pages';
	
	public function getPage($sPage) {
		
		$aRes = Page::leftJoin('uploads', 'uploads.id', '=', 'cms_pages.bannerbackground1')
		->where(['pagesubtitle' => $sPage])
		->get()->first();
		/* TODO
		$aRes = Page::join('uploads', function ($join) {
            $join->on('uploads.id', '=', 'cms_pages.bannerbackground1')->orOn('uploads.id', '=', 'cms_pages.bannerbackground2');
        })
		->where(['pagesubtitle' => $sPage])
		->get()->first();	*/	
		if(!empty($aRes)){
		$aFullPath = explode('/',$aRes->path);		
		$aRes->path = end($aFullPath);
		
		return $aRes;
	}else{
		return false;
	}
	}
	
}
