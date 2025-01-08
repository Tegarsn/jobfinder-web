<div class="orders-container">
    @forelse ($orders as $order)
        <div class="order-card">
            <div class="order-header">
                <h3 class="order-title">{{ $order->nama_user }}</h3>
                <span class="order-date">{{ $order->created_at->format('d-m-Y') }}</span>
            </div>
            <div class="order-body">
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Deskripsi Order:</strong> {{ $order->deskripsi_order }}</p>
            </div>
            <div class="order-footer">
                <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
                <p><strong>Status Pembayaran:</strong> 
                    <span class="status {{ strtolower($order->status_pembayaran) }}">
                        {{ $order->status_pembayaran }}
                    </span>
                </p>
                <p><strong>Status Order:</strong> 
                    <span class="status {{ strtolower($order->status_order) }}">
                        {{ $order->status_order }}
                    </span>
                </p>
            </div>
        </div>
    @empty
        <p class="no-orders">Tidak ada data order.</p>
    @endforelse
</div>

<style>
    .orders-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin: 20px auto;
    max-width: 1200px;
}

.order-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: calc(33.333% - 20px);
    box-sizing: border-box;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.order-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #f0f0f0;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.order-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.order-date {
    font-size: 14px;
    color: #777;
}

.order-body p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

.order-footer p {
    margin: 5px 0;
    font-size: 14px;
}

.status {
    padding: 2px 8px;
    border-radius: 5px;
    font-weight: bold;
    text-transform: capitalize;
}

.status.paid {
    background-color: #28a745;
    color: white;
}

.status.unpaid {
    background-color: #dc3545;
    color: white;
}

.status.completed {
    background-color: #007bff;
    color: white;
}

.status.pending {
    background-color: #ffc107;
    color: white;
}

.no-orders {
    text-align: center;
    font-size: 18px;
    color: #666;
    margin: 20px auto;
}

</style>