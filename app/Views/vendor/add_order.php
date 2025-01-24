
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
    </style>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Add New Order</h2>
            <!-- Display success or error messages -->
            <?php if (session()->get('success')): ?>
                <div class="alert alert-success"><?= session()->get('success') ?></div>
            <?php endif; ?>
            <?php if (session()->get('error')): ?>
                <div class="alert alert-danger"><?= session()->get('error') ?></div>
            <?php endif; ?>
            
            <!-- Order Form -->
            <form action="<?php echo base_url('save_order'); ?>" method="POST">
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="mb-3">
                    <label for="venue" class="form-label">Venue</label>
                    <textarea class="form-control" id="venue" name="venue" placeholder="Enter venue" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="staff_time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="staff_time" name="staff_time" required>
                </div>
                <div class="mb-3">
                    <label for="shift" class="form-label">Shift</label>
                    <select class="form-select" id="shift" name="shift" required>
                        <option value="" disabled selected>Select Shift</option>
                        <option value="loading">Loading</option>
                        <option value="morning">Morning half/Lunch</option>
                        <option value="high_tea">High Tea</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="evening">Evening Half/Dinner</option>
                        <option value="night">Night</option>
                        <option value="fullday">Full Day</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="staffDropdown" class="form-label">Staff</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="staffDropdown">
                            <option value="" disabled selected>Select staff</option>
                            <option value="sadha_waiter">Sadha Waiter</option>
                            <option value="mori_wala">Mori Wala</option>
                            <option value="tie_waiter">Tie Waiter</option>
                            <option value="couple_waiter">Couple Service</option>
                            <option value="pro">P.R.O</option>
                            <option value="captain">Captain</option>
                            <option value="safe_girls">Safe Girls</option>
                            <option value="3_finger_boys">3 Finger Service Boys</option>
                        </select>
                        <input type="number" class="form-control" id="staffCount" placeholder="Count" min="1">
                        <button type="button" class="btn btn-primary ms-2" id="addStaffBtn">Add</button>
                    </div>
                </div>
                <ul id="staffList" class="list-group mb-3"></ul>
                <input type="hidden" name="staffData" id="staffData">
                
                <!-- Buttons -->
                <div class="text-center">
                    <button type="button" class="btn btn-primary" id="previewBtn" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                    <a href="<?php echo base_url('list_order'); ?>" class="btn btn-secondary">Back to List</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Preview Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Start Date:</strong> <span id="previewStartDate"></span></p>
                    <p><strong>End Date:</strong> <span id="previewEndDate"></span></p>
                    <p><strong>Venue:</strong> <span id="previewVenue"></span></p>
                    <p><strong>Time:</strong> <span id="previewTime"></span></p>
                    <p><strong>Shift:</strong> <span id="previewShift"></span></p>
                    <p><strong>Staff:</strong> <span id="previewStaff"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const staffDropdown = document.getElementById('staffDropdown');
        const staffCount = document.getElementById('staffCount');
        const addStaffBtn = document.getElementById('addStaffBtn');
        const staffList = document.getElementById('staffList');
        const staffDataInput = document.getElementById('staffData');
        const previewBtn = document.getElementById('previewBtn');

        let staffData = [];

    addStaffBtn.addEventListener('click', () => {
        const staffName = staffDropdown.value;
        const count = staffCount.value;

    if (staffName && count > 0) {
        const staffEntry = { name: staffName, count: parseInt(count) };
        staffData.push(staffEntry);
        staffDataInput.value = JSON.stringify(staffData);

        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.textContent = `${staffName} - Count: ${count}`;

        // Delete button
        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-danger btn-sm me-2';
        deleteButton.textContent = 'Delete';
        deleteButton.addEventListener('click', () => {
            staffData = staffData.filter(item => item.name !== staffName);
            staffDataInput.value = JSON.stringify(staffData);
            listItem.remove();
        });

        // Edit button
        const editButton = document.createElement('button');
        editButton.className = 'btn btn-warning btn-sm';
        editButton.textContent = 'Edit';
        editButton.addEventListener('click', () => {
            staffDropdown.value = staffName;
            staffCount.value = count;

            // Remove the current entry
            staffData = staffData.filter(item => item.name !== staffName);
            staffDataInput.value = JSON.stringify(staffData);
            listItem.remove();
        });

        // Append buttons to list item
        listItem.appendChild(deleteButton);
        listItem.appendChild(editButton);
        staffList.appendChild(listItem);

        // Reset fields
        staffDropdown.value = '';
        staffCount.value = '';
    }
});


        previewBtn.addEventListener('click', () => {
            document.getElementById('previewStartDate').textContent = document.getElementById('start_date').value;
            document.getElementById('previewEndDate').textContent = document.getElementById('end_date').value;
            document.getElementById('previewVenue').textContent = document.getElementById('venue').value;
            document.getElementById('previewTime').textContent = document.getElementById('staff_time').value;
            document.getElementById('previewShift').textContent = document.getElementById('shift').value;
            document.getElementById('previewStaff').textContent = staffData.map(staff => `${staff.name} (${staff.count})`).join(', ');
        });
    </script>
</body>
</html>
