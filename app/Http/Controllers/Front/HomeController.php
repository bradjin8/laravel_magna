<?php
/**
 * Created by PhpStorm.
 * User: headit74
 * Date: 8/31/20
 * Time: 12:53 PM
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\TrackRecordModel;
use App\Models\VisitorModel;
use Illuminate\Http\Request;
use App\Utils\AppInitializer;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    private $module_view_folder;
    private $module_pdf_path;
    private $module_video_path;
    private $arr_view_data;
    private $module_title;
    private $home_url_path;

    private $categoryModel;
    private $trackRecordModel;
    private $visitorModel;

    function __construct(CategoryModel $categoryModel, TrackRecordModel $trackRecordModel, VisitorModel $visitorModel)
    {
        $this->arr_view_data = [];
        $this->module_title = "Home";
        $this->module_view_folder = "front";
        $this->home_url_path = url('/');
        $this->module_pdf_path = '/front/pdfs/';
        $this->module_video_path = '/front/content/';


        $this->categoryModel = $categoryModel;
        $this->trackRecordModel = $trackRecordModel;
        $this->visitorModel = $visitorModel;
    }

    public function initDatabase()
    {
        AppInitializer::initDatabase();
        return 'database initialized';
    }

    public function test()
    {
        return 'test';
    }

    public function index()
    {
        AppInitializer::initDatabase();

        session(['lastController' => 'Index', 'lastTime' => time(),]);
        return view($this->module_view_folder . '.index');
    }

    public function register(Request $request)
    {
        $relationship = $request->input('relationship', null);
        $country = $request->input('country', null);
        $how = $request->input('how', null);

        if ($relationship != null && $country != null && $how != null) {
            $visitor = new VisitorModel(['relationship' => $relationship, 'country' => $country, 'how' => $how]);
            $visitor->save();

            session(['relationship' => $relationship, 'country' => $country, 'how' => $how, 'visitor_id' => $visitor->id]);

//            return $relationship . '/' . $country . '/' . $how;
            return redirect('/pano');
        } else {
            return redirect('/');
        }
    }

    public function pano()
    {
//        return $testSession . '/' . $lastTime . '/' . $diffTime;
        return view($this->module_view_folder . '.pano');
    }

    public function category($category)
    {
        $obj_category = $this->categoryModel->where(['slug' => $category])->first();

        if ($obj_category) {
            $arr_category = $obj_category->toArray();
            $time = time();
            $type = 'page';

            // update session
            $this->_update_session($obj_category->id, $type, $time);


            $this->arr_view_data['title'] = $arr_category['name'];
            $this->arr_view_data['category'] = $arr_category['slug'];
            return view($this->module_view_folder . '.' . $category, $this->arr_view_data);
        } else {
            return redirect('/pano');
        }
    }

    protected function _update_session($category_id, $type, $time, $file = '')
    {
        $prev_category_id = session('category_id', null);
        $prev_type = session('type', null);
        $prev_time = session('time', null);
        $prev_file = session('file', null);
        $visitor_id = session('visitor_id', 0);


        if ($type == 'pdf') {
            $record = new TrackRecordModel(['category_id' => $category_id, 'type' => $type, 'duration_in_sec' => 0, 'file_name' => $file, 'visitor_id' => $visitor_id]);
            $record->save();
        } else if ($type == 'page') {
            $record = new TrackRecordModel(['category_id' => $category_id, 'type' => $type, 'duration_in_sec' => 0, 'file_name' => $file, 'visitor_id' => $visitor_id]);
            $record->save();
        }

        // for calculating time spent for page and videos
        if ($prev_time != null) {
            if ($prev_type == 'video') {
                $record = new TrackRecordModel(['category_id' => $prev_category_id, 'type' => $prev_type, 'duration_in_sec' => $time - $prev_time, 'file_name' => $prev_file, 'visitor_id' => $visitor_id]);
                $record->save();

            } else if ($prev_type == 'pdf') {
                //$record = new TrackRecordModel(['category_id' => $category_id, 'type' => $prev_type]);
                //$record->save();

            } else if ($prev_type == 'page') {
                if ($type == 'page') {
                    if ($prev_category_id != $category_id) {
                        // save record into database
                        $record = new TrackRecordModel(['category_id' => $prev_category_id, 'type' => $type, 'duration_in_sec' => $time - $prev_time, 'file_name' => $prev_file, 'visitor_id' => $visitor_id]);
                        $record->save();

                    } else {
                        return;
                    }
                } else {
                    $record = new TrackRecordModel(['category_id' => $prev_category_id, 'type' => $prev_type, 'duration_in_sec' => $time - $prev_time, 'file_name' => $prev_file, 'visitor_id' => $visitor_id]);
                    $record->save();
                }

            }
        }

        session(['type' => $type, 'category_id' => $category_id, 'time' => $time, 'file' => $file]);
    }

    public function downloadPDF($category, $file)
    {
        $obj_category = $this->categoryModel->where(['slug' => $category])->first();

        $path = public_path($this->module_pdf_path . $category . '/' . $file);

        if ($obj_category && file_exists($path)) {
            $type = 'pdf';
            $time = time();

            $this->_update_session($obj_category->id, $type, $time, $file);

            return response()->file($path);
        } else {
            $data['success'] = 'false';
            $data['message'] = 'Can not find the pdf file.';
            return response()
                ->json($data, 404);
        }
    }

    public function videosMechatronics($sub_category, $file)
    {
        $category = 'mechatronics';
        $obj_category = $this->categoryModel->where(['slug' => $category])->first();

        $path = public_path($this->module_video_path . $category . '/' . $sub_category . '/' . $file);

        if ($obj_category && file_exists($path)) {
            $type = 'video';
            $time = time();

            $this->_update_session($obj_category->id, $type, $time, $file);

            return response()->file($path);
        } else {
            $data['success'] = 'false';
            $data['message'] = 'Can not find the video.';
            return response()
                ->json($data, 404);
        }

    }

    public function videos($category, $file)
    {
        $obj_category = $this->categoryModel->where(['slug' => $category])->first();

        $path = public_path($this->module_video_path . $category . '/' . $file);

        if ($obj_category && file_exists($path)) {
            $type = 'video';
            $time = time();

            $this->_update_session($obj_category->id, $type, $time, $file);

            return response()->file($path);
        } else {
            $data['success'] = 'false';
            $data['message'] = 'Can not find the video.';
            return response()
                ->json($data, 404);
        }

    }

}