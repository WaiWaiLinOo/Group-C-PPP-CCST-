<?php

namespace App\Dao\post;

use App\Models\Post;
use App\Contracts\Dao\post\PostDaoInterface;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{

}