<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CountController extends Controller
{
    /**
     * 统计
     * @appid string
     * @secret_key string
     *
     * */
    public function count(Request $request){
        header('Access-Control-Allow-Origin:*');
        $params = $request->all();

        //验证类
        $validate = Validator::make($params, [
            'appid' => 'required|string',
            'secret_key' => 'required|string',
            'source_page' => 'required|string',
        ]);
        if($validate->fails()) {
            return $validate->errors()->first();
        }

        //查询
        $userInfo = DB::table('user')
            ->where([
                ['appid', $params['appid']],
                ['secret_key', $params['secret_key']],
            ])
            ->first();

        //如果存在用户
        if($userInfo){
            //来源页面是否已存在于数据库
            $counter = DB::table('per_inv')
                ->where('source_page', $params['source_page'])
                ->first();

            //来源页面已存在，访问量+1，不存在则创建
            if($counter){
                $res = DB::table('per_inv')
                    ->where([
                        ['user_id', $userInfo->Id],
                        ['source_page', $params['source_page']],
                    ])
                    ->increment('inv_count');
            }else{
                $res = DB::table('per_inv')
                    ->insert([
                        'user_id' => $userInfo->Id,
                        'source_page' => $params['source_page'],
                        'inv_count' => 1,
                    ]);
            }
            if($res){
                $count = DB::table('per_inv')
                    ->where('user_id', $userInfo->Id)
                    ->sum('inv_count');
                $page_count = DB::table('per_inv')
                    ->where([
                        ['user_id', $userInfo->Id],
                        ['source_page', $params['source_page']],
                    ])
                    ->first();
                return ['data' => ['count'=> $count, 'page_count' => "$page_count->inv_count"], 'code'=>'200', 'msg' => 'success'];
            }
        }else{
            return ['data' => null, 'code'=>'404', 'msg' => 'user is not found'];
        }
    }

    /**
     * 测试js
     *
     * */
    public function test(){
        return view('home.test');
    }
}
