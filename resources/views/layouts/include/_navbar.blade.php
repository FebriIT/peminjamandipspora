<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

        </ul>

    </form>


    <marquee style="color:yellow ;width:600px; font-size:30px;  line-height:25px;" class="font-italic">
    <center> Selamat Datang Di WEB DISPORA OKI Sumatera Selatan <br>
    <span style="font-size:15px;">Komp. Dispora, Jua Jua, Kec. Kayu Agung, Kabupaten Ogan Komering Ilir, Sumatera Selatan 30867</span> </center>
    </marquee>



    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle">
            {{-- @php

                $beep=\App\Models\Notifikasi::where('status','0')->where('sendto',Auth::user()->id)->count();
                $notifikasi=\App\Models\Notifikasi::Join('transaksi','transaksi.id','=','notifikasi.transaksi_id')
                            ->Join('buku','notifikasi.buku_id','=','buku.id')
                            ->Join('users','notifikasi.user_id','=','users.id')
                            ->select('notifikasi.id','notifikasi.transaksi_id','notifikasi.status','notifikasi.created_at','users.name','buku.judul','buku.isbn','notifikasi.user_id','notifikasi.buku_id')
                            ->where('notifikasi.sendto',Auth::user()->id)
                            ->orderBy('id','desc')
                            ->get();

                            $countnotif=\App\Models\Notifikasi::Join('transaksi','transaksi.id','=','notifikasi.transaksi_id')
                            ->Join('buku','notifikasi.buku_id','=','buku.id')
                            ->Join('users','notifikasi.user_id','=','users.id')
                            ->select('notifikasi.id','notifikasi.transaksi_id','notifikasi.status','notifikasi.created_at','users.name','buku.judul','buku.isbn','notifikasi.user_id')
                            ->where('notifikasi.sendto',Auth::user()->id)
                            ->where('notifikasi.status','0')
                            ->orderBy('id','desc')
                            ->get()
                            ->count();


                        $notif=\App\Models\Notifikasi::orderBy('id','desc')->get();

            @endphp --}}

            {{-- <a href="#" data-toggle="dropdown" class="btn btn-primary btn-icon icon-left @if($beep!=0) beep @endif">
                        <i class="far fa-bell"></i> Notifications @if($beep!=0) <span class="badge badge-transparent">{{ $countnotif }} @endif </span>
                      </a> --}}
            {{-- <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg "><i class="far fa-bell"></i></a> --}}
            <div class="dropdown-menu dropdown-list dropdown-menu-right">

                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="/{{ Auth::user()->role }}/marknotif">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">


                    {{-- @dd($notifikasi); --}}
                    {{-- @if (auth()->user()->role=='admin')
                        @foreach ($notifikasi as $row)


                            <a href="/{{ auth()->user()->role }}/transaksi/{{ $row->id }}" class="dropdown-item dropdown-item-unread" @if($row->status==0) style="background-color: rgb(177, 175, 175)"@endif>
                                <div class="dropdown-item-icon bg-danger text-white">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    {{ $row->name }} terlambat mengembalikan buku <b>"{{ $row->judul }}"</b> dengan idBuku {{ $row->buku_id }}
                                    <div class="time text-primary">{{ $row->created_at->diffForHumans() }}</div>
                                </div>
                            </a>

                        @endforeach
                    @else
                        @foreach ($notifikasi as $row)
                            <a href="/{{ auth()->user()->role }}/transaksi/{{ $row->id }}" class="dropdown-item dropdown-item-unread" @if($row->status==0) style="background-color: rgb(177, 175, 175)"@endif>
                                <div class="dropdown-item-icon bg-danger text-white">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Anda terlambat mengembalikan buku "{{ $row->judul }}"
                                    <div class="time text-primary">{{ $row->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                    @endif --}}
                </div>
                <div class="dropdown-footer text-center">
                    <a href="/{{ Auth::user()->role }}/notifikasi/viewall">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ Auth::user()->getAvatar() }}" width="30px" height="30px"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/{{ Auth::user()->role }}/profile" class="dropdown-item has-icon text-primary">
                    <i class="fas fa-user"></i> Profile
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
