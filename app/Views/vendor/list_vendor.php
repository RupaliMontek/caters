<div class="container-fluid frmaincontent">
        <div class="table-container">
            <div class="header-actions">
                <h2>List of Vendors</h2>
                <a class="btn btn-success add-btn" href="<?php echo base_url('add_vendor'); ?>"><i class="bi-plus-lg"></i></a>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Sr. No</th>
                        <th>Vendor Name</th>
                        <th>Business Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th style="width:300px;">Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($list_vendor)): ?>
                        <?php 
                            $srNo = 1;
                            foreach ($list_vendor as $vendor): ?>
                            <tr>
                                <td><?= $srNo++; ?></td>
                                <td><?= esc($vendor['name']); ?></td>
                                <td><?= esc($vendor['business_name']); ?></td>
                                <td><?= esc($vendor['email']); ?></td>
                                <td><?= esc($vendor['phone']); ?></td>
                                <td><?= esc($vendor['address']); ?></td>
                                <!-- <td>IT</td> -->
                                <td>
                                    <div class="forEditDeletBtnn"><a class="btn btn-primary btn-sm" href="<?= base_url('edit_vendor/' . $vendor['id']); ?>"><i class="bi-pencil-square"></i></a>
                                    <!-- <a class="btn btn-danger btn-sm" href="<?= base_url('delete_vendor/' . $vendor['id']); ?>">Delete</a> -->
									<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi-trash"></i>
</button></div>
<!-- Modal -->
<div class="modal fade deletemsgbody" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this file?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="<?= base_url('delete_vendor/' . $vendor['id']); ?>" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No vendors found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
