@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Form Booking Servis Motor</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipeMotor">Tipe Motor</label>
                <input type="text" name="tipeMotor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="platNomor">Plat Nomor</label>
                <input type="text" name="platNomor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jamBooking">Tanggal & Jam Booking</label>
                <input type="datetime-local" name="jamBooking" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="paketServis">Paket Servis</label>
                <select name="paketServis" class="form-control">
                    <option value="">Pilih Paket (Opsional)</option>
                    <option value="Paket A">Paket A</option>
                    <option value="Paket B">Paket B</option>
                    <option value="Paket C">Paket C</option>
                </select>

                <small class="text-muted d-block mt-2">
                    <strong>Keterangan Paket:</strong><br>
                    <strong>Paket A:</strong> CVT Cleaning, Injection Cleaner — <span
                        class="text-success">Rp85.000</span><br>
                    <strong>Paket B:</strong> CVT Cleaning, Injection Cleaner, Oli Gearbox — <span
                        class="text-success">Rp110.000</span><br>
                    <strong>Paket C:</strong> CVT Cleaning, Injection Cleaner, Oli Gearbox, Throttle Cleaning, Oil Filter —
                    <span class="text-success">Rp160.000</span>
                </small>



            </div>
            <div class="form-group">
                <label>Produk Servis</label>
                <div id="produk-servis-container">
                    <!-- Tempat semua produk servis dinamis -->
                </div>
                <button type="button" id="tambahProdukServis" class="btn btn-sm btn-primary mt-2">
                    + Tambah Produk Servis
                </button>
            </div>


            @push('scripts')
                <script>
                    let jumlahProdukServis = 0;
                    const maxProdukServis = 5;
                    const maxVarianPerProduk = 5;

                    const container = document.getElementById('produk-servis-container');
                    const btnTambahProduk = document.getElementById('tambahProdukServis');

                    btnTambahProduk.addEventListener('click', () => {
                        if (jumlahProdukServis < maxProdukServis) {
                            tambahProdukServis();
                        }
                        if (jumlahProdukServis >= maxProdukServis) {
                            btnTambahProduk.disabled = true;
                        }
                    });

                    function tambahProdukServis() {
                        jumlahProdukServis++;

                        const wrapper = document.createElement('div');
                        wrapper.className = 'border p-3 mb-3 rounded bg-light';

                        wrapper.innerHTML = `
                                            <label>Produk Servis #${jumlahProdukServis}</label>
                                            <select class="form-control mb-2 produk-select">
                                                <option value="">-- Pilih Produk Servis --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                                @endforeach
                                            </select>

                                            <div class="varian-container"></div>
                                            <button type="button" class="btn btn-sm btn-secondary tambah-varian mt-2" disabled>+ Tambah Varian</button>
                                            <button type="button" class="btn btn-sm btn-danger hapus-produk mt-2">Hapus Produk Servis</button>
                                        `;

                        const selectProduk = wrapper.querySelector('.produk-select');
                        const varianContainer = wrapper.querySelector('.varian-container');
                        const tambahVarianBtn = wrapper.querySelector('.tambah-varian');
                        const hapusProdukBtn = wrapper.querySelector('.hapus-produk');

                        let jumlahVarian = 0;
                        let dataVarian = [];

                        selectProduk.addEventListener('change', function () {
                            const produkId = this.value;
                            varianContainer.innerHTML = '';
                            jumlahVarian = 0;
                            tambahVarianBtn.disabled = true;

                            if (!produkId) return;

                            fetch(`/get-variants/${produkId}`)
                                .then(res => res.json())
                                .then(data => {
                                    dataVarian = data;
                                    tambahVarian(); // otomatis 1 varian saat produk dipilih
                                    tambahVarianBtn.disabled = false;
                                });
                        });

                        tambahVarianBtn.addEventListener('click', function () {
                            if (jumlahVarian < maxVarianPerProduk) {
                                tambahVarian();
                            }
                            if (jumlahVarian >= maxVarianPerProduk) {
                                tambahVarianBtn.disabled = true;
                            }
                        });

                        function tambahVarian() {
                            const row = document.createElement('div');
                            row.className = 'd-flex mb-2';

                            const select = document.createElement('select');
                            select.name = 'variant_ids[]'; // sebelumnya: 'produk_id[]'
                            select.className = 'form-control me-2';
                            select.required = true;

                            let options = '<option value="">-- Pilih Varian --</option>';
                            dataVarian.forEach(v => {
                                options += `<option value="${v.id}">${v.name} (Stok: ${v.stock})</option>`;
                            });
                            select.innerHTML = options;

                            const hapusBtn = document.createElement('button');
                            hapusBtn.type = 'button';
                            hapusBtn.className = 'btn btn-danger btn-sm';
                            hapusBtn.textContent = 'Hapus';
                            hapusBtn.onclick = () => {
                                row.remove();
                                jumlahVarian--;
                                tambahVarianBtn.disabled = false;
                            };

                            row.appendChild(select);
                            row.appendChild(hapusBtn);
                            varianContainer.appendChild(row);
                            jumlahVarian++;
                        }

                        hapusProdukBtn.addEventListener('click', () => {
                            wrapper.remove();
                            jumlahProdukServis--;
                            btnTambahProduk.disabled = false;
                        });

                        container.appendChild(wrapper);
                    }
                </script>
            @endpush

            <div class="form-group">
                <label for="namaTeknisi">Nama Teknisi</label>
                <select name="namaTeknisi" class="form-control" required>
                    <option value="Teknisi A">Iwan Susanto</option>
                    <option value="Teknisi B"> Adiarta Agung</option>
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
    </div>
@endsection