<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommunityController extends Controller{
    
    public function index(){
        $communities = Community::all();
        return view('collaborator.community.communities', compact('communities'));
    }

    public function create(){}

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name_community' => 'required|unique:communities,name|max:255',
            'description_community' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $community = new Community();
        $community->name = $request->input('name_community');
        $community->description = $request->input('description_community');
        $community->save();
        return redirect()->back()->with('success', 'Comunidad creada exitosamente.');
    }


    public function show(string $id){}

    public function edit(string $id){}

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name_community' => 'required|max:255|unique:communities,name,' . $id,
            'description' => 'nullable|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $community = Community::findOrFail($id);
        $community->name = $request->input('name_community');
        $community->description = $request->input('description');
        $community->save();
        return redirect()->back()->with('success', 'Comunidad actualizada exitosamente.');
    }

    public function destroy($id){
        $community = Community::findOrFail($id);
        $community->delete();
        return redirect()->back()->with('success', 'Comunidad eliminada exitosamente.');
    }
}
