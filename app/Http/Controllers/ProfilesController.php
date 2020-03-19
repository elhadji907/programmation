<?php
namespace App\Http\Controllers;

use App\User;
use App\Courrier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
        $this->middleware(['auth']);
    }
    public function show(User $user){
        //dd($user);
        //dd($user->profile);
        
        // $recues = \App\Recue::get()->count();
        // $internes = \App\Interne::get()->count();
        // $departs = \App\Depart::get()->count();
        
        $courriers = Courrier::latest()->paginate(5);

        return view('profiles.show', compact('user','courriers'));
    }


    public function edit(User $user)
    {

        $this->authorize('update', $user->profile);

        $civilites = User::select('civilite')->distinct()->get();
        return view('profiles.edit', compact('user', 'civilites'));
    }


    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'civilite'        => ['required', 'string', 'max:50'],
            'firstname'        => ['required', 'string', 'max:50'],
            'name'             => ['required', 'string', 'max:50'],
            'username'         => ['string', 'min:5', 'max:10', 'unique:users'],
            'email'            => ['string', 'email', 'max:255', 'unique:users'],
            'date_naissance'   => ['required', 'date'],
            'lieu_naissance'   => ['required', 'string', 'max:50'],
            'telephone'        => ['required', 'string', 'max:50'],
            'image'            => ['sometimes', 'image', 'max:3000']

        ]);

         if (request('image')) {   
        $imagePath = request('image')->store('avatars', 'public');

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(800, 800);
        $image->save();

           auth()->user()->profile->update([
            'image' => $imagePath
            ]);

            auth()->user()->update([
            'civilite' => $data['civilite'],
            'firstname' => $data['firstname'],
            'name' => $data['name'],
            'date_naissance' => $data['date_naissance'],
            'lieu_naissance' => $data['lieu_naissance'],
            'telephone' => $data['telephone']
            ]);

        }  else {
            auth()->user()->profile->update($data);

            auth()->user()->update([
                'civilite' => $data['civilite'],
                'firstname' => $data['firstname'],
                'name' => $data['name'],
                'date_naissance' => $data['date_naissance'],
                'lieu_naissance' => $data['lieu_naissance'],
                'telephone' => $data['telephone']
                ]);
        }

        return redirect()->route('profiles.show', ['user'=>auth()->user()]);
    }
}
