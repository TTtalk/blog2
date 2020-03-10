<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    /**
     * 获取用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //1.获取提交的请求参数
//        $input=$request->all();
//        dd($input);

        $user=User::orderBy('user_id','asc')
            ->where(function ($query) use ($request){
                $username=$request->input('username');
                $email=$request->input('email');
                if(!empty($username)){
                    $query->where('user_name','like','%'.$username.'%');
                }
                if(!empty($email)){
                    $query->where('user_name','like','%'.$email.'%');
                }
            })
            ->paginate($request->input('num')?$request->input('num'):3);
//        $user=User::paginate(1);
        return view('admin.user.list',compact('user','request'));
    }

    /**
     * 返回用户添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * 执行添加操作.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return 1111;
//        //1.接收前台表单提交的数据 email pass repass
        $input=$request->all();
//
////        2.进行表单数据验证


////        3.添加到数据库的user表
        $username=$input['email'];
        $pass=Crypt::encrypt($input['pass']);

        $res=User::create(['user_name'=>$username,'user_pass'=>$pass,'email'=>$input['email']]);
//
////        4.根据添加是否成功，给客户端返回一个json格式的反馈
        if ($res){
            $data=[
                'status'=>0,
                'message'=>'添加成功',
            ];

        }else{
            $data=[
                'status'=>1,
                'message'=>'添加失败',
            ];
        }
//        json_encode($data);
        return $data;
    }

    /**
     * 显示一条用户记录数据.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 返回一个修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 执行删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
