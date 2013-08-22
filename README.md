== PERTAMA ==
Begini mas, jadi kurang lebih jika mas eko bisa dilihat disana adalah, itu apps isi dan prosesnyanya sederhana banget hanya data-data pegawai yang diassign sebagai penyimpan dan pengurus barang. Yang mana proses di dalamnya adalah 

    input data pegawai, edit, delete. 
    Menambah data unit kerja (SKPD/UKPD). 
    Stelah di input, baru atas pegawai2 tersebut dimasukan nomer SK (baik penyimpan dan pengurus) (keduanya hanya hasil proses query sederhana). 
    Dan selebihnya pencarian dan export ke excel. 


Nah Mas Eko, jadi kita kebetulan dapat kerjaan yang kurang lebih sama, hanya kalau dulu dipakai oleh petugas penyimpan dan pengurus barang, sementara yang akan datang adalah penugasannya diperuntukan untuk bendahara barang. Dari sisi teknis seperti fungsi yang ditambahkan hanya pada bagian

    Input data pegawai, jika di apps sebelumnya setiap orang yang akan diajukan semuanya bisa di submit. Sementara jika di database yang satu ini, hanya ditambah fungsi pembatasan seperti, Jika Fulan telah ditugaskan 4 kali berturut2 (2008, 2009, 2010, 2011, 2012) maka Fulan tidak bisa diajukan pada tahun 2013 (ada notifikasi gagal). Jika Fulan umurnya 50 maka dia tidak bisa lagi diajukan (notifikasi gagal). Jika fulan tidak mengisi kolom sertifikat / tidak ada sertifikat maka tidak bs di submit (ada notifikasi gagal), jika Fulan SMA tidak bisa diajukan, jika bisa ada syarat (nanti bisa dibikin hidden field, misal jika di ngisi pendidikan SMA maka hidden field akan muncul)
    User Interface diganti, (kita sudah ada templatenya)

Sepertinya yang ditambah hanya itu saja, sementara report, pencarian, dan fitur lainnya tetap ada. Hanya saja mungkin layouting saja yang akan di rubah. Atau jika nantinya mas eko ada ide atau usul nama menunya mungkin bisa saja di sesuaikan.

== KEDUA ==
Dear mas Eko,

Secara umum fungsinya sama dengan aplikasi pengurus&pemelihara barang yg sudah dikirim oleh mas Harri. Namun, hanya ada perbedaan sedikit didatabasenya yaitu pada saat input data pegawai Bendahara, ada beberapa hal yg harus dicek sebelum input bisa dilakukan. Calon Bendahara ini hanya bisa dan boleh menjadi bendahara lagi, jika tidak 5 tahun berturut2. Jika sudah 5 tahun berturut2 menjadi Bendahara, sebenarnya masih bisa asalkan ada syarat lain yg harus dipenuhi. Jadi perlu ditambahkan count year dia menjabat sebagai bendahara pada database aplikasi ini. Jika dia menjabat 2009, 2010, 2011, dan 2013, maka count yearnya berubah jadi 1 lagi karena dia tidak menjabat di thn 2012.

Func Spec:
1. Menu manajemen User (input, view, edit, delete)
    - Level user (admin & user), admin bisa semua menu termasuk manage user dan input SKPD/edit SKPD baru, sedangkan user hanya bisa input dan view data/report bendahara saja

2. Menu Input form Calon Bendahara
   - isi form sama dgn aplikasi lama, namun perlu ditambahkan field di paling atas utk pilihan (dropdown button) "Calon Bendahara" = Penerimaan/Pengeluaran/Penerimaan Pembantu/Pengeluaran Pembantu
 - Input tanggal lahir mohon menggunakan datepicker sehingga bisa seragam input datenya
- ketika tgl lahir diinput, maka umur akan otomatis tergenerate
- Pada field " jabatan" - pilihannya ada 2, yaitu 1. Staff ; 2. Pejabat Struktural. (jika user memilih pejabat struktural, disampingnya ada field text yg di enabled kan. Jika pilih 1, maka text field itu tetap disable sebagaimana defaultnya)
- Pada field " sertifikat", jika user memilih tidak ada, maka ada field text yg terenabled sehingga bisa diisi keterangan. Jika pilih ada sertifikat, maka field tetap didisable.
- Pada field "pendidikan", pilihannya mulai dari SLTA/SMA sampai dengan S2
- Jika form sudah diisi lengkap, maka pada saat submit, sistem perlu melakukan pengecekan hal berikut:
         1. Apakah NIP yg diinput sudah ada pada database dengan tahun yg sama (primary key: NIP&Tahun), jika sudah ada maka muncul keterangan bahwa NIP XXXX sudah terdaftar sebagai calon bendahara tahunXXX yang berasal dari SKPD XXXX. Sehingga data tersebut tidak bisa di submit lagi.
        -> 4 constraint berikut sifatnya warning saja, bukan failed sama sekali:
             1. Apakah umurnya diatas >53 tahun? jika iya maka muncul warning.
             2. Apakah memiliki sertifikat? jika tidak, maka muncul warning
             3. Apakah yg bersangkutan sudah menjadi bendahara 5 tahun berturut2? jika iya, maka muncul warning
            -> warning tersebut akan muncul sebagai pop up window, dengan keterangan misalnya: Usia lebih dari 53 tahun, tidak punya sertifikat, dan sudah 5 tahun menjabat sebagai bendahara (2007,2008,2009,2010,2011), apakah tetap ingin dilanjutkan?
             Jika ingin tetap dilanjutkan, maka muncul lagi popup window checklist button:
              1. Surat Pernyataan dari kepala SKPD/UKPD
              2. DUK (Daftar Unit Kepangkatan)
              3. Surat Usulan kepada Badan Diklat
              4. SK Pengangkatan PNS
             Ke-4 checklist tersebut harus dicentang agar data input pegawai tadi bisa di submit

3. Menu View Data Calon Bendahara
   - ditampilkan semua data Calon bendahara, baik yg baru diajukan (belum ada noSK) dan juga yg sudah diajukan (sudah ada no sk)
   - ditampilkan page by page (1 page 20-50 no) dimana no urut 1 merupakan data pegawai yg paling terakhir di input.
  - pada setiap baris di kolom ujung kanan ada menu utk edit dan delete data pegawai tersebut

4.  Menu View Pengajuan SK
     - terdapat pilihan tahun dan tahap tertentu pengajuan sk
     - terdapat pilihan jenis bendahara (atau semua)
     - jika salah satu no sk tersebut di klik, maka akan muncul pop up window yg berisi data pegawai NIP, Nama, dan SKPD
     - di setiap baris di kolom paling kanan pada no sk yg ada, terdapat tombol utk print to XLS

5. Menu View Data Calon Bendahara
    - menampilkan data calon bendahara pada tahun dan tahap tertentu yg belum memiliki no SK
    - setelah data ditampilkan, maka dapat dicetak ke format XLS
    - mencetak berita acara

6. Menu view data SKPD/UKPD yg belum/sudah mengajukan calon bendahara pada tahun tertentu

7. Menu Input SK
    - Input no sk dilakukan berdasarkan tahun dan tahap pengajuan. Jadi 1 nosk = 1 tahun 1 tahap.

8. Menu Laporan (mas Harri tolong dijelasin ya)

9. Menu pencarian (mas Harri tolong dijelasin ya)

Terlampir saya lampirkan use case diagram sebagai gambaran tambahan.

Insya Allah saya transfer hari ini ya mas JuPe nya, nanti saya kabari kalo udah transfer.


Thanks mas. 
