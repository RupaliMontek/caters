<style>
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .add-btn {
            white-space: nowrap;
        }
    </style>
    <div class="container-fluid frmaincontent">
        <div class="table-container">
            <div class="header-actions">
                <h2>List of Managers</h2>
                <a class="btn btn-success add-btn" href="<?php echo base_url('add_manager'); ?>"><i class="bi-plus-lg"></i><!-- Add --></a>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <!-- <th>Department</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($list_manager)): ?>
                        <?php 
                            $srNo = 1;
                            foreach ($list_manager as $manager): ?>
                            <tr>
                                <td><?= $srNo++; ?></td>
                                <td><?= esc($manager['name']); ?></td>
                                <td><?= esc($manager['email']); ?></td>
                                <td><?= esc($manager['phone']); ?></td>
                                <td><?= esc($manager['address']); ?></td>
                                <!-- <td>IT</td> -->
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('edit_manager/' . $manager['id']); ?>"><i class="bi-pencil-square"></i><!-- Edit --></a>
                                   <!-- <a class="btn btn-danger btn-sm" href="<?= base_url('delete_manager/' . $manager['id']); ?>"><i class="bi-trash"></i></a>-->
								   <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi-trash"></i>
</button>
<!-- Modal -->
<div class="modal fade deletemsgbody" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this file?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="<?= base_url('delete_manager/' . $manager['id']); ?>" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No managers found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->

