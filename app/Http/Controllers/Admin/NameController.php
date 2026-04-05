<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NameController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->get();
        return view('admin.names.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.names.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'writeup' => 'required|string',
        ]);

        $data['slug'] = Str::slug($data['name']);

        Profile::create($data);

        return redirect()->route('admin.names.index')
            ->with('success', 'Entry created successfully.');
    }

    public function edit(Profile $name)
    {
        return view('admin.names.edit', ['profile' => $name]);
    }

    public function update(Request $request, Profile $name)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email|max:255',
            'writeup' => 'required|string',
        ]);

        $data['slug'] = Str::slug($data['name']);

        $name->update($data);

        return redirect()->route('admin.names.index')
            ->with('success', 'Entry updated successfully.');
    }

    public function destroy(Profile $name)
    {
        $name->delete();

        return redirect()->route('admin.names.index')
            ->with('success', 'Entry deleted.');
    }
}
