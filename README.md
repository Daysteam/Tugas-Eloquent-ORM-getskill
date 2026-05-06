# Tugas-model-dan-migration-getskill
Mengerjakan tugas getskill model dan migration

Penjelasan

Project ini bertujuan untuk melatih dalam membuat relasi pada laravel yaitu relasi one to one, relasi one to many dan relasi many to many.

Relasi one to one :

Pada relasi one to one dengan menggunakan contoh mahasiswa dan nim. Dengan cara kerja menggunakan pada model menggunakan kode (Mahasiswa.php) :

    public function nim() {
        return $this->belongsTo(Nim::class);
    }

kode ini digunakan untuk menghubungkan antara nim dan mahasiswa. return $this->belongsTo(Nim::class); pada kata belongsTo berarti bahwa model ini memiliki foreign key dengan model lain yaitu dengan model mahasiswa menjadi milik model lain yaitu nim karena memiliki foreignId dari Nim. begitu juga dengan nim yang juga sama tapi dengan syntaks yang berbeda yaitu :

    public function mahasiswa() {
        return $this->hasOne(Mahasiswa::class);
    }

kode yang berada di Nim ini digunakan untuk menandakan bahwa model ini memiliki data dimodel yang lain dalam kasus ini adalah Mahasiswa.

Relasi One to Many:

selain dengan adanya relasi one to one, ada juga relasi one to many dimana relasi ini dapat membuat 1 satu terhubung dengan banyak data sementara data banyak data tersebut hanya bisa terhubung dengan satu data saja. Berikut adalah salah satu contoh kodenya (Barang.php) :

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_id');
    }

dalam kasus kali ini kita menggunakan pembeli dan juga barang. pada bagian return $this->belongsTo(Pembeli::class, 'pembeli_id'); , kita dapat melihat bahwa pada bagian ini kita masih menggunakan belongsTo, mengapa begitu? karena kita ingin agar data tersebut hanya bisa terhubung dengan satu data saja. pembeli_id digunakan sebagai penghubung antara model barang dan model pembeli karena pembeli_id berada dimodel pembeli.

kode berikutnya adalah dari Pembeli.php :

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'pembeli_id');
    }

Kode pada Pembeli.php ini menggunakan hasMany dimana hasMany ini digunakan sebagai pemberi arahan kepada database bahwa file ini dapat terhubung dengan banyak data. sehingga analoginya menjadi seperti ini 1 pembeli bisa mempunyai banyak barang tapi 1 barang tidak bissa memiliki banyak pembeli.

Relasi many to many

pada relasi many to many kita menggunakan yang namanya pivot table. pivot table ini akan berfungsi sebagai perantara antara data 1 dengan data 2 dari kedua tabledata.

kode (Pengguna.php) :

    public function group()
    {
        return $this->belongsToMany(Group::class,'pengguna_groups');
    }

pada kode model diPengguna.php kita sekarang menggunakan belongsToMany menandakan bahwa data ini dapat terhubung kebanyak data , begitu juga sebaliknya. berbedanya sekarang untuk penghubung foreign keynya menggunakan yang ada pada pivot table untuk membuat pivot table kita akan menggabungkan kedua nama table yaitu pengguna dan group menjadi pengguna_group.  berikut adalah kode dari table pengguna_group : 

    Schema::create('pengguna_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

pada kode migration diatas menggunakan 2 foreign id yaitu dari pengguna dan juga dari group yang menandakan bahwa table ini akan menjadi penghubung kedua table tersebut.

Kode (Group.php) ;

    public function pengguna()
    {
        return $this->belongsToMany(Pengguna::class,'pengguna_groups');
    }

pada kode ini kita tetap menggunakan belongsToMany karena pada many to many yang menggunakan pivot table, kedua table tersebut bersifat setara karena tidak ada yang saling dibatasi berbeda dengan one to one dan one to many karena masih ada pembatas.

Cara menggunakannya dalam view :

untuk menggunakanya anatara one to one , one to many dan many to many tidak jauh berbeda.

one to one : 

pertama kita harus membuat terlebih dahulu disalah satu controller dengan kode seperti ini : 

    public function index() {
        $mahasiswas = Mahasiswa::with('nim')->get();

        return view('mahasiswa.index',compact('mahasiswas'));
    }

dimana kita akan membuat variabel untuk menyimpan hasil dari mahasiswa yang sudah diambil melewati model menggunakan metode get dan dilakuakn eager loading untuk menghindari n+1 problem, lalu kita kembalikan dengan tampilan serta data yang sudah ada didalam variabel kita kasih ke view.

pada views untuk mengeluarkan datanya cukup menggunakan foreach yaitu :

    @foreach ($mahasiswas as $ms)
            <tr>
                <td>{{ $ms->nama_mahasiswa }}</td>
                <td>{{ $ms->nim->no_nim }}</td>
            </tr>
    @endforeach

mengapa kita menggunakna foreach karena biasanya datanya lebih dari 1, kenapa kita juga menggunakan {{ }} karena laravel tidak bisa berjalan dihtml sehingga membutuh {{ }} untuk dapat tereksekusi. Untuk $ms->nama_mahasiswa artinya pada variabel ms itu dicari di record dengan nama nama_mahasiswa . $ms->nim->no_nim untuk mendapatkan no_nim kita perlu namanya relasi jadi kegunaan dari relasi itu untuk dapat mengambil data dati table lain. nim yang berada disytaks itu tergantung dari nama relasi di model.

one to many :

untuk cara penggunaan dari one to many juga tidak terlalu berbeda dengan one to one berikut adalah kode controller serta view :

    public function index(){
        $pembelis = Pembeli::with('barangs')->get();    
        return view('pembeli.index',compact('pembelis'));
    }

    @foreach ($pembelis as $pembeli)
            <tr>
                <td>{{ $pembeli->nama_pembeli }}</td>

                <td>
                    @foreach ($pembeli->barangs as $barang)
                        <div class="card mb-1">
                            <div class="card-body">
                                {{ $barang->nama_barang }}
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach

many to many :

untuk kode dari many to many juga tidak terlalu berbeda dan hanya menysesuaikan dengan table berikut adalah kode controller dan view :

    public function index() {
            $groups = Group::with('pengguna')->get();
            
            return view('group.index',compact('groups'));
        }

    @foreach ($groups as $g)
            <tr>
                <td>{{ $g->nama_group }}</td>
                <td>
                    <ul>
                        @foreach ($g->pengguna as $p)
                            <li>{{ $p->nama_pengguna }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach


