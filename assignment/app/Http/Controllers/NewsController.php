<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // lấy tin tức có id bằng id truyền vào
        $tintuc = DB::table('tintuc')
            ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
            ->select('tintuc.*', 'danhmuc.title as danhmuc', 'danhmuc.id as id_dm')
            ->where('tintuc.id', $id)
            ->first();

        // lấy danh mục và đếm số bài viết có trong danh mục
        $danhmuc = DB::table('danhmuc')
            ->join('tintuc', 'danhmuc.id', '=', 'tintuc.id_category')
            ->select('danhmuc.*', DB::raw('COUNT(danhmuc.id) as tongbaiviet'))
            ->groupBy('danhmuc.id')
            ->get();

        //lấy bài viết trước và sau của bài viết hiện tại
        $tintuctruocsau = DB::table('tintuc')
            ->whereBetween('ID', [$id - 1, $id + 1])
            ->get();

        //Bài đăng liên quan
        $tintuclienquan = DB::table('tintuc')
            ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
            ->select('tintuc.*', 'danhmuc.id as id_dm')
            ->where('danhmuc.id', $tintuc->id_dm)
            ->get();

        //lấy comment của bài viết
        $binhluans = DB::table('comments')
            ->join('taikhoan', 'comments.user_id', '=', 'taikhoan.id')
            ->select('comments.*', 'taikhoan.username', 'taikhoan.image')
            ->where('comments.tintuc_id',$id)
            ->get();


        // Khởi tạo một mảng để lưu trữ các bình luận theo cha-con
        $binhluancon = [];

        // Lặp qua tất cả các bình luận
        foreach ($binhluans as $binhluan) {
            // Kiểm tra nếu bình luận không có cha (parent_id là null)
            if ($binhluan->parent_id === null) {
                // Thêm thuộc tính 'replies' là một mảng rỗng cho bình luận gốc
                $binhluan->replies = [];
                // Lưu trữ bình luận vào mảng với id của nó làm key
                $binhluancon[$binhluan->id] = $binhluan;
            } else {
                // Nếu bình luận có parent_id, tức là bình luận trả lời
                // Kiểm tra xem bình luận gốc đã được lưu trữ trong mảng chưa
                if (isset($binhluancon[$binhluan->parent_id])) {
                    // Thêm bình luận trả lời vào mảng 'replies' của bình luận gốc
                    $binhluancon[$binhluan->parent_id]->replies[] = $binhluan;
                }
            }
        }
        // return
        return view(
            'client.newsdetail',
            [
                'tintuc' => $tintuc,
                'danhmuc' => $danhmuc,
                'tintuctruocsau' => $tintuctruocsau,
                'ID' => $id,
                'tintuclq' => $tintuclienquan,
                'comments' => $binhluancon
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
