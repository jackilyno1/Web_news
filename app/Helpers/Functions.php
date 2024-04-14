<?php

namespace App\Helpers;


class Functions{
    public static function category($categories, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($categories as $key => $category){
                $html .= '
                    <tr>
                        <td>'.$category->id.'</td>
                        <td>'.$category->name.'</td>
                        <td>'.$category->updated_at.'</td>
                        <td>
                            <a class=" ml-4 mr-4 btn btn-warning btn-sm" href="/categories/edit/'. $category->id .'">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="" 
                                onclick="removeRow('. $category->id .', \'/categories/destroy\')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($categories[$key]);

                // $html .= self::category($categories, $category->id, $char.'--');
        }
        return $html;
    }
}
