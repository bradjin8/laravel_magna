<?php
/**
 * Created by PhpStorm.
 * User: headit74
 * Date: 9/1/20
 * Time: 2:35 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\TrackRecordModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $module_view_folder;
    private $arr_view_data;
    private $categoryModel;
    private $trackRecordModel;

    function __construct(CategoryModel $categoryModel, TrackRecordModel $trackRecordModel)
    {
        $this->module_view_folder = 'admin';

        $this->categoryModel = $categoryModel;
        $this->trackRecordModel = $trackRecordModel;
    }

    public function index() {
        $arr_categories = $this->categoryModel->all();

        $this->arr_view_data['categories'] = $arr_categories;

        $visitors = DB::select("SELECT DISTINCT visitor_id FROM track_records GROUP BY visitor_id;");
        $this->arr_view_data['visitors'] = $visitors;


        $stations = DB::select("SELECT DISTINCT ct.name as name, COUNT(ct.slug) as visit_count, SUM(tr.duration_in_sec) as duration_in_sec FROM track_records tr JOIN categories ct ON ct.id = tr.category_id AND tr.type='page' GROUP BY tr.category_id ORDER BY SUM(tr.duration_in_sec) DESC LIMIT 5;");
        $this->arr_view_data['stations_by_duration'] = $stations;

        $videos = DB::select("SELECT DISTINCT file_name, SUM(duration_in_sec) as duration_in_sec FROM track_records WHERE type='video' GROUP BY file_name ORDER BY SUM(duration_in_sec) DESC LIMIT 5;");
        $this->arr_view_data['videos_by_duration'] = $videos;

        $pdfs = DB::select("SELECT DISTINCT file_name, COUNT(file_name) as download_count FROM track_records WHERE type='pdf' GROUP BY file_name ORDER BY COUNT(file_name) DESC LIMIT 5;");
        $this->arr_view_data['pdfs_by_count'] = $pdfs;

        $stations_statistics = DB::select(
            "SELECT ctg.name as category, aa.visit_count as total_visit_count, a.duration_in_sec as total_duration_in_sec, MAX(b.duration_in_sec) as most_duration_in_sec, MAX(c.download_count) as most_download_count FROM
                      categories ctg
                      LEFT JOIN 
                        (SELECT DISTINCT ct.id as id, SUM(tr.duration_in_sec) as duration_in_sec FROM track_records tr JOIN categories ct ON ct.id = tr.category_id AND tr.type='page' GROUP BY tr.category_id) a
                        ON ctg.id = a.id
                      LEFT JOIN 
                        (SELECT DISTINCT cct.id as id, COUNT(cct.slug) as visit_count FROM track_records tr JOIN categories cct ON cct.id = tr.category_id AND tr.type='page' AND tr.duration_in_sec=0 GROUP BY tr.category_id) aa
                        ON ctg.id = aa.id
                      LEFT JOIN
                        (SELECT DISTINCT cat.id as id, tra.file_name as file_name, SUM(tra.duration_in_sec) as duration_in_sec FROM track_records tra JOIN categories cat ON cat.id=tra.category_id AND tra.type='video' GROUP BY cat.id, tra.file_name) b
                        ON ctg.id = b.id
                      LEFT JOIN 
                        (SELECT DISTINCT cate.id as id, tar.file_name as file_name, COUNT(tar.file_name) as download_count FROM track_records tar JOIN categories cate ON cate.id=tar.category_id AND tar.type='pdf' GROUP BY cate.id, tar.file_name) c
                        ON ctg.id = c.id
                      GROUP BY ctg.id
                      ORDER BY ctg.name ASC
            ;"
        );
        $this->arr_view_data['stations_statistics'] = $stations_statistics;


        return view($this->module_view_folder . '.index', $this->arr_view_data);
    }
}