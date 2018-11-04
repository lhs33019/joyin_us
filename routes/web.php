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
    return view('welcome');
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

        Route::post('/{listId}/todo', 'TodoController@createTodo')->name('create_todo');
        Route::put('/{listId}/todo/', 'TodoController@updateTodo');
        Route::delete('/{listId}/todo/', 'TodoController@deleteTodo');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
