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
              'aname' => '',
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
