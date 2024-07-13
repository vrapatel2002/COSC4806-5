<?php require_once 'app/views/templates/header.php' ?>

<div class="container mt-5">
    <div class="page-header text-center mb-4" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="display-4">Hey, <?= htmlspecialchars($_SESSION['username']) ?></h2>
                <p class="lead"><?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <main role="main" class="container">
        <div class="page-header mb-4" id="banner">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="h3">Reminders</h1>
                </div>
            </div>
        </div>

        <?php if (!empty($data['reminders'])): ?>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['reminders'] as $reminder): ?>
                        <tr>
                            <form action="/reminders/update/<?php echo htmlspecialchars($reminder['id']); ?>" method="post">
                                <td><?php echo htmlspecialchars($reminder['id']); ?></td>
                                <td>
                                    <input required type="text" class="form-control" name="subject" value="<?php echo htmlspecialchars($reminder['subject']); ?>">
                                </td>
                                <td><?php echo htmlspecialchars($reminder['created_at']); ?></td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                                    <a href="/reminders/delete/<?php echo htmlspecialchars($reminder['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reminder?');">Delete</a>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-muted">No reminders found.</p>
        <?php endif; ?>

        <h2 class="h3 mt-5">Total Logins by Username</h2>
        <?php
        $user = $this->model('User');
        $totalLogins = $user->getTotalLoginsByUsername();
        ?>
        <?php if (!empty($totalLogins)): ?>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Username</th>
                        <th>Total Logins</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($totalLogins as $login): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($login['username']); ?></td>
                            <td><?php echo htmlspecialchars($login['total_logins']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-muted">No login data available.</p>
        <?php endif; ?>

        <!-- Display reminders by user -->
        <h2 class="h3 mt-5">Reminders by User</h2>
        <?php
        // Correct instantiation of Reminder model
        $reminders = $this->model('Reminder');
        $remindersByUser = $reminders->getRemindersByUser();
        ?>
        <?php if (!empty($remindersByUser)): ?>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Username</th>
                        <th>Total Reminders</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($remindersByUser as $reminderUser): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($reminderUser['username']); ?></td>
                            <td><?php echo htmlspecialchars($reminderUser['total_reminders']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-muted">No reminders found.</p>
        <?php endif; ?>

        <?php require_once 'app/views/templates/footer.php' ?>
</div>
