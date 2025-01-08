<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    @forelse ($orders as $order)
        <div style="border: 1px solid #ddd; border-radius: 15px; padding: 20px; width: 350px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff; transition: transform 0.3s; hover:transform: scale(1.05);">
            <!-- Header Card -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px;">
                <h3 style="margin: 0; color: #333;">{{ $order->nama_user }}</h3>
                <span style="background-color: {{ $order->status_pembayaran === 'Lunas' ? '#28a745' : '#dc3545' }}; color: white; padding: 5px 10px; border-radius: 15px; font-size: 12px;">
                    {{ $order->status_pembayaran === 'Lunas' ? 'Lunas' : 'Belum Lunas' }}
                </span>
            </div>

            <!-- Informasi Order -->
            <p><strong>Nama Jasa:</strong> {{ $order->nama_jasa }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Deskripsi:</strong> {{ $order->deskripsi_order }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
            <p><strong>Harga Jasa:</strong> {{ number_format($order->harga_jasa, 0, ',', '.') }}</p>
            <p><strong>Tanggal Order:</strong> {{ $order->created_at->format('d-m-Y') }}</p>

            <!-- Status Order -->
            <div style="margin-top: 15px;">
                <p><strong>Status Order:</strong></p>
                <div style="background-color: #f0f0f0; border-radius: 10px; overflow: hidden; height: 10px; width: 100%;">
                    <div style="width: {{ $order->status_order === 'Pending' ? '30%' : ($order->status_order === 'Diproses' ? '60%' : '100%') }}; background-color: {{ $order->status_order === 'Selesai' ? '#28a745' : '#ffc107' }}; height: 100%;"></div>
                </div>
                <p style="margin-top: 5px; font-size: 12px; color: #555;">{{ $order->status_order }}</p>
            </div>

            <!-- Tombol Aksi -->
            <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                <form action="" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                        <i style="margin-right: 5px;">✔️</i> Terima
                    </button>
                </form>

                <form action="" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                        <i style="margin-right: 5px;">❌</i> Tolak
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p style="font-size: 18px; color: #555;">Tidak ada data order.</p>
    @endforelse
</div>
