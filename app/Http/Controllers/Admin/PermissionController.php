<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\M3Result;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission)
    {
        $permissions = $permission->get();
        $permissions = $this->resort($permissions);
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Permission $permission)
    {

        $permissions = $permission->get();
        $permissions = $this->resort($permissions);
        return view('admin.permission.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Permission $permission, M3Result $m3_result)
    {
        // $res = $request->all();
        $pername = $request->input('pername', '');
        $pid = $request->input('pid', '');
        $mname = $request->input('mname', '');
        $cname = $request->input('cname', '');
        $aname = $request->input('aname', '');

        $permission->pername = $pername;
        $permission->pid = $pid;
        $permission->mname = $mname;
        $permission->cname = $cname;
        $permission->aname = $aname;

        $permission->save();

        // $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
      $permissions = $permission->all();
      return view('admin.permission.edit',compact('permissions','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission, M3Result $m3_result)
    {
      $res = $request->all();
      $pername = $request->input('pername', '');
      $pid = $request->input('pid', '');
      $mname = $request->input('mname', '');
      $cname = $request->input('cname', '');
      $aname = $request->input('aname', '');

      $permission->pername = $pername;
      $permission->pid = $pid;
      $permission->mname = $mname;
      $permission->cname = $cname;
      $permission->aname = $aname;

      $permission->update();

      // $m3_result = new M3Result;
      $m3_result->status = 0;
      $m3_result->message = '添加成功';

      return $m3_result->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '删除成功';

        return $m3_result->toJson();
    }

    private function resort($data,$parentid=0,$level=0)
    {
      static $ret=array();
      foreach ($data as $k => $v) {
        if($v['pid']==$parentid){
          $v['level']=$level;
          $ret[]=$v;
          $this->resort($data,$v['id'],$level+1);
        }
      }
      return $ret;
    }
}
