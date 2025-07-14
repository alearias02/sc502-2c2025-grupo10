<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorApiController extends Controller
{
    public function index()
    {
        return Doctor::with('specialties')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email|unique:doctors,email',
            'phone'          => 'nullable|string|max:20',
            'license_number' => 'required|string|max:50',
            'bio'            => 'nullable|string',
            'specialty_ids'  => 'required|array|min:1',
            'specialty_ids.*'=> 'exists:specialties,id',
            'photo'          => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('doctors', 'public');
            $data['photo_url'] = Storage::url($path);
        }

        $doctor = Doctor::create($data);
        $doctor->specialties()->sync($data['specialty_ids']);
        $doctor->load('specialties');

        return response()->json($doctor, 201);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email|unique:doctors,email,'.$doctor->id,
            'phone'          => 'nullable|string|max:20',
            'license_number' => 'required|string|max:50',
            'bio'            => 'nullable|string',
            'specialty_ids'  => 'required|array|min:1',
            'specialty_ids.*'=> 'exists:specialties,id',
            'photo'          => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('doctors', 'public');
            $data['photo_url'] = Storage::url($path);
        }

        $doctor->update($data);
        $doctor->specialties()->sync($data['specialty_ids']);
        $doctor->load('specialties');

        return response()->json($doctor);
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json(null, 204);
    }
}
