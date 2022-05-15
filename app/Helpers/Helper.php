<?php

namespace App\Helpers;

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
}