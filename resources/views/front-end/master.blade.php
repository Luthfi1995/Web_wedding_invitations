<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lu'iz-Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">

    <!-- simplyCountdown -->
    <link rel="stylesheet" href="{{ asset('assets/css/simplyCountdown.theme.default.css') }}" />
    <script src="{{ asset('assets/js/simplyCountdown.min.js') }}"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <section id="hero"
        class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>
            <h4>Kepada <span>Bapak/Ibu/Saudara/i, </span></h4>
            @foreach ($infos as $info)
                <h1>{{ $info->nama_pengantin_pria }} & {{ $info->nama_pengantin_istri }}</h1>
            @endforeach
            <p>Akan melangsungkan resepsi pernikahan dalam:</p>
            <div class="simply-countdown"></div>
            <a href="#home" class="btn btn-lg mt-4" onClick="enableScroll()">Lihat Undangan</a>
        </main>

    </section>

    @include('front-end.navbar')

    <section id="home" class="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    @foreach ($infos as $info)
                        <h2>Acara Pernikahan</h2>
                        <h3>Diselenggarakan pada {{ \Carbon\Carbon::parse($info->tanggal_pernikahan)->translatedFormat('l, d F Y') }} di {{ $info->alamat }}.</h3>
                        <p>{{ $info->deskripsi }}</p>
                    @endforeach
                </div>
            </div>

            <div class="row couple">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8 text-end">
                            @if ($biodataPria->isEmpty())
                                <h3>Biodata Pria</h3>
                                <p>Informasi biodata pria belum tersedia.</p>
                            @else
                                @foreach ($biodataPria as $pria)
                                    <h3 class="text-center">{{ $pria->nama }}</h3>
                                    <p>{{ $pria->deskripsi }}</p>
                                    <p>Putra dari {{ $pria->bapak }} <br> dan <br> {{ $pria->ibu }}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-4">
                            @if (!$biodataPria->isEmpty())
                                @foreach ($biodataPria as $pria)
                                    @if ($pria->foto)
                                        <img src="{{ asset('storage/' . $pria->foto) }}" alt="Pengantin Wanita"
                                            class="img-responsive rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/img/me.jpg') }}" alt="Pengantin Pria"
                                            class="img-responsive rounded-circle">
                                    @endif
                                @endforeach
                            @else
                                <img src="{{ asset('assets/img/me.jpg') }}" alt="Pengantin Pria"
                                    class="img-responsive rounded-circle">
                            @endif
                        </div>
                    </div>
                </div>

                <span class="heart"><i class="bi bi-heart-fill"></i></span>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            @if (!$biodataWanita->isEmpty())
                                @foreach ($biodataWanita as $wanita)
                                    @if ($wanita->foto)
                                        <img src="{{ asset('storage/' . $wanita->foto) }}" alt="Pengantin Wanita"
                                            class="img-responsive rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/img/ukhti.jpg') }}" alt="Ukhti"
                                            class="img-responsive rounded-circle">
                                    @endif
                                @endforeach
                            @else
                                <img src="{{ asset('assets/img/ukhti.jpg') }}" alt="Ukhti"
                                    class="img-responsive rounded-circle">
                            @endif
                        </div>
                        <div class="col-8">
                            @if ($biodataWanita->isEmpty())
                                <h3>Biodata Wanita</h3>
                                <p>Informasi biodata pria belum tersedia.</p>
                            @else
                                @foreach ($biodataWanita as $wanita)
                                    <h3 class="text-center">{{ $wanita->nama }}</h3>
                                    <p>{{ $wanita->deskripsi }}</p>

                                    <p>Putra dari {{ $wanita->bapak }} <br> dan <br>{{ $wanita->ibu }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="info" class="info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    @foreach ($infos as $info)
                        <h2>Informasi Acara</h2>
                        <p class="alamat">Alamat: {{ $info->alamat }} <br>Dki Jakarta 12250</p>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.195323884229!2d106.75990737387708!3d-6.237967061082667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f12221e5c851%3A0xfe59939728df4327!2sUniversitas%20Bina%20Sarana%20Informatika%20Ciledug%20(UBSI%20Ciledug)!5e0!3m2!1sen!2sid!4v1723039282959!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <a href="https://maps.app.goo.gl/yHVTnW9qLA9adXXJA" target="_blank"
                            class="btn btn-light btn-sm my-3">Klik
                            untuk
                            membuka peta</a>
                        <p class="description">Diharapkan untuk tidak salah alamat dan tanggal. Manakala tiba di tujuan
                            namun tidak
                            ada tanda-tanda sedang dilangsungkan pernikahan, boleh jadi Anda salah jadwal, atau salah
                            tempat.</p>
                </div>
                @endforeach

            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-5 col-10">
                    <div class="card text-center text-bg-light mb-5">
                        <div class="card-header">Akad Nikah</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock d-block"></i>
                                    <span>08.00 - 10.00</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar3 d-block"></i>
                                    <span>Minggu, 20 November 2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh
                            prosesi.
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-10">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Resepsi</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock d-block"></i>
                                    <span>11.00 - selesai</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar3 d-block"></i>
                                    <span>Minggu, 20 November 2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh
                            prosesi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="story" class="story">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Bagaimana Cinta Kami Bersemi</span>
                    <h2>Cerita Kami</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, similique non soluta nulla
                        asperiores
                        voluptatem.</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image"
                                style="background-image: url('{{ asset('assets/img/bogor.jpeg') }}')">

                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Pertama Bertemu</h3>
                                    <span>1 Juni 2000</span>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, modi autem?
                                        Commodi autem quo quia?
                                    </p>
                                </div>
                            </div>

                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image" style="background-image: url(https://picsum.photos/300/300);">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Mulai Serius</h3>
                                    <span>1 Januari 2005</span>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto enim eaque
                                        obcaecati odit
                                        itaque explicabo quisquam quos at.
                                    </p>
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="timeline-image" style="background-image: url(https://picsum.photos/301/301);">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Tunangan</h3>
                                    <span>7 November 2009</span>
                                </div>
                                <div class="timeline-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, deleniti
                                    distinctio. Esse quas sit
                                    explicabo corporis magni qui expedita a.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>Memori Kisah Kami</span>
                    <h2>Galeri Foto</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, itaque?</p>
                </div>
            </div>

            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
                <div class="col mt-3">
                    <a href="{{ asset('assets/img/gallery/weding1.jpeg') }}" data-toggle="lightbox"
                        data-caption="Muhammad Luthfi & ukhti 1" data-gallery="mygallery">
                        <img src="{{ asset('assets/img/gallery/weding1.jpeg') }}" alt="Luthfi & ukhti"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/300/1200/768" data-toggle="lightbox"
                        data-caption="Muhammad Luthfi & ukhti 2" data-gallery="mygallery">
                        <img src="https://picsum.photos/id/300/300/400" alt="Muhammad Luthfi & ukhti 2"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/301/1200/768" data-toggle="lightbox"
                        data-caption="Muhammad Luthfi & Nofa 3" data-gallery="mygallery">
                        <img src="https://picsum.photos/id/301/300/400" alt="Muhammad Luthfi & ukhti 3"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/302/1200/768" data-toggle="lightbox"
                        data-caption="Muhammad Luthfi & & ukhti 4" data-gallery="mygallery">
                        <img src="https://picsum.photos/id/302/300/400" alt="Muhammad Luthfi & ukhti 4"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/304/1200/768" data-toggle="lightbox"
                        data-caption="Muhammad Luthfi & ukhti 5" data-gallery="mygallery">
                        <img src="https://picsum.photos/id/304/300/400" alt="Muhammad Luthfi & ukhti 5"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="https://picsum.photos/id/305/1200/768" data-toggle="lightbox"
                        data-caption="Muhammad Luthfi & ukhti 6" data-gallery="mygallery">
                        <img src="https://picsum.photos/id/305/300/400" alt="Muhammad Luthfi & ukhti 6"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="rsvp" class="rsvp">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Konfirmasi Kehadiran</h2>
                    <p>Isi form di bawah ini untuk melakukan konfirmasi kehadiran.</p>
                </div>
            </div>

            <form class="row row-cols-md-auto g-3 align-items-center justify-content-center" method="POST"
                action="https://script.google.com/macros/s/AKfycbyddFbEJRqwEeA6OmZAuNf0jw_B30ZUOS5qSDwlAKV_nurcW7H6osJx2ZWnIeTmPm_35g/exec"
                id="my-form">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" min="1"
                            max="5" length="1" value="1">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="status" class="form-label">Konfirmasi</label>
                        <select name="status" id="status" class="form-select">
                            <option selected>Pilih salah satu</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                </div>
                <div class="col-12" style="margin-top: 35px;">
                    <button class="btn btn-primary">Kirim</button>
                </div>
            </form>

            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://wedding-ej7nz3mf8u.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by
                            Disqus.</a></noscript>
                    <!-- <div id="disqus_thread"></div>
            <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                var disqus_config = function() {
                    this.page.url = 'https://sandhikagalih.me'; // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier =
                        'https://sandhikagalih.me'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };

                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://dino-wedding-1.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
                Disqus.</a></noscript> -->
                </div>
            </div>

        </div>
    </section>

    <section id="gifts" class="gifts">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>ungkapan tanda kasih</span>
                    <h2>Kirim Hadiah</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam iure perferendis provident ab
                        aliquam nemo.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="fw-bold">BCA</div>
                            123456789 - Muhammad Luthfi
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold">MANDIRI</div>
                            987654321 - Muhammad Luthfi
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold">Saweria</div>
                            <img src="{{ asset('assets/img/saweria.png') }}" alt="Saweria QR" class="img-thumbnail"
                                width="150">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('front-end.footer')

    <div id="audio-container">
        <audio id="song" autoplay loop>
            <source src="{{ asset('assets/audio/save-and-sound.mp3') }}" type="audio/mp3">
        </audio>

        <div class="audio-icon-wrapper" style="display: none;">
            <i class="bi bi-disc"></i>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <script>
        simplyCountdown('.simply-countdown', {
            year: 2024, // required
            month: 11, // required
            day: 20, // required
            hours: 8, // Default is 0 [0-23] integer
            words: { //words displayed into the countdown
                days: {
                    singular: 'hari',
                    plural: 'hari'
                },
                hours: {
                    singular: 'jam',
                    plural: 'jam'
                },
                minutes: {
                    singular: 'menit',
                    plural: 'menit'
                },
                seconds: {
                    singular: 'detik',
                    plural: 'detik'
                }
            },
        });
    </script>

    <script>
        const stickyTop = document.querySelector('.sticky-top');
        const offcanvas = document.querySelector('.offcanvas');

        offcanvas.addEventListener('show.bs.offcanvas', function() {
            stickyTop.style.overflow = 'visible';
        });

        offcanvas.addEventListener('hidden.bs.offcanvas', function() {
            stickyTop.style.overflow = 'hidden';
        });
    </script>

    <script>
        const rootElement = document.querySelector(":root");
        const audioIconWrapper = document.querySelector('.audio-icon-wrapper');
        const audioIcon = document.querySelector('.audio-icon-wrapper i');
        const song = document.querySelector('#song');
        let isPlaying = false;

        function disableScroll() {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

            window.onscroll = function() {
                window.scrollTo(scrollTop, scrollLeft);
            }

            rootElement.style.scrollBehavior = 'auto';
        }

        function enableScroll() {
            window.onscroll = function() {}
            rootElement.style.scrollBehavior = 'smooth';
            // localStorage.setItem('opened', 'true');
            playAudio();
        }

        function playAudio() {
            song.volume = 0.1;
            audioIconWrapper.style.display = 'flex';
            song.play();
            isPlaying = true;
        }

        audioIconWrapper.onclick = function() {
            if (isPlaying) {
                song.pause();
                audioIcon.classList.remove('bi-disc');
                audioIcon.classList.add('bi-pause-circle');
            } else {
                song.play();
                audioIcon.classList.add('bi-disc');
                audioIcon.classList.remove('bi-pause-circle');
            }

            isPlaying = !isPlaying;
        }

        // if (!localStorage.getItem('opened')) {
        //   disableScroll();
        // }
        disableScroll();
    </script>
    <script>
        window.addEventListener("load", function() {
            const form = document.getElementById('my-form');
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const data = new FormData(form);
                const action = e.target.action;
                fetch(action, {
                        method: 'POST',
                        body: data,
                    })
                    .then(() => {
                        alert("Konfirmasi kehadiran berhasil terkirim!");
                    })
            });
        });
    </script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const nama = urlParams.get('n') || '';
        const pronoun = urlParams.get('p') || 'Bapak/Ibu/Saudara/i';
        const namaContainer = document.querySelector('.hero h4 span');
        namaContainer.innerText = `${pronoun} ${nama},`.replace(/ ,$/, ',');

        document.querySelector('#nama').value = nama;
    </script>
</body>

</html>
