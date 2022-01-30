<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $id = auth()->user()->id;
        $c_id = '1';
        return new Post([
            'post_name'     => $row['post_name'],
            'detail'    => $row['detail'],
            'user_id'  => $id,
            'category_id'  => $c_id,
        ]);
    }
}
