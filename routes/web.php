<?php
use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function()
{
    $user=User::findOrFail(1);
    $post= new Post(['title'=>'first post','body'=>'first body']);
    $user->posts()->save($post);   

});

Route::get('/createagain',function()
{
    $user=User::findOrFail(1);
    $post= new Post(['title'=>'second post','body'=>'second body']);
    $user->posts()->save($post);
});

Route::get('/read',function()
{
    $user=User::findOrFail(1);
    // return $user->posts;
    foreach($user->posts as $post)
    {
        echo $post->title."<br>";

    } 
});

Route::get('/update',function()
{
    $user=User::find(1);
    $user->posts()->where('id','=',2)->update(['title'=>'updated first title','body'=>'updated body']);

});

Route::get('/delete/{id?}',function($id)
{
    $user=User::find(1);
    $retVal=$user->posts()->whereId($id)->delete();
    // return $retVal; 

    if($retVal)
    {
        echo "deleted succesfully";

    }
    else
    {
        echo "Error deleting record";
    }
});

Route::get('/hi',function()
{
    return ("hi user");
});