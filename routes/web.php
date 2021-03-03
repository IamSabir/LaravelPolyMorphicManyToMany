<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\User;
use App\Models\Video;
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

Route::get('/create', function () {
    $post = Post::create(['name' => 'My Second Post']);
    $tag1 = Tag::find(3);
    $post->tags()->save($tag1);
    $video = Video::create(['name' => 'Myvideo.mov']);
    $video->tags()->save($tag1);
    return "Post and Video Saved";
});

Route::get('/read', function () {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag){
        return $tag;
    }
});

Route::get('/update', function () {
    $post = Post::findOrFail(1);
    foreach($post->tags as $tag){
        $tag->name = 'The Updated tag';
        $tag->update();
        return "Data Updtaed";
    }
});

Route::get('/delete', function () {
    $post = Post::findOrFail(1);
    $post->tags()->delete();
    return "Data deleted";
});
