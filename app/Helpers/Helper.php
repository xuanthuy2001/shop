<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
      public static function menu($menus, $parent_id = 0, $char = '')
      {
            $html = '';
            foreach ($menus as $key => $menu) {

                  if ($menu->parent_id == $parent_id) {
                        $html .= '
                              <tr>
                              <td>' . $menu->id . '</td>
                              <td>' . $char . $menu->name . '</td>
                              <td>' . $menu->parent_id . '</td>
                              <td>' . self::active($menu->active) . '</td>
                              <td>' . $menu->updated_at . '</td>
                              <td class="table-action">
                                     <a href="edit/' . $menu->id . ' " class="action-icon"> <i   class="mdi mdi-pencil"></i></a>
                                    <a href="" onclick="removeRow(' . $menu->id . ',\'/admin/menus/destroy\' )"  class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                    ';
                        unset($menus[$key]);


                        // đệ quy : chạy lại vào chính hàm bên trên với 3 đối số: thứ nhất giữ nguyên , đối số thứ 2 là 
                        // Danh mục con sẽ có parent_id = id của danh mục cha
                        // đối số thứ 3 là $char lúc này thêm --

                        $html .= self::menu($menus, $menu->id, $char . '--');
                  }
            }
            return $html;
      }
      public function active($active = 0)
      {
            return $active == 0 ? '<span class=" btn btn-danger" >No</span>' : '<span class="btn btn-success  " >Yes</span> ';
      }

      public static function menus($menus, $parent_id = 0)
      {

            // <li class="active-menu">
            //       <a href="index.html">Home</a>
            //       <ul class="sub-menu">
            //             <li><a href="index.html">Homepage 1</a></li>
            //             <li><a href="home-02.html">Homepage 2</a></li>
            //             <li><a href="home-03.html">Homepage 3</a></li>
            //       </ul>
            // </li>
            $html = '';
            foreach ($menus as $key => $menu) {
                  if ($menu->parent_id == $parent_id) {
                        $html .= '
                        <li class="active-menu" >
                              <a href="/danh-muc/' . $menu->id  . '-' . str::slug($menu->name, '-') . '.html">
                                    ' . $menu->name . '
                              </a> ';
                        // mỗi lần render sẽ làm mới ảng
                        unset($menus[$key]);

                        if (self::isChild($menus, $menu->id)) {
                              $html .= '<ul class="sub-menu">';
                              $html .= self::menus($menus, $menu->id);
                              $html .= '</ul>';
                        }
                        $html .= '</li>';
                  }
            }

            return $html;
      }

      public static function isChild($menus, $id)
      {
            foreach ($menus as $menu) {
                  if ($menu->parent_id == $id) {
                        return true;
                  }
            }
            return false;
      }
}