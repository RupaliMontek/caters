<div class="container-fluid frmaincontent">
        <div class="header-actions">
                <h2>Edit Manager</h2>
            </div>
        <div class="form-container">
            <h2 class="text-center mb-4">Edit Manager</h2>
            <form action="<?php echo base_url('update_manager/' . $manager['id']); ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $manager['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $manager['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $manager['phone']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" required><?php echo isset($manager['address']) ? esc($manager['address']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="tel" class="form-control" id="password" name="password" value="<?php echo $manager['password']; ?>" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo base_url('list_manager'); ?>" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>