<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SchoolSync</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo1.png') }}" alt="SchoolSync Logo">
                <span class="ms-2" style="color: #cf00ff;">SchoolSync</span>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#courses">Kelas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about-us">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#partners">Partner</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                </ul>
            </div>
            <!-- Search Menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form class="d-flex">
                            <a href="{{ route('login') }}" class="btn bg-purple text-white">Login</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- untuk home -->
        <section id="home" style="padding-top: 70px;">
            <!-- Sesuaikan nilai padding-top dengan tinggi navbar -->
            <div class="kolom">
                <p class="deskripsi">Selamat Datang di</p>
                <h2 class="text-center">SchoolSync</h2>
                <!-- <img src="https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161" /> -->
                <img
                    src="https://img.freepik.com/premium-vector/flat-business-bundle-design-illustration_169137-3611.jpg?w=1060" />
                <h2 class="deskripsi mt-4">Manajemen Kelas</h2>
                <h2>Tetap Sehat, Tetap Semangat</h2>
                <p>
                    Silahkan jelajahi kami lebih lanjut di halaman berikut untuk menemukan lebih banyak tentang
                    kami.
                </p>
            </div>
        </section>


        <!-- untuk courses -->
        <section id="courses ">
            <div class="">
                <p class="deskripsi">Fitur kami</p>
                <h2>Kelas Online</h2>
                <p>
                    Di sini, kami menghadirkan pengalaman belajar yang fleksibel,
                    interaktif, dan menyeluruh. Dengan teknologi mutakhir, para
                    siswa dapat terhubung dengan pengajar dan rekan satu kelas dari
                    mana saja, kapan saja.
                </p>
                <p>
                    Melalui platform kami, kami memastikan
                    pengalaman belajar yang terintegrasi dan mendalam, dengan akses
                    ke materi pembelajaran yang bervariasi, alat kolaborasi yang kuat,
                    dan dukungan pengajar yang berdedikasi.
                </p>
            </div>
            <!-- <img
          src="https://img.freepik.com/free-vector/online-learning-isometric-concept_1284-17947.jpg?size=626&ext=jpg&ga=GA1.2.1769275626.1605867161"
        /> -->
            <img
                src="https://img.freepik.com/free-vector/unified-communication-abstract-concept-vector-illustration-enterprise-communications-platform-consistent-unified-user-interface-framework-real-time-audio-video-integration-abstract-metaphor_335657-2910.jpg?t=st=1718208965~exp=1718212565~hmac=55ffb42905c248eafa707d467beb93af5e5d3b9a12872ccf89b42f6a51397d19&w=500" />
        </section>

        {{-- About --}}
        <section id="about-us">
            <div class="kolom">
                <h2>Tentang Kami</h2>
                <p>
                    Selamat datang di SchoolSync! Kami adalah platform manajemen sekolah yang inovatif,
                    didedikasikan untuk menyederhanakan dan memperkaya pengalaman pendidikan. Dengan
                    teknologi canggih dan pendekatan yang berbasis pada kebutuhan pengguna, SchoolSync
                    memungkinkan sekolah untuk mengelola operasional mereka dengan lebih efisien,
                    meningkatkan komunikasi antara stakeholder, dan menciptakan lingkungan belajar yang
                    lebih inklusif dan interaktif. Bergabunglah dengan kami dalam menciptakan masa depan
                    pendidikan yang lebih baik!
                </p>
            </div>

        </section>
        <!-- untuk courses -->
        <h2 class="text-center">Perpustakaan </h2>
        <div class="row">
            <?php $topSixBooks = $books->sortByDesc('id')->take(6); ?>
            <?php foreach ($topSixBooks as $key => $book): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img
                        src="https://img.freepik.com/free-vector/business-brochure-template-with-wavy-background_23-2147588481.jpg?t=st=1718208394~exp=1718211994~hmac=bf4ce4df86561d7b0f5167e0cca8f62ba5dddc77958127adc7a3ef16786e952a&w=740">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book->judul ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Penulis: <?= $book->penulis ?></h6>
                        <p class="card-text">Penerbit: <?= $book->penerbit ?></p>
                        <p class="card-text">Tahun Terbit: <?= $book->tahun_terbit ?></p>
                        <p class="card-text">Genre: <?= $book->genre ?></p>
                        <p class="card-text">Stok: <?= $book->stok ?></p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- untuk Event -->
        <section id="event">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Kalender Acara</p>
                    <h2>Acara</h2>
                    <p>
                        Meriahkan momen bersama kami! Bergabunglah dalam acara kami
                        yang penuh semangat dan inspiratif untuk merayakan pencapaian
                        dan menjalin hubungan kekeluargaan antar individu warga sekolah yang kuat.
                    </p>
                </div>
            </div>
        </section>

        {{-- Kurikulum --}}

        <section id="courses" class="px-5"
            style="padding:100px 100px; background-color: #f9f9f9; border-radius: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="course-info" style="padding-right: 20px;">
                            <h2 style="color: #333; font-size: 36px; font-weight: bold; margin-bottom: 20px;">
                                Kurikulum
                                Yang Digunakan</h2>
                            <h3 style="color: #666; font-size: 24px; margin-bottom: 20px;">Kurikulum Merdeka</h3>
                            <p style="color: #666; font-size: 18px; line-height: 1.6;">Kurikulum Merdeka memberikan
                                kebebasan bagi siswa untuk mengeksplorasi minat dan bakat mereka, mempersiapkan
                                mereka
                                untuk tantangan masa depan.</p>
                            <a href="#" class="btn bg-purple"
                                style="background-color: #0056b3; color: #fff; padding: 10px 30px; font-size: 18px; text-decoration: none; display: inline-block; margin-top: 20px; border-radius: 30px;">Pelajari
                                Lebih Lanjut</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center" style="overflow: hidden; border-radius: 0 20px 20px 0;">
                        <img src="/images/kr.png" alt="Kurikulum Merdeka Logo"
                            style="max-width: 100%; border-radius: 0 20px 20px 0;">
                    </div>

                </div>
            </div>
        </section>


        <?php
        
        use App\Models\Teacher; // Menggunakan model Teacher
        
        // Ambil tiga data guru teratas berdasarkan ID paling atas
        $teachers = Teacher::orderBy('id', 'desc')->take(3)->get();
        
        ?>

        <section id="guru">
            <div class="tengah">
                <div class="kolom">
                    <h2>Guru Terbaik</h2>
                    <p>
                        Dapatkan bimbingan dari para ahli di bidangnya
                        untuk meningkatkan hasil belajar dari setiap anak didik
                        dari mata pelajaran masing-masing
                    </p>
                </div>

                <div class="tutor-list">
                    <?php foreach ($teachers as $teacher): ?>
                    <div class="kartu-tutor">
                        <p><?= $teacher->full_name ?></p> <!-- Menggunakan field full_name dari model Teacher -->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Top Partner Kami</p>
                    <h2>Partner</h2>
                    <p>
                        Temukan kekuatan dari kemitraan: Bergabunglah bersama kami
                        sebagai mitra tepercaya dalam perjalanan bersama menuju kesuksesan.
                    </p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1793.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-63.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img src="https://img.freepik.com/premium-vector/university-campus-logo_1447-1790.jpg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg" />
                    </div>
                </div>
            </div>
        </section>

        {{-- untuk ekstrakulikuller --}}

        <?php
        // Panggil data dari model Eskul
        use App\Models\Eskul;
        
        $eskuls = Eskul::all(); // Mengambil semua data eskul (Anda bisa menyesuaikan dengan cara pengambilan data yang sesuai)
        
        ?>
        <section id="Eskul">
            <div class="container">
                <div class="row">
                    <div class="kolom col-md-12">
                        <h2 class="deskripsi">Ekstrakulikuler Kami</h2>
                        <p>
                            "Ekskul di sekolah SchoolSync adalah wadah yang luar biasa bagi siswa
                            untuk mengeksplorasi minat dan bakat mereka. Berbagai kegiatan yang menarik
                            dan bermanfaat diselenggarakan di sana, memberikan kesempatan bagi siswa
                            untuk tumbuh dan berkembang. Para siswa dapat menemukan diri mereka sendiri
                            melalui partisipasi aktif dalam ekskul ini, yang juga merupakan bagian integral
                            dari pengalaman belajar mereka di SchoolSync."
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($eskuls as $eskul)
                        <div class="col-md-4 mb-3">
                            <div class="custom-card" style="width: 18rem;">
                                <img src="{{ asset('images/' . $eskul->gambar) }}" class="custom-card-img-top"
                                    alt="{{ $eskul->nama_eskul }}">
                                <div class="custom-card-body">
                                    <p class="custom-card-text">{{ $eskul->nama_eskul }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>




        <div class="container" id="nilai_siswa">
            <h2 class="text-center">Siswa Terbaik</h2>
            <div class="card-container col-md-12">
                @foreach ($topStudents as $score)
                    <div class="card">
                        <div class="card-content">
                            <h3> {{ $score->student->first_name }} {{ $score->student->last_name }}</h3>
                            <p>Nilai: {{ $score->score }}</p>
                            <p>Mata Pelajaran: {{ $score->subject->subject_name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- tambahan untuk Sistem Manajemen Sekolah -->
    {{-- <section id="sistem-manajemen-sekolah">
      <div class="tengah">
        <div class="kolom">
          <p class="deskripsi">Sistem Manajemen Sekolah</p>
          <h2>Sistem Manajemen Sekolah</h2>
          <p>
            Sistem Manajemen Sekolah adalah platform yang membantu sekolah dalam
            mengelola kegiatan sehari-hari, termasuk jadwal pelajaran, absensi
            siswa, dan komunikasi dengan orang tua.
          </p>
        </div>

        <div class="sistem-list">
          <div class="kartu-sistem">
            <div class="card">
              <p>Senin - Matematika</p>
            </div>
          </div>
          <div class="kartu-sistem">
            <div class="card">
              <p>Selasa - Bahasa Inggris</p>
            </div>
          </div>
          <div class="kartu-sistem">
            <div class="card">
              <p>Rabu - Fisika</p>
            </div>
          </div>
          <div class="kartu-sistem">
            <div class="card">
              <p>Kamis - Biologi</p>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- resources/views/layouts/footer.blade.php -->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h3>SchoolSync</h3>
                    @foreach ($contacts as $contact)
                        <p>{{ $contact->name }}</p>
                        <p>Tetap Sehat, Tetap Semangat</p>
                    @endforeach
                </div>
                <div class="col-md-3 mb-4">
                    <h3>Informasi Kontak</h3>
                    @foreach ($contacts as $contact)
                        <p><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
                        <p><i class="fas fa-phone"></i> {{ $contact->phone_number }}</p>
                        <p><i class="fas fa-map-marker-alt"></i> {{ $contact->address }}</p>
                        <p><i class="fab fa-whatsapp"></i> {{ $contact->whatsapp }}</p>
                    @endforeach
                </div>
                <div class="col-md-3 mb-4">
                    <h3>Sosial Media</h3>
                    @foreach ($contacts as $contact)
                        <p><i class="fab fa-twitter"></i> <a href="{{ $contact->twitter }}" target="_blank"
                                style="text-decoration: none;">Twitter</a></p>
                        <p><i class="fab fa-facebook"></i> <a href="{{ $contact->facebook }}" target="_blank"
                                style="text-decoration: none;">Facebook</a></p>
                        <p><i class="fab fa-instagram"></i> <a href="{{ $contact->instagram }}" target="_blank"
                                style="text-decoration: none;">Instagram</a></p>
                        <p><i class="fab fa-github"></i> <a href="{{ $contact->github }}" target="_blank"
                                style="text-decoration: none;">GitHub</a></p>
                    @endforeach
                </div>
                <div class="col-md-3 mb-4">
                    <h3>Ikuti Kami</h3>
                    <p>Tersambung dengan kami pada media sosial untuk informasi baru</p>
                </div>
            </div>
        </div>
    </div>



    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>SchoolSync.</b> All Rights Reserved.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            // Animasi muncul footer dengan efek slide
            $('.footer-section').hide().each(function(index) {
                $(this).delay(200 * index).slideDown(500);
            });

            // Animasi saat mengarahkan mouse ke ikon
            $('.footer-section a').hover(function() {
                $(this).animate({
                    fontSize: '1.1em',
                    opacity: 0.8
                }, 200);
            }, function() {
                $(this).animate({
                    fontSize: '1em',
                    opacity: 1
                }, 200);
            });

            // Animasi pulsasi saat mengarahkan mouse ke ikon sosial media
            $('.footer-section i').hover(function() {
                $(this).animate({
                    fontSize: '1.3em'
                }, 200).animate({
                    fontSize: '1em'
                }, 200);
            });

            // Animasi bergoyang pada judul "Social Media"
            $('h3').hover(function() {
                $(this).animate({
                    fontSize: '1.2em',
                    marginLeft: '5px'
                }, 200);
            }, function() {
                $(this).animate({
                    fontSize: '1em',
                    marginLeft: '0px'
                }, 200);
            });

            $('.social-link').hover(function() {
                $(this).stop().animate({
                    fontSize: '1.1em',
                    paddingLeft: '10px',
                    color: '#007bff'
                }, 200);
            }, function() {
                $(this).stop().animate({
                    fontSize: '1em',
                    paddingLeft: '0px',
                    color: '#333'
                }, 200);
            });

            // Animasi saat mouse masuk dan keluar dari ikon sosial media
            $('.footer-section i').hover(function() {
                $(this).stop().animate({
                    fontSize: '1.3em',
                    rotate: '10deg'
                }, 200);
            }, function() {
                $(this).stop().animate({
                    fontSize: '1.5em',
                    rotate: '0deg'
                }, 200);
            });

            // Animasi saat mouse masuk dan keluar dari judul "Social Media"
            $('h3').hover(function() {
                $(this).stop().animate({
                    fontSize: '1.2em',
                    marginLeft: '5px',
                    color: '#007bff'
                }, 200);
            }, function() {
                $(this).stop().animate({
                    fontSize: '1em',
                    marginLeft: '0px',
                    color: '#333'
                }, 200);
            });

            // Animasi muncul saat halaman dimuat
            $('.footer-section').hide().fadeIn(1000);


        });
    </script>
    <script src="{{ asset('assets/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>
