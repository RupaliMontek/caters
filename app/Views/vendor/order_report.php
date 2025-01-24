<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Generate Report</h2>

        <!-- Date Range Selection Form -->
        <form action="<?= base_url('vendor/generate_report') ?>" method="POST">
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="<?= $start_date ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $end_date ?? '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>

        <!-- Display Success or Error Messages -->
        <?php if (session()->get('error')): ?>
            <div class="alert alert-danger mt-4"><?= session()->get('error') ?></div>
        <?php endif; ?>

        <!-- Display Report Data -->
        <?php if (!empty($orders)): ?>
            <h4 class="mt-5">Report Results</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Venue</th>
                        <th>Time</th>
                        <th>Shift</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['start_date'] ?></td>
                            <td><?= $order['end_date'] ?></td>
                            <td><?= $order['venue'] ?></td>
                            <td><?= $order['staff_time'] ?></td>
                            <td><?= $order['shift'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Download Button -->
            <form action="<?= base_url('vendor/download_report/' . $start_date . '/' . $end_date) ?>" method="GET">
                <button type="submit" class="btn btn-success mt-3">Download Report</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>