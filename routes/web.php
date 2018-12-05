<?php

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
    return view('main/index');
});
Route::get('/cal', function () {
    return view('/main/cal');
})->name('cal');

Route::group([
    'prefix' => 'card',
], function () {
    Route::get('/','MeetingController@getMeetings')->name('card');
    Route::post('/', 'MeetingController@createMeeting')->name('create_card');
    Route::get('/write', function () {
        return view('/Meeting/write');})->name('make_card')->middleware('auth');
    Route::get('/join/{id}', 'MeetingController@join_meeting')->middleware('auth');
});

Route::group([
    'prefix' => 'list',
    'middleware' => 'auth',
], function () {
/*        Route::get('', function () {
            return view('Todo/todo_main'); })->name('todoList')->middleware('auth');
*/
        Route::get('', 'TodoController@getTodoLists')->name('todoList')->middleware('auth');
        Route::get('/{listId}', 'TodoController@getTodoList');
        Route::post('', 'TodoController@createTodoList')->name('create_todo_List');
        Route::put('/{listId}', 'TodoController@updateTodoList');
        Route::delete('/{listId}', 'TodoController@deleteTodoList')->name('delete_todo_List');

        Route::get('/{listId}/todo/{todoId}', 'TodoController@getTodo');
        Route::post('/{listId}/todo', 'TodoController@createTodo')->name('create_todo');
        Route::put('/{listId}/todo/{todoId}', 'TodoController@updateTodo');
        Route::delete('/{listId}/todo/{todoId}', 'TodoController@deleteTodo');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
