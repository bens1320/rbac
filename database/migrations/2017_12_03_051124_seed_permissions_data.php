<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $permissions = [
          [
              'pid'  =>  '0',
              'pername'  => '权限管理',
              'mname' => '',
              'cname' => '',
              'aname' => '',
          ],
          [
              'pid'  =>  '1',
              'pername'  => '权限列表',
              'mname' => 'admin',
              'cname' => 'permission',
              'aname' => 'index',
          ],
          [
              'pid'  =>  '1',
              'pername'  => '权限添加',
              'mname' => 'admin',
              'cname' => 'permission',
              'aname' => 'create',
          ],
          [
              'pid'  =>  '1',
              'pername'  => '权限修改',
              'mname' => 'admin',
              'cname' => 'permission',
              'aname' => 'edit',
          ],
          [
              'pid'  =>  '1',
              'pername'  => '权限删除',
              'mname' => 'admin',
              'cname' => 'permission',
              'aname' => 'delete',
          ],
          [
              'pid'  =>  '0',
              'pername'  => '角色管理',
              'mname' => '',
              'cname' => '',
              'aname' => '',
          ],
          [
              'pid'  =>  '6',
              'pername'  => '角色列表',
              'mname' => 'admin',
              'cname' => 'role',
              'aname' => 'index',
          ],
          [
              'pid'  =>  '6',
              'pername'  => '角色添加',
              'mname' => 'admin',
              'cname' => 'role',
              'aname' => 'create',
          ],
          [
              'pid'  =>  '6',
              'pername'  => '角色修改',
              'mname' => 'admin',
              'cname' => 'role',
              'aname' => 'edit',
          ],
          [
              'pid'  =>  '6',
              'pername'  => '角色删除',
              'mname' => 'admin',
              'cname' => 'role',
              'aname' => 'delete',
          ],
          [
              'pid'  =>  '0',
              'pername'  => '管理员管理',
              'mname' => '',
              'cname' => '',
              'aname' => '',
          ],
          [
              'pid'  =>  '11',
              'pername'  => '管理员列表',
              'mname' => 'admin',
              'cname' => 'manager',
              'aname' => 'index',
          ],
          [
              'pid'  =>  '11',
              'pername'  => '管理员添加',
              'mname' => 'admin',
              'cname' => 'manager',
              'aname' => 'create',
          ],
          [
              'pid'  =>  '11',
              'pername'  => '管理员修改',
              'mname' => 'admin',
              'cname' => 'manager',
              'aname' => 'edit',
          ],
          [
              'pid'  =>  '11',
              'pername'  => '管理员删除',
              'mname' => 'admin',
              'cname' => 'manager',
              'aname' => 'delete',
          ],

      ];

      DB::table('permissions')->insert($permissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->truncate();
    }
}
