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
use App\Utils\AppInitializer;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    private $module_view_folder;
    private $module_export_path;
    private $arr_view_data;
    private $categoryModel;
    private $trackRecordModel;

    function __construct(CategoryModel $categoryModel, TrackRecordModel $trackRecordModel)
    {
        $this->module_view_folder = 'admin';
        $this->module_export_path = '/front/exports/';

        $this->categoryModel = $categoryModel;
        $this->trackRecordModel = $trackRecordModel;
    }

    function __checkDatabase()
    {
        AppInitializer::initDatabase();
    }

    function __getDashboardData()
    {
        $this->__checkDatabase();

        $arr_categories = $this->categoryModel->find(['status'=>1]);

        $this->arr_view_data['categories'] = $arr_categories;

        $visitors = DB::select("SELECT DISTINCT visitor_id FROM track_records GROUP BY visitor_id;");
        $this->arr_view_data['visitors'] = $visitors;


        $stations = DB::select("SELECT DISTINCT ct.name as name, COUNT(ct.slug) as visit_count, SUM(tr.duration_in_sec) as duration_in_sec FROM track_records tr JOIN categories ct ON ct.id = tr.category_id AND tr.type='page' WHERE ct.status=1 GROUP BY tr.category_id ORDER BY SUM(tr.duration_in_sec) DESC LIMIT 5;");
        $this->arr_view_data['stations_by_duration'] = $stations;

        $videos = DB::select("SELECT DISTINCT file_name, SUM(duration_in_sec) as duration_in_sec FROM track_records WHERE type='video' GROUP BY file_name ORDER BY SUM(duration_in_sec) DESC LIMIT 5;");
        $this->arr_view_data['videos_by_duration'] = $videos;

        $pdfs = DB::select("SELECT DISTINCT file_name, COUNT(file_name) as download_count FROM track_records WHERE type='pdf' GROUP BY file_name ORDER BY COUNT(file_name) DESC LIMIT 5;");
        $this->arr_view_data['pdfs_by_count'] = $pdfs;

        $stations_statistics = DB::select(
            "SELECT DISTINCT ctg.name as category, IFNULL(aa.visit_count, 0) as total_visit_count, IFNULL(a.duration_in_sec, 0) as total_duration_in_sec, IFNULL(b.file_name, '') as most_viewed_content, IFNULL(b.viewed_count, 0) as most_viewed_count, IFNULL(c.file_name, '') as most_downloaded_pdf, IFNULL(c.download_count, 0) as most_download_count FROM
                      categories ctg
                      LEFT JOIN 
                        (SELECT DISTINCT ct.id as id, SUM(tr.duration_in_sec) as duration_in_sec FROM track_records tr JOIN categories ct ON ct.id = tr.category_id AND tr.type='page' GROUP BY tr.category_id) a
                        ON ctg.id = a.id
                      LEFT JOIN 
                        (SELECT DISTINCT cct.id as id, COUNT(trr.category_id) as visit_count FROM track_records trr JOIN categories cct ON cct.id = trr.category_id AND trr.type='page' AND trr.duration_in_sec=0 GROUP BY trr.category_id) aa
                        ON ctg.id = aa.id
                      LEFT JOIN
                        (SELECT DISTINCT cat.id as id, tra.file_name as file_name, COUNT(tra.file_name) as viewed_count FROM categories cat LEFT JOIN track_records tra ON cat.id=tra.category_id AND (tra.type='video' OR tra.type='content') GROUP BY cat.id, tra.file_name ORDER BY COUNT(tra.file_name) DESC) b
                        ON ctg.id = b.id
                      LEFT JOIN 
                        (SELECT DISTINCT cate.id as id, tar.file_name as file_name, COUNT(tar.file_name) as download_count FROM categories cate LEFT JOIN track_records tar ON cate.id=tar.category_id AND tar.type='pdf' GROUP BY cate.id, tar.file_name) c
                        ON ctg.id = c.id
                      WHERE ctg.status=1
                      GROUP BY ctg.id, b.file_name, c.file_name
                      ORDER BY ctg.name ASC, b.viewed_count DESC, c.download_count DESC
            ;"
        );

        $stations_statistics_new = [];
        $prev_item = null;
        foreach ($stations_statistics as $item) {
            if ($prev_item != null && $prev_item->category == $item->category) {
                continue;
            }
            $stations_statistics_new[] = $item;
            $prev_item = $item;
        }

        $this->arr_view_data['stations_statistics'] = $stations_statistics_new;
        return $this->arr_view_data;
    }

    public function index()
    {
        $this->__getDashboardData();

        return view($this->module_view_folder . '.index', $this->arr_view_data);
    }

    public function contacts()
    {
        return view($this->module_view_folder . '.contacts');
    }

    public function export()
    {
        $time = time();

        $this->__getDashboardData();

        $stations_statistics = $this->arr_view_data['stations_statistics'];
        $visitors = $this->arr_view_data['visitors'];
        $stations_by_duration = $this->arr_view_data['stations_by_duration'];
        $videos_by_duration = $this->arr_view_data['videos_by_duration'];
        $pdfs_by_count = $this->arr_view_data['pdfs_by_count'];

        $csv_s_s = "Total Visitors:, " . count($visitors) . ", \n\n";

        $csv_s_s .= "Most Visited Stations, , , Most Viewed Content, , , Most Downloaded, , \n";
        for ($i = 0; $i < 5; $i++) {
            if (count($stations_by_duration) > $i && $stations_by_duration[$i]) {
                $csv_s_s .= $stations_by_duration[$i]->name . "," . $this->__secToMinS($stations_by_duration[$i]->duration_in_sec) . ", , ";
            } else {
                $csv_s_s .= ", , , ";
            }

            if (count($videos_by_duration) > $i && $videos_by_duration[$i]) {
                $csv_s_s .= $videos_by_duration[$i]->file_name . "," . $this->__secToMinS($videos_by_duration[$i]->duration_in_sec) . ", , ";
            } else {
                $csv_s_s .= ", , , ";
            }

            if (count($pdfs_by_count) > $i && $pdfs_by_count[$i]) {
                $csv_s_s .= $pdfs_by_count[$i]->file_name . "," . $pdfs_by_count[$i]->download_count . ", , \n";
            } else {
                $csv_s_s .= ", , , \n";
            }
        }

        $csv_s_s .= "\nStations,\n";
        $csv_s_s .= "Category, Times Visited, Time Spent, Most Viewed Content, Most Downloaded PDF\n";
        foreach ($stations_statistics as $item) {
            $csv_s_s .= "$item->category, $item->total_visit_count, " . $this->__secToMinS($item->total_duration_in_sec) . ", $item->most_viewed_content, $item->most_downloaded_pdf\n";
        }

        $date_time = date('Y-m-d_H-m-s', $time);
        $file_path = public_path($this->module_export_path . "export_$date_time.csv");

        $export_file = fopen($file_path, "w") or die("Unable to download file!");
        fwrite($export_file, $csv_s_s);
        fclose($export_file);
//        return response()->file($file_path);
        return response()->download($file_path);
    }

    function __secToMinS($sec)
    {
        return $sec ? floor($sec / 60) . 'm ' . $sec % 60 . 's' : '0m 0s';
    }
}