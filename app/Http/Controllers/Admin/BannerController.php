<?php

namespace App\Http\Controllers\Admin;


use App\Interfaces\LanguageInterface;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Service\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
	protected $upload_service;
	protected $banner_repository;
	protected $language_repository;

	public function __construct(UploadService $upload_service,BannerRepository $banner_repository, LanguageInterface $language )
	{
		$this->upload_service = $upload_service;
		$this->banner_repository = $banner_repository;
		$this->language_repository = $language;
	}

	public function index()
	{
		$banners = Banner::all();
		return view('admin.banner.index')->with('banners', $banners);
	}

	public function create()
	{
		$languages = $this->language_repository->getOptions();
		return view('admin.banner.create',compact('languages'));
	}

	public function store(Request $request)
	{
		$rules = array(
			'banner_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['english_image_name']=$this->uploadImage('image');
            $image_name['french_image_name']=$this->uploadImage('french_image');
			$brand=$this->banner_repository->create($request->all(),$image_name);
			if($brand){
				flash()->success(config('message.banner.add-success'));
				return Redirect('admin/banner');
			}
		}
	}

	public function edit($id, Request $request)
	{
		$banner = Banner::find($id);
		$languages = $this->language_repository->getOptions();
		return view('admin.banner.edit')->with('banner', $banner)->with('languages',$languages);
	}

	public function update($id,Request $request){

		$rules = array(
			'banner_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['english_image_name']=$this->uploadImage('image');
            $image_name['french_image_name']=$this->uploadImage('french_image');
			$banner=$this->banner_repository->updateById($id,$request->all(),$image_name);
			if($banner){
				flash()->success(config('message.banner.update-success'));
				return Redirect('admin/banner');
			}
			return Redirect('admin/banner');
		}
	}

	public function uploadImage($name){
		$image_name = "";
		if (Input::File($name)) {
			$file = Input::file($name);
			try{
              $image_name = $this->upload_service->upload($file, 'upload/banner');
			}catch(Exception $e){
				  flash()->error($e->getMessage());
                  return Redirect::back();
			}
			
		}
		return $image_name;
	}
	public function destroy($id)
	{
		
		if ($this->banner_repository->deleteById($id)) {
            flash()->success(config('message.banner.delete-success'));
			return Redirect('admin/banner');
		}
	}
}
