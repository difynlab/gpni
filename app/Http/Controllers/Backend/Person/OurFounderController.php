<?php

namespace App\Http\Controllers\Backend\Person;

use App\Http\Controllers\Controller;
use App\Models\OurFounder;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OurFounderController extends Controller
{
    private function processOurFounders($our_founders)
    {
        foreach($our_founders as $our_founder) {
            $our_founder->action = '
            <a href="'. route('backend.persons.our-founders.edit', $our_founder->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$our_founder->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $our_founder->image = $our_founder->image != null ? '<img src="'. asset('storage/backend/persons/our-founders/' . $our_founder->image) .'" class="table-image">' : '<img src="'. asset('storage/backend/main/' . Setting::find(1)->no_image) .'" class="table-image">';

            $our_founder->status = ($our_founder->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $our_founders;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $our_founders = OurFounder::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $our_founders = $this->processOurFounders($our_founders);

        return view('backend.persons.our-founders.index', [
            'our_founders' => $our_founders,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.persons.our-founders.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'new_image' => 'required|max:30720'
        ], [
            'description.required' => 'The description field is required',
            'new_image.max' => 'The image must not be greater than 30 MB',
            'new_image.required' => 'The image field is required',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_image') != null) {
            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/our-founders', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $our_founder = new OurFounder();
        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $our_founder->create($data);

        return redirect()->route('backend.persons.our-founders.index')->with('success', 'Successfully created!');
    }

    public function edit(OurFounder $our_founder)
    {
        return view('backend.persons.our-founders.edit', [
            'our_founder' => $our_founder
        ]);
    }

    public function update(Request $request, OurFounder $our_founder)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'new_image' => 'nullable|max:30720'
        ], [
            'description.required' => 'The description field is required',
            'new_image.max' => 'The image must not be greater than 30 MB'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_image') != null) {
            if($request->old_image) {
                Storage::delete('public/backend/persons/our-founders/' . $request->old_image);
            }

            $image = $request->file('new_image');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/backend/persons/our-founders', $image_name);
        }
        else {
            $image_name = $request->old_image;
        }

        $data = $request->except('old_image', 'new_image');
        $data['image'] = $image_name;
        $our_founder->fill($data)->save();
        
        return redirect()->route('backend.persons.our-founders.index')->with('success', "Successfully updated!");
    }

    public function destroy(OurFounder $our_founder)
    {
        $our_founder->status = '0';
        $our_founder->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.persons.our-founders.index');
        }

        $name = $request->name;
        $language = $request->language;

        $our_founders = OurFounder::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $our_founders->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $our_founders->where('language', $language);
        }

        $items = $request->items ?? 10;
        $our_founders = $our_founders->paginate($items);
        $our_founders = $this->processOurFounders($our_founders);

        return view('backend.persons.our-founders.index', [
            'our_founders' => $our_founders,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}