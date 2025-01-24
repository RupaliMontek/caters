<div class="container-fluid frmaincontent">
 <div class="table-container">
	<div class="header-actions">
        <h2 class="text-center">Daily Order</h2>
		</div>
        <div class="row">
            <!-- Dynamic cards will be inserted here -->
            <?php 
            $orders = [
                ['id' => '101', 
                'date' => '2025-01-01', 
                'vendor_name' => 'Shweta',
                'vendor_place' => 'Pune',
                'amount' => '150.00', 
                'status' => 'Completed'],
                
                ['id' => '102', 
                'date' => '2025-01-01', 
                'vendor_name' => 'Sunny',
                'vendor_place' => 'Mumbai',
                'amount' => '250.00', 
                'status' => 'Completed'],
                
                ['id' => '103', 
                'date' => '2025-01-01', 
                'vendor_name' => 'Kiran',
                'vendor_place' => 'konkan',
                'amount' => '100.00', 
                'status' => 'In-Process'],
            ];
            foreach ($orders as $order): ?>
                <div class="col-lg-4 col-md-4 col-12">
				<div class="fordashboardcoll">
                    <h5>Order Id- <?= esc($order['id']); ?></h5>
                    <p><strong>Date:</strong> <?= esc($order['date']); ?></p>
                    <p><strong>Vendor Name:</strong> <?= esc($order['vendor_name']); ?></p>
                    <p><strong>Vendor Place:</strong> <?= esc($order['vendor_place']); ?></p>
                    <p><strong>Amount:</strong> $<?= esc($order['amount']); ?></p>
                    <p class="order-status status-<?= strtolower($order['status']); ?>">
                        <?= esc($order['status']); ?>
                    </p>
                    <div class="action-buttons">
                        <a href="<?= base_url('view_order/' . $order['id']); ?>" class="btn btn-primary btn-sm">View</a>
                        <a href="<?= base_url('download_invoice/' . $order['id']); ?>" class="btn btn-secondary btn-sm">Invoice</a>
                    </div>
					</div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>