<div class="container-fluid frmaincontent">
        <div class="header-actions">
                <h2>Add New Manager</h2>
            </div>
        <div class="form-container">
            <form action="<?php echo base_url('save_manager'); ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter manager name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter manager email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo base_url('list_manager'); ?>" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>
