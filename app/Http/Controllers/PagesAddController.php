<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Page;

class PagesAddController extends Controller
{
    public function execute(Request $request) {

        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            //Вывод сообщения на русском
//            $messages = [
//                'required' => 'Поле :attribute обязательно к заполнению!',
//                'unique' => 'Такой псевдоним уже существует!'
//            ];

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['images']);
            }
            $page = new Page();
            $page->fill($input);
            if ($page->save()) {
                return redirect('admin')->with('status', 'Запись добавлена');
            }
        }

        if (view()->exists('admin.pages_add')){
            $data = [
                'title' => 'Создать запись'
            ];
            return view('admin.pages_add', $data);
        }
        abort(404);
    }
}
