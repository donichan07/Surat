<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Score;
use App\Models\Lessons;
use App\Models\ContactInformation;

class landing_pageConntroller extends Controller
{
    public function index()
    {
        // Ambil semua data buku
        $books = Book::all();

        // Ambil tiga siswa dengan nilai tertinggi
        $topStudents = Score::with(['student', 'subject', 'teacher'])
            ->orderBy('score', 'desc')
            ->take(3)
            ->get();

        // Ambil informasi kontak
        $contacts = ContactInformation::all();
        $jadwalGuru = Lessons::all();

        // Kirim data buku, top students, dan kontak ke view
        return view('landing_page.index', compact('books', 'topStudents', 'contacts', 'jadwalGuru'));
    }
}
