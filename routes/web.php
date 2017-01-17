<?php

use App\Twoot;

Route::get('/', function () {
    // Récupérer tous les "twoots" et les ajouter à la vue
    return view('app')->with([
        'twoots' => Twoot::all()
    ]);
});

//Ici, décommenter et créer la route '/about'
Route::get('about', function(){
   return view('about')->name('about'); //Renvoyer la vue 'about' !
});

Route::post('twoots', function(){
    Twoot::create([
       'text' => request()->text
   ]);

    return redirect()->to('/');
});

Route::delete('twoots/{id}', function($id){
//    Trouver le twoot, puis le supprimer
   Twoot::twoot($id)-> destroy();

    return redirect()->to('/');
});
