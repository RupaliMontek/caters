<div class="container-fluid frmaincontent">
        <div class="header-actions">
                <h2>Edit Supervisor</h2>
            </div>
        <div class="form-container">
            <form action="<?php echo base_url('update_supervisor/' . $supervisor['id']); ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $supervisor['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $supervisor['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $supervisor['phone']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" required><?php echo isset($supervisor['address']) ? esc($supervisor['address']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="tel" class="form-control" id="password" name="password" value="<?php echo $supervisor['password']; ?>" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo base_url('list_supervisor'); ?>" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>
