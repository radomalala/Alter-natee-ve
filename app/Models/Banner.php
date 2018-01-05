<?php
/**
 * Created by PhpStorm.
 * User: Chirag
 * Date: 4/22/2017
 * Time: 9:19 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Banner extends Model
{

    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    const Banner_IMAGE_PATH = 'https://db-alternateeve-csi7douue.stackpathdns.com/upload/banner/';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'banner_name',
        'title',
        'alt'
    ];

    public function getBannerImage($language_code){
        $image_name=($language_code=='en' || $this->french_banner_image==null)?$this->banner_image:$this->french_banner_image;
        //return URL::to('/').self::Banner_IMAGE_PATH.$image_name;
        return self::Banner_IMAGE_PATH.$image_name;
    }

}