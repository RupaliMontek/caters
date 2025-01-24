<div class="container-fluid frmaincontent">
        <div class="table-container">
            <div class="header-actions">
                <h2>List of Orders</h2>
                <!-- <a class="btn btn-success add-btn" href="<?php echo base_url('add_order'); ?>">Add</a> -->
            </div>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Sr. No</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Time</th>
                        <th>Staff</th>
                        <!-- <th>Count</th> -->
                        <th>Venue</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($list_order)): ?>
                        <?php 
                            $srNo = 1;
                            foreach ($list_order as $order): ?>
                            <tr>
                                <td><?= $srNo++; ?></td>
                                <td><?= esc($order['start_date']); ?></td>
                                <td><?= esc($order['end_date']); ?></td>
                                <td><?= esc($order['staff_time']); ?></td>
                                <td>
                                    <?php
                                    $staffArray = json_decode($order['staff'], true);                                    
                                    if (is_array($staffArray)) {
                                        $staffDetails = [];                                      
                                        foreach ($staffArray as $staff) {
                                            if (isset($staff['name']) && isset($staff['count'])) {
                                                $staffDetails[] = $staff['name'] . ' (' . $staff['count'] . ')';
                                            }
                                        }
                                        echo esc(implode(', ', $staffDetails));
                                    } else {
                                        echo "No staff assigned";
                                    }
                                    ?>
                                </td>
                                <td><?= esc($order['venue']); ?></td>
                                <!-- <td>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('edit_order/' . $order['id']); ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('delete_order/' . $order['id']); ?>">Delete</a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No orders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>