<div class="container-fluid frmaincontent">
        <div class="header-actions">
                <h2>Edit Vendor</h2>
            </div>
        <div class="form-container">
            <form action="<?php echo base_url('update_vendor/' . $vendor['id']); ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $vendor['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="business_name" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" value="<?php echo $vendor['business_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $vendor['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $vendor['phone']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" required><?php echo isset($vendor['address']) ? esc($vendor['address']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="tel" class="form-control" id="password" name="password" value="<?php echo $vendor['password']; ?>" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo base_url('list_vendor'); ?>" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>