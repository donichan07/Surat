<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Teacher;
use App\Models\Subject;

class ClassController extends Controller
{
    public function index()
    {
        // Menggunakan eager loading untuk memuat relasi teacher dan subject
        $classes = ClassModel::with(['teacher', 'subject'])->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('classes.create', compact('teachers', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $newClass = ClassModel::create([
            'class_name' => $request->class_name,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        if ($newClass) {
            return redirect()->route('home')->with('success', 'Kelas berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan kelas, silakan coba lagi');
        }
    }

    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('classes.edit', compact('class', 'teachers', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $class = ClassModel::findOrFail($id);

        $class->update([
            'class_name' => $request->class_name,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('home')->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return redirect()->route('home')->with('success', 'Kelas berhasil dihapus');
    }
}
